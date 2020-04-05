<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
    }

    public function index() {
        if (is_admin()) {
            $response = array();
            $response['total_users'] = $this->Main_model->get_sum('tbl_users', array(), 'ifnull(count(id),0) as sum');
            $response['paid_users'] = $this->Main_model->get_sum('tbl_users', array('paid_status' => '1'), 'ifnull(count(id),0) as sum');
            $response['today_joined_users'] = $this->Main_model->get_sum('tbl_users', 'date(created_at) = date(now())', 'ifnull(count(id),0) as sum');
            $response['total_payout'] = $this->Main_model->get_sum('tbl_income_wallet', array('amount > ' => 0), 'ifnull(sum(amount),0) as sum');

            $response['direct_income'] = $this->Main_model->get_sum('tbl_income_wallet', array('type' => 'direct_income'), 'ifnull(sum(amount),0) as sum , type');
            $response['matching_bonus'] = $this->Main_model->get_sum('tbl_income_wallet', array('type' => 'matching_bonus'), 'ifnull(sum(amount),0) as sum , type');
            $response['roi_income'] = $this->Main_model->get_sum('tbl_income_wallet', array('type' => 'roi_income'), 'ifnull(sum(amount),0) as sum , type');


            $response['total_sent_fund'] = $this->Main_model->get_sum('tbl_wallet', array(), 'ifnull(sum(amount),0) as sum');
            $response['used_fund'] = $this->Main_model->get_sum('tbl_wallet', array('amount <' => '0'), 'ifnull(sum(amount),0) as sum ');
            $response['requested_fund'] = $this->Main_model->get_sum('tbl_payment_request', array(), 'ifnull(sum(amount),0) as sum');
            $this->load->view('dashboard', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function CommingSoon($header = '') {
        $response['header'] = ucwords(str_replace('_', ' ', $header));
        $this->load->view('coming_soon', $response);
    }

    public function sample() {
        $this->load->view('sample');
    }

    public function get_user($user_id) {
        if (is_admin()) {
            $response = array();
            $response['success'] = 0;
            $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            if (!empty($user)) {
                $response['success'] = 1;
                $response['message'] = 'user Found';
                $response['user'] = $user;
                echo $user['name'];
            } else {
                echo 'User Not Found';
            }
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function users() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_records('tbl_users', array(), 'id,user_id,name,last_name,phone,password,master_key,email,sponser_id,directs,package_id,paid_status,created_at,disabled,position,package_amount');
            foreach ($response['users'] as $key => $user) {
                $response['users'][$key]['e_wallet'] = $this->Main_model->get_single_record('tbl_wallet', array('user_id' => $user['user_id']), 'ifnull(sum(amount),0) as e_wallet');
                $response['users'][$key]['income_wallet'] = $this->Main_model->get_single_record('tbl_income_wallet', array('user_id' => $user['user_id']), 'ifnull(sum(amount),0) as income_wallet');
                // $response['users'][$key]['rank'] = calculate_rank($user['directs']);
                // $response['users'][$key]['package'] = calculate_package($user['package_id']);
            }
            $this->load->view('users', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function today_joinings() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_records('tbl_users', 'date(created_at) = date(now())', '*');
            $this->load->view('users', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function user_login($user_id) {
        if (is_admin()) {
            $this->session->set_userdata('user_id', $user_id);
            redirect('Dashboard/User');
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function paidUsers() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_records('tbl_users', array('paid_status' => 1), '*');
            $this->load->view('paid_users', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function UserInvoice() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_records('tbl_users', array('paid_status' => 1), '*');
            $this->load->view('user_invoice', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function BlockedMembers() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_records('tbl_users', array('disabled' => 1), '*');
            $this->load->view('paid_users', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Genelogy($user_id = 'admin') {
        if (is_admin()) {
            $response = array();
            $response['level1'] = $this->Main_model->get_tree_user($user_id);
            $response['level2'][1] = $this->Main_model->get_tree_user($response['level1']->left_node);
            $response['level2'][2] = $this->Main_model->get_tree_user($response['level1']->right_node);
            if (!empty($response['level2'][1]->left_node))
                $response['level3'][1] = $this->Main_model->get_tree_user($response['level2'][1]->left_node);
            else
                $response['level3'][1] = array();
            if (!empty($response['level2'][1]->right_node))
                $response['level3'][2] = $this->Main_model->get_tree_user($response['level2'][1]->right_node);
            else
                $response['level3'][2] = array();
            if (!empty($response['level2'][2]->left_node))
                $response['level3'][3] = $this->Main_model->get_tree_user($response['level2'][2]->left_node);
            else
                $response['level3'][3] = array();
            if (!empty($response['level2'][2]->right_node))
                $response['level3'][4] = $this->Main_model->get_tree_user($response['level2'][2]->right_node);
            else
                $response['level3'][4] = array();
            $this->load->view('genelogy', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Tree($user_id = 'adminadmin') {
        if (is_admin()) {
            $response = array();
            $response['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            $response['users'] = $this->Main_model->get_records('tbl_users', array('sponser_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            foreach ($response['users'] as $key => $directs) {
                $response['users'][$key]['sub_directs'] = $this->Main_model->get_records('tbl_users', array('sponser_id' => $directs['user_id']), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            }
            
            $this->load->view('tree', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Pool($user_id = 'adminadmin', $pool_id) {
        if (is_admin()) {
            $response = array();
            // $response['user'] = $this->Main_model->get_single_record('tbl_pool', array('user_id' => $user_id , 'pool_level' => $pool_id), '*');
            $response['users'] = $this->Main_model->get_records('tbl_pool', array('pool_level' => $pool_id), '*');
            // foreach($response['users'] as $key => $directs){
            //     $response['users'][$key]['user_info'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $directs['user_id']), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            // }
            // $response['pool_id'] = $pool_id;
            // $this->load->view('pool', $response);
            $this->load->view('pool_view', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function RankUsers() {
        if (is_admin()) {
            $response = array();
            $response['users'] = $this->Main_model->get_records('tbl_user_positions', array('user_id != ' => 'admin'), '*');
            foreach ($response['users'] as $key => $users) {
                $response['users'][$key]['package'] = $this->Main_model->get_single_record('tbl_package', array('id' => $users['package']), '*');
            }
            $this->load->view('rank_users', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function login() {
        if (is_admin()) {
            redirect('Admin/Management');
        } else {
            $response['message'] = '';
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $user = $this->Main_model->get_single_record('tbl_admin', array('user_id' => $data['user_id'], 'password' => $data['password'], 'role' => 'A'), 'id,user_id,role,name,email');
                if (!empty($user)) {
                    $this->session->set_userdata('user_id', $user['user_id']);
                    $this->session->set_userdata('role', $user['role']);
                    redirect('Admin/Management/');
                } else {
                    $response['message'] = 'Invalid Credentials';
                }
            }
            $this->load->view('login', $response);
        }
    }

    public function logout() {
        $this->session->unset_userdata(array('user_id', 'role'));
        redirect('Admin/Management/login');
    }

    public function Fund_requests($status = '') {
        if (is_admin()) {
            if ($status == '') {
                $where = array();
            } else {
                $where = array('status' => $status);
            }
            $response['requests'] = $this->Main_model->get_records('tbl_payment_request', $where, '*');
            $this->load->view('fund_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function Bill_requests($status = '') {
        if (is_admin()) {
            if ($status == '') {
                $where = array();
            } else {
                $where = array('status' => $status);
            }
            $response['requests'] = $this->Main_model->get_records('tbl_bill_request', $where, '*');
            $this->load->view('bill_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function fund_history() {
        if (is_admin()) {
            $response['requests'] = $this->Main_model->get_records('tbl_wallet', array(), '*');
            $this->load->view('fund_history', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function update_bill_request($id) {
        if (is_admin()) {
            $response['request'] = $this->Main_model->get_single_record('tbl_bill_request', array('id' => $id), '*');
            $response['user_info'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $response['request']['user_id']), 'id,user_id,first_name,last_name,email,phone,country,image,site_url');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if ($data['status'] == 'Reject') {
                    $updres = $this->Main_model->update('tbl_bill_request', array('id' => $id), array('status' => 2, 'remarks' => $data['remarks']));
                    if ($updres == true) {
                        $this->session->set_flashdata('error', 'Reqeust Rejected Successfully');
                    } else {
                        $this->session->set_flashdata('error', 'There is an error while Rejecting request Please try Again ..');
                    }
                } elseif ($data['status'] == 'Approve') {
                    if ($response['request']['status'] !== 1) {
                        $updres = $this->Main_model->update('tbl_bill_request', array('id' => $id), array('status' => 1, 'remarks' => $data['remarks']));
                        if ($updres == true) {
                            $this->session->set_flashdata('error', 'Reqeust Accepted And Fund released Successfully');
                            $package = $this->Main_model->get_single_record('tbl_network_commission', array('id' => 1), '*');
                            $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $response['request']['user_id']), '*');
                            $DirectIncome = array(
                               'user_id' => $user['user_id'],
                               'amount' => $response['request']['amount'] * $package['direct_income'] / 100 ,
                               'type' => 'network_commisions', 
                               'description' => 'Network Commsions from Self ',
                            );
                            $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                            $LevelIncome = array(
                               'user_id' => $user['sponser_id'],
                               'amount' => $response['request']['amount'] * $package['level_income'] / 100,
                               'type' => 'network_commisions', 
                               'description' => 'Network Commsions from '.$user['user_id'],
                            );
                            $this->Main_model->add('tbl_income_wallet', $LevelIncome);
                        } else {
                            $this->session->set_flashdata('error', 'There is an error while Rejecting request Please try Again ..');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'This Payment Request Already Approved');
                    }
                }
            }
            $response['request'] = $this->Main_model->get_single_record('tbl_bill_request', array('id' => $id), '*');
            $this->load->view('update_bill_request', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function NetworkCommission($id = 1) {
        if (is_admin()) {
            $response['package'] = $this->Main_model->get_single_record('tbl_network_commission', array('id' => $id), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('direct_income', 'Direct Income', 'trim|required|xss_clean');
                $this->form_validation->set_rules('level_income', 'Level Income', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $packArr = array(
                        'direct_income' => $data['direct_income'],
                        'level_income' => $data['level_income'],
                    );
                    $res = $this->Main_model->update('tbl_network_commission', array('id' => $id), $packArr);
                    if ($res) {
                        $this->session->set_flashdata('message', 'Incomes Updated Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Updating Incomes Please Try Again ...');
                    }
                }
            }
            $response['package'] = $this->Main_model->get_single_record('tbl_network_commission', array('id' => $id), '*');
            $this->load->view('network_commission', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function update_fund_request($id) {
        if (is_admin()) {
            $response['request'] = $this->Main_model->get_single_record('tbl_payment_request', array('id' => $id), '*');
            $response['user_info'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $response['request']['user_id']), 'id,user_id,first_name,last_name,email,phone,country,image,site_url');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if ($data['status'] == 'Reject') {
                    $updres = $this->Main_model->update('tbl_payment_request', array('id' => $id), array('status' => 2, 'remarks' => $data['remarks']));
                    if ($updres == true) {
                        $this->session->set_flashdata('error', 'Reqeust Rejected Successfully');
                    } else {
                        $this->session->set_flashdata('error', 'There is an error while Rejecting request Please try Again ..');
                    }
                } elseif ($data['status'] == 'Approve') {
                    if ($response['request']['status'] !== 1) {
                        /*                         * Topup Member */
//                        $user = $this->Main_model->get_single_record('tbl_users', array('user_id' =>  $response['request']['user_id']), '*');
//                        $package = $this->Main_model->get_single_record('tbl_package', array('price' => $response['request']['amount']), '*');
//                        // pr($user,true);
//                        if($user['paid_status'] == 0){
//                            // $sendWallet = array(
//                            //     'user_id' => $user['user_id'],
//                            //     'amount' => -$package['price'],
//                            //     'type' => 'account_activation',
//                            //     'remark' => 'Account Activation Deduction for '.$user_id,
//                            // );
//                            // $this->User_model->add('tbl_wallet', $sendWallet);
//                            $topupData = array(
//                                    'paid_status' => 1,
//                                    'package_id' => $package['id'] ,
//                                    'package_amount' => $package['price'],
//                                    'topup_date' => date('Y-m-d h:i:s'),
//                                    'capping' => $package['capping'],
//                                    );
//                            $this->Main_model->update('tbl_users', array('user_id' => $user['user_id']),$topupData);
//                            $this->Main_model->update_directs($user['sponser_id']);
//                            $sponser = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,directs');
//                            $DirectIncome = array(
//                                'user_id' => $user['sponser_id'],
//                                'amount' => $package['direct_income'] ,
//                                'type' => 'direct_income', 
//                                'description' => 'Direct Income from Activation of Member '.$user['user_id'],
//                            );
//                            $this->Main_model->add('tbl_income_wallet', $DirectIncome);
//                            $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'] , $type = 'topup');
//                            $roiArr = array(
//                                'user_id' => $user['user_id'],  
//                                'amount' => ($package['price'] * 2),
//                                'roi_amount' => $package['commision'],
//                            );
//                            $this->Main_model->add('tbl_roi', $roiArr);
//                            $this->session->set_flashdata('error', 'Account Activated Successfully');
//                            $updres = $this->Main_model->update('tbl_payment_request', array('id' => $id), array('status' => 1, 'remarks' => $data['remarks']));
//                        }else{
//                            $this->session->set_flashdata('error', 'This Account Already Acitvated');
//                        }
                        /*                         * Topup Member */
                        $updres = $this->Main_model->update('tbl_payment_request', array('id' => $id), array('status' => 1, 'remarks' => $data['remarks']));
                        if ($updres == true) {
                            $this->session->set_flashdata('error', 'Reqeust Accepted And Fund released Successfully');
                            $walletData = array(
                                'user_id' => $response['request']['user_id'],
                                'amount' => $response['request']['amount'],
                                'sender_id' => 'admin',
                                'type' => 'admin_fund',
                                'remark' => $data['remarks'],
                            );
                            $this->Main_model->add('tbl_wallet', $walletData);
                        } else {
                            $this->session->set_flashdata('error', 'There is an error while Rejecting request Please try Again ..');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'This Payment Request Already Approved');
                    }
                }
            }
            $response['request'] = $this->Main_model->get_single_record('tbl_payment_request', array('id' => $id), '*');
            $this->load->view('update_fund_request', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function bank_list() {
        $banks = $this->Main_model->get_records('tbl_bank_list', array(), '*');
        echo json_encode($banks);
    }

    function update_business($user_name = 'A915813', $downline_id = 'A915813', $level = 1, $business = '40', $type = 'topup') {
        $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
        if (!empty($user)) {
            if ($user['position'] == 'L') {
                $c = 'leftPower';
            } else if ($user['position'] == 'R') {
                $c = 'rightPower';
            } else {
                return;
            }
            $this->Main_model->update_business($c, $user['upline_id'], $business);
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'business' => $business,
                'type' => $type,
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->Main_model->add('tbl_downline_business', $downlineArray);
            $user_name = $user['upline_id'];

            if ($user['upline_id'] != '') {
                $this->update_business($user_name, $downline_id, $level + 1, $business, $type);
            }
        }
    }

    public function SendWallet() {
        $response = array();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->security->xss_clean($this->input->post());
            $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|numeric|xss_clean');
            if ($this->form_validation->run() != FALSE) {
                $user_id = $data['user_id'];
                $amount = $data['amount'];
                $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                if (!empty($user)) {
                    $sendWallet = array(
                        'user_id' => $user_id,
                        'amount' => $amount,
                        'type' => 'admin_amount',
                        'sender_id' => 'admin',
                        'remark' => 'Fund Sent By Admin',
                    );
                    $this->Main_model->add('tbl_wallet', $sendWallet);
                    $this->session->set_flashdata('message', 'Fund Sent Successfully');
                } else {
                    $this->session->set_flashdata('message', 'Invalid User ID');
                }
            }
        }
        $this->load->view('send_wallet', $response);
    }

    public function UpdateRank($user_id) {
        if (is_admin()) {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $user = $this->Main_model->get_single_record('tbl_user_positions', array('user_id' => $user_id), '*');
                $user_package = $this->Main_model->get_single_record('tbl_package', array('id' => $user['package']), '*');
                $new_package = $this->Main_model->get_single_record('tbl_package', array('id' => $data['package']), '*');
                if ($user_package['bv'] == $new_package['bv']) {
                    $this->session->set_flashdata('messsage', 'This Account Have Already Same BV');
                } else {
                    $updres = $this->Main_model->update('tbl_user_positions', array('user_id' => $data['user_id']), array('package' => $new_package['id'], 'capping' => $new_package['capping']));
                    if ($updres == true) {
                        $new_bv = $new_package['bv'] - $user_package['bv'];
                        if ($new_bv > 0) {
                            $response['sponser'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'id,user_id,package_id,sponser_id,paid_status');
                            $response['sponser_package'] = $this->Main_model->get_single_record('tbl_package', array('id' => $response['sponser']['package_id']), '*');
                            $bonus = ($new_bv * $response['sponser_package']['commision'] / 100) * 1.3;
                            if ($response['sponser_package']['commision'] == '20') {
                                $roll_up_amount = $response['sponser_package']['bv'] * 1.3;
                                $this->rollup_personal_business($response['sponser']['sponser_id'], $roll_up_amount, $share = 8, $sender_id = $data['user_id'], 20);
                            } elseif ($response['sponser_package']['commision'] == '22') {
                                $roll_up_amount = $response['sponser_package']['bv'] * 1.3;
                                $this->rollup_personal_business($response['sponser']['sponser_id'], $roll_up_amount, $share = 6, $sender_id = $data['user_id'], 22);
                            } elseif ($response['sponser_package']['commision'] == '24') {
                                $roll_up_amount = $response['sponser_package']['bv'] * 1.3;
                                $this->rollup_personal_business($response['sponser']['sponser_id'], $roll_up_amount, $share = 4, $sender_id = $data['user_id'], 24);
                            }
                        }
                        $this->update_business($data['user_id'], 1, $new_bv);

                        $this->session->set_flashdata('messsage', 'Rank Updated Successfully');
                    }
                }
            }
            $response['user'] = $this->Main_model->get_single_record('tbl_user_positions', array('user_id' => $user_id), '*');
            $response['user_info'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
            $response['user_package'] = $this->Main_model->get_single_record('tbl_package', array('id' => $response['user']['package']), '*');
            $response['packages'] = $this->Main_model->get_records('tbl_package', array(), '*');
            $this->load->view('update_rank', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function rollup_personal_business($sponser_id = 'SG10006', $amount = '2070', $share = 4, $sender_id = 'SG10011', $last_distribution) {
        $sponser = $this->Main_model->get_user_package_commison($sponser_id);
        if (!empty($sponser)) {
//            pr($sponser);
            if ($sponser['commision'] == '28') {
                $this->credit_income($sponser_id, ($amount * $share / 100), 'roll_up_personal_network', 'Roll Up Personal Network Income from User ' . $sender_id);
            } elseif ($sponser['commision'] == '24') {
                if ($sponser['commision'] > $last_distribution) {
                    $this->credit_income($sponser['user_id'], ($amount * 4 / 100), 'roll_up_personal_network', 'Roll Up Personal Network Income from User ' . $sender_id);
                    if ($share > 4)
                        $this->rollup_personal_business($sponser['sponser_id'], $amount = '100', $share = $share - 4, $sender_id = 'sd', 24);
                }else {
                    $this->rollup_personal_business($sponser['sponser_id'], $amount, $share, $sender_id, $last_distribution);
                }
            } elseif ($sponser['commision'] == '22') {
                if ($sponser['commision'] > $last_distribution) {
                    $this->credit_income($sponser['user_id'], ($amount * 2 / 100), 'roll_up_personal_network', 'Roll Up Personal Network Income from User ' . $sender_id);
                    if ($share > 2)
                        $this->rollup_personal_business($sponser['sponser_id'], $amount = '100', $share = $share - 2, $sender_id = 'sd', 22);
                }else {
                    $this->rollup_personal_business($sponser['sponser_id'], $amount, $share, $sender_id, $last_distribution);
                }
            } elseif ($sponser['commision'] == '20') {
                $this->rollup_personal_business($sponser['sponser_id'], $amount, $share, $sender_id, $last_distribution);
            }
        }
    }

    public function credit_income($user_id, $amount, $type, $description) {
        $incomeArr = array(
            'user_id' => $user_id,
            'amount' => $amount,
            'type' => $type,
            'description' => $description,
        );
        $this->Main_model->add('tbl_income_wallet', $incomeArr);
    }

//     function update_business($user_name = 'SG10004', $level = 1, $bv = 1380) {
//         $user = $this->Main_model->get_single_record('tbl_user_positions', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
//         if (count($user)) {
// //            pr($user);
//             if ($user['position'] == 'L') {
//                 $c = 'left_bv';
//             } else if ($user['position'] == 'R') {
//                 $c = 'right_bv';
//             } else {
//                 return;
//             }
//             $this->Main_model->update_bv($c, $user['upline_id'], $bv);
//             $user_name = $user['upline_id'];
//             if ($user['upline_id'] != '') {
//                 $this->update_business($user_name, $level = 1, $bv);
//             }
//         }
//     }

    function content_management($title = false) {
        if (is_admin()) {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $updres = $this->Main_model->update('tbl_content', array('title' => $title), array('content' => $data['content']));
                if ($updres == true) {
                    $this->session->set_flashdata('message', 'Content Updated Successfully');
                } else {
                    $this->session->set_flashdata('message', 'There is an error while Updating Content Please try Again ..');
                }
            }
            $response['content'] = $this->Main_model->get_single_record('tbl_content', array('title' => $title), '*');
            $this->load->view('content_management', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    function blockStatus($user_id, $status) {
        if (is_admin()) {
            $response['success'] = 0;
            $updres = $this->Main_model->update('tbl_users', array('user_id' => $user_id), array('disabled' => $status));
            if ($updres == true) {
                $response['success'] = 1;
                $response['message'] = 'Status Updated Successfully';
            } else {
                $response['message'] = 'Error While Updating Status';
            }
            echo json_encode($response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    function promo_code() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $this->form_validation->set_rules('promo_code', 'Promo Code', 'trim|required|xss_clean');
                $this->form_validation->set_rules('discount', 'Discount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('valid_upto', 'Valid Upto', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
//                    $real_date = '08/08/2019';

                    $data = $this->security->xss_clean($this->input->post());
                    $date = date_create($data['valid_upto']);
                    $valid_upto = date_format($date, "Y-m-d");
                    $promoArr = array(
                        'promo_code' => $data['promo_code'],
                        'discount' => $data['discount'],
                        'valid_upto' => $valid_upto
                    );
                    $res = $this->Main_model->add('tbl_promo_codes', $promoArr);
                    if ($res) {
                        $this->session->set_flashdata('message', 'Promo Code Created Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Creating New Promo Code Please Try Again ...');
                    }
                }
            }
            $response['promo_codes'] = $this->Main_model->get_records('tbl_promo_codes', array(), '*');
            $this->load->view('promo_code', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    function delete_promo_code($id) {
        if (is_admin()) {
            $response = array();
            $promo_code = $this->Main_model->get_single_record('tbl_promo_codes', array('id' => $id), '*');
            if (!empty($promo_code)) {
                $res = $this->Main_model->delete('tbl_promo_codes', $id);
                if ($res) {
                    $this->session->set_flashdata('message', 'Promo Code Deleted Successfully');
                } else {
                    $this->session->set_flashdata('message', 'Error While Deleting Promo Code Please Try Again ...');
                }
            } else {
                $this->session->set_flashdata('message', 'Error While Deleting Promo Code Please After some Time ...');
            }
            $response['promo_codes'] = $this->Main_model->get_records('tbl_promo_codes', array(), '*');
            $this->load->view('promo_code', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    function popup_upload() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());

                $data = html_escape($data);
                if ($data['type'] == 'image') {
                    if (!empty($_FILES['media']['name'])) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
                        $config['file_name'] = 'payment_slip';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('media')) {
                            $error = array('error' => $this->upload->display_errors());
                            $response = $this->session->set_flashdata('error', $this->upload->display_errors());
                            $this->load->view('popup.php', $response);
                            print_r($error);
                            die('here');
                        } else {

                            $fileData = array('upload_data' => $this->upload->data());

                            //die('here');
                            $fileData = array('upload_data' => $this->upload->data());
                            $userData['media'] = $fileData['upload_data']['file_name'];
                            $userData['type'] = 'image';
                            $userData['caption'] = $this->input->post('caption');
                            $updres = $this->Main_model->add('tbl_popup', $userData);
                            if ($updres == true) {
                                $response = array('error' => 'Popup Uploaded Successfully');
                                $this->session->set_flashdata('error', 'Popup Uploaded Successfully');
                                $this->load->view('popup.php', $response);
                            } else {
                                $response = array('error' => 'There is an error while uploading Popup Image, Please try Again ..');
                                $this->session->set_flashdata('error', 'There is an error while uploading Popup Image, Please try Again ..');
                                $this->load->view('popup.php', $response);
                            }
                        }
                    } else {
                        $response = array('error' => 'There is an error while uploading Popup Image, Please try Again ..');
                        $this->session->set_flashdata('error', 'There is an error while uploading Popup Image, Please try Again ..');
                        $this->load->view('popup.php', $response);
                    }
                } else {
                    $userData['media'] = $this->input->post('media');
                    $userData['type'] = 'video';
                    $userData['caption'] = $this->input->post('caption');
                    $updres = $this->Main_model->add('tbl_popup', $userData);
                    if ($updres == true) {
                        $response = array('error' => 'Popup Uploaded Successfully');
                        $this->session->set_flashdata('error', 'Popup Uploaded Successfully');
                        $this->load->view('popup.php', $response);
                    } else {
                        $response = array('error' => 'There is an error while uploading Popup Image, Please try Again ..');
                        $this->session->set_flashdata('error', 'There is an error while uploading Popup Image, Please try Again ..');
                        $this->load->view('popup.php', $response);
                    }
                }
            } else {
                $response = $this->session->set_flashdata('error', 'Validation Failed');
                $this->load->view('popup.php', $response);
            }
        } else {
            redirect('Admin/Management/login');
        }
    }

}
