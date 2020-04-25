
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email', 'pagination', 'Excel'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
//        require_once( APPPATH . 'modules/Admin/libraries/SimpleExcel/SimpleExcel.php');
//        if (file_exists(APPPATH . 'modules/Admin/libraries/SimpleExcel/SimpleExcel.php')) {
//            echo'file exist';
//        }
    }

    public function index() {
        if (is_admin()) {
            // $object = new PHPExcel();
            // pr($object);
            // echo APPPATH . 'modules/Admin/libraries/SimpleExcel/SimpleExcel.php';
            // die;
            $response['requests'] = $this->Main_model->get_records('tbl_withdraw', array(), '*');
            foreach ($response['requests'] as $key => $request) {
                $response['requests'][$key]['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $request['user_id']), 'id,first_name,name,last_name,sponser_id,email,phone');
                $response['requests'][$key]['bank'] = $this->Main_model->get_single_record('tbl_bank_details', array('user_id' => $request['user_id']), '*');
            }
            $this->load->view('withdraw_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Approved() {
        if (is_admin()) {
            $response['requests'] = $this->Main_model->get_records('tbl_withdraw', array('status' => 1), '*');
            foreach ($response['requests'] as $key => $request) {
                $response['requests'][$key]['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $request['user_id']), 'id,name,first_name,last_name,sponser_id,email,phone');
                $response['requests'][$key]['bank'] = $this->Main_model->get_single_record('tbl_bank_details', array('user_id' => $request['user_id']), '*');
            }
            $this->load->view('withdraw_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Pending() {
        if (is_admin()) {
            $response['requests'] = $this->Main_model->get_records('tbl_withdraw', array('status' => 0), '*');
            foreach ($response['requests'] as $key => $request) {
                $response['requests'][$key]['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $request['user_id']), 'id,name,first_name,last_name,sponser_id,email,phone');
                $response['requests'][$key]['bank'] = $this->Main_model->get_single_record('tbl_bank_details', array('user_id' => $request['user_id']), '*');
            }
            $this->load->view('withdraw_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Rejected() {
        if (is_admin()) {
            $response['requests'] = $this->Main_model->get_records('tbl_withdraw', array('status' => 2), '*');
            foreach ($response['requests'] as $key => $request) {
                $response['requests'][$key]['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $request['user_id']), 'id,name,first_name,last_name,sponser_id,email,phone');
                $response['requests'][$key]['bank'] = $this->Main_model->get_single_record('tbl_bank_details', array('user_id' => $request['user_id']), '*');
            }
            $this->load->view('withdraw_requests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function payout_summary() {
        if (is_admin()) {
            $response = array();
            $response['records'] = $this->Main_model->payout_summary();
            foreach($response['records'] as $key => $record){
                //
                $incomes = $this->Main_model->get_incomes('tbl_income_wallet', 'date(created_at) = "'.$record['date'].'"', 'ifnull(sum(amount),0) as sum,type');
                $response['records'][$key]['incomes'] = calculate_income($incomes);
            }
            // pr($response,true);
            $this->load->view('payout_summary', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function request($id) {
        if (is_admin()) {
            $response['request'] = $this->Main_model->get_single_record('tbl_withdraw', array('id' => $id), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if ($response['request']['status'] != 0) {
                    $this->session->set_flashdata('message', 'Status of this request already updated!');
                } else {
                    if ($data['status'] == 1) {
                        $wArr = array(
                            'status' => 1,
                            'remark' => $data['remark'],
                        );
                        $res = $this->Main_model->update('tbl_withdraw', array('id' => $id), $wArr);
                        if ($res) {
                            $this->session->set_flashdata('message', 'Withdraw request approved');
                        } else {
                            $this->session->set_flashdata('message', 'Error while apporing request');
                        }
                    } elseif ($data['status'] == 2) {
                        $wArr = array(
                            'status' => 2,
                            'remark' => $data['remark'],
                        );
                        $res = $this->Main_model->update('tbl_withdraw', array('id' => $id), $wArr);
                        if ($res) {
                            $productArr = array(
                                'user_id' => $response['request']['user_id'],
                                'amount' => $response['request']['amount'],
                                'type' => $response['request']['type'],
                                'description' => $data['remark'],
                            );
                            $this->Main_model->add('tbl_income_wallet', $productArr);
                            $this->session->set_flashdata('message', 'Withdraw request rejected');
                        } else {
                            $this->session->set_flashdata('message', 'Error while apporing rejection');
                        }
                    }
                }
            }
            $response['request'] = $this->Main_model->get_single_record('tbl_withdraw', array('id' => $id), '*');
            $response['user_details'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $response['request']['user_id']), 'id,name,first_name,last_name,sponser_id,email,phone');
            $this->load->view('request', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function income($type = '') {
        if (is_admin()) {
            $response['header'] = ucwords(str_replace('_', ' ', $type));
            $config['base_url'] = base_url() . 'Admin/Withdraw/income/' . $type;
            $config['total_rows'] = $this->Main_model->get_sum('tbl_income_wallet', array('type' => $type), 'ifnull(count(id),0) as sum');
            $config ['uri_segment'] = 5;
            $config['per_page'] = 50;
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(5);
            $response['total_income'] = $this->Main_model->get_sum('tbl_income_wallet', array('type' => $type), 'ifnull(sum(amount),0) as sum');
            $response['user_incomes'] = $this->Main_model->get_limit_records('tbl_income_wallet', array('type' => $type), '*', $config['per_page'], $segment);
            $response['segament'] = $segment;
            $this->load->view('incomes', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function dateWisePayout($date = '') {
        if (is_admin()) {
            $response['header'] = 'Datewise Payout Summary';
            $config['base_url'] = base_url() . 'Admin/Withdraw/incomeLedgar';
            $config['total_rows'] = $this->Main_model->get_sum('tbl_income_wallet', 'date(created_at) = "'.$date.'"', 'ifnull(count(id),0) as sum');
            $config ['uri_segment'] = 4;
            $config['per_page'] = 100;
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $response['total_income'] = $this->Main_model->get_sum('tbl_income_wallet', 'date(created_at) = "'.$date.'"', 'ifnull(sum(amount),0) as sum');
            $response['user_incomes'] = $this->Main_model->get_records('tbl_income_wallet', 'date(created_at) = "'.$date.'"', '*');
            $response['segament'] = 0;
            // pr($response,true);
            $this->load->view('incomes', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function incomeLedgar($type = '') {
        if (is_admin()) {
            $response['header'] = 'Income Ledgar';
//            $config['base_url'] = base_url() . 'Admin/Withdraw/incomeLedgar';
//            $config['total_rows'] = $this->Main_model->get_sum('tbl_income_wallet', array(), 'ifnull(count(id),0) as sum');
//            $config ['uri_segment'] = 4;
//            $config['per_page'] = 50;
//            $this->pagination->initialize($config);
//            $segment = $this->uri->segment(4);
            $response['total_income'] = $this->Main_model->get_sum('tbl_income_wallet', array(), 'ifnull(sum(amount),0) as sum');
//            $response['user_incomes'] = $this->Main_model->get_limit_records('tbl_income_wallet', array(), '*', $config['per_page'], $segment);
            $response['user_incomes'] = $this->Main_model->get_records('tbl_income_wallet', array(), '*');
//            $response['segament'] = $segment;
            $this->load->view('incomes', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function AddressRequests() {
        if (is_admin()) {
            $where = array('kyc_status' => 1);
            $start_date = '';
            $end_date = '';
            // if ($this->input->server('REQUEST_METHOD') == 'POST') {
            //     $start_date = date_format(date_create($this->input->post('start_date')),"Y-m-d"); 
            //     $end_date = date_format(date_create($this->input->post('end_date')),"Y-m-d");; 
            //     $where = "  date(created_at) >= date('".$start_date."') and date(created_at) <= date('".$end_date."')";
            // }else{
            //     $where = array('kyc_status' => 1);
            // }
            $response['start_date'] = date_format(date_create($start_date), "m/d/Y");
            $response['end_date'] = date_format(date_create($end_date), "m/d/Y");
            $response['header'] = 'Bank Address Requests';
            $response['users'] = $this->Main_model->get_records('tbl_bank_details', $where, '*');
            foreach($response['users'] as $key => $banks){
                $response['users'][$key]['bank'] =  $this->Main_model->get_single_record('tbl_bank_list', array('id' => $banks['bank_name']), '*');
            }
            $this->load->view('AddressRequests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function ApprovedAddressRequests() {
        if (is_admin()) {
            $where = array('kyc_status' => 2);
            $start_date = '';
            $end_date = '';
            // if ($this->input->server('REQUEST_METHOD') == 'GET') {
            //     $start_date = date_format(date_create($this->input->get('start_date')),"Y-m-d"); 
            //     $end_date = date_format(date_create($this->input->get('end_date')),"Y-m-d");; 
            //     $where = "kyc_status  = 2 and date(created_at) >= date('".$start_date."') and date(created_at) <= date('".$end_date."')";
            // }
            $response['start_date'] = date_format(date_create($start_date), "m/d/Y");
            $response['end_date'] = date_format(date_create($end_date), "m/d/Y");
            $response['header'] = 'Approved Bank Address Requests';
            $response['users'] = $this->Main_model->get_records('tbl_bank_details', $where, '*');

            $this->load->view('AddressRequests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function RejectedAddressRequests() {
        if (is_admin()) {
            $where = array('kyc_status' => 3);
            $start_date = '';
            $end_date = '';
            // if ($this->input->server('REQUEST_METHOD') == 'GET') {
            //     $start_date = date_format(date_create($this->input->get('start_date')),"Y-m-d"); 
            //     $end_date = date_format(date_create($this->input->get('end_date')),"Y-m-d");; 
            //     $where = "kyc_status  = 3 and date(created_at) >= date('".$start_date."') and date(created_at) <= date('".$end_date."')";
            // }
            $response['start_date'] = date_format(date_create($start_date), "m/d/Y");
            $response['end_date'] = date_format(date_create($end_date), "m/d/Y");
            $response['header'] = 'Rejected Bank Address Requests';
            $response['users'] = $this->Main_model->get_records('tbl_bank_details', $where, '*');
            // pr($where,true);
            $this->load->view('AddressRequests', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function ApproveUserAddressRequest($id, $status) {
        if (is_admin()) {
            $data['success'] = 0;
            $res = $this->Main_model->update('tbl_bank_details', array('id' => $id), array('kyc_status' => $status));
            if ($res) {
                $data['message'] = 'Request Accepted Successfully';
                $data['success'] = 1;
            } else {
                $data['message'] = 'Error While Updating Status';
            }
            echo json_encode($data);
        } else {
            redirect('Admin/Management/login');
        }
    }

}
