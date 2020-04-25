<?php

if (!function_exists('pr')) {

    function pr($array, $die = false) {
        echo'<pre>';
        print_r($array);
        echo'</pre>';
        if ($die)
            die();
    }

}
if (!function_exists('is_admin')) {

    function is_admin() {
        $ci = & get_instance();
        $ci->load->library('session');
        if (isset($ci->session->userdata['role']) && $ci->session->userdata['role'] == 'A') {
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('pool_count')) {

    function pool_count() {
        $ci = & get_instance();
        $ci->load->model('Main_model');
        $pool_count = $ci->Main_model->get_single_record('tbl_pool', array(), 'max(pool_level) as pool_count');
        return $pool_count;
    }

}
if (!function_exists('calculate_rank')) {

    function calculate_rank($directs) {
        if ($directs >= 100)
            $rank = 'Diamond';
        elseif ($directs >= 50)
            $rank = 'Emerald';
        elseif ($directs >= 25)
            $rank = 'Topaz';
        elseif ($directs >= 20)
            $rank = 'Pearl';
        elseif ($directs >= 15)
            $rank = 'Gold';
        elseif ($directs >= 10)
            $rank = 'Silver';
        elseif ($directs >= 5)
            $rank = 'Star';
        else
            $rank = 'Associate';

        return $rank;
    }

}
if (!function_exists('calculate_package')) {

    function calculate_package($package_id) {
        if ($package_id == 1)
            $package = '3600';
        elseif ($package_id == 2)
            $package = '1400';
        else
            $package = 'Free';
        return $package;
    }

}

if (!function_exists('incomes')) {

    function incomes() {
        $incomes = array(
            'direct_income' => 'Direct Revenue',
            'direct_level_income' => 'Other Revenue',
        );
        // return array_search($income_name, $incomes);
        return $incomes;
    }

}
if (!function_exists('get_income_name')) {

    function get_income_name($income_name) {
        $incomes = array(
            'direct_income' => 'Direct Revenue',
            'direct_level_income' => 'Other Revenue',
        );
        // return array_search($income_name, $incomes);
        return $incomes[$income_name];
    }

}
if (!function_exists('calculate_income')) {

    function calculate_income($incomeArr) {

        $incomes = array(
            'direct_income' => 'Direct Revenue',
            'direct_level_income' => 'Other Revenue',
        );
        $income_count = array();
        $total_payout = 0;
        foreach ($incomes as $key => $income) {
            $income_count[$key] = 0;
            foreach ($incomeArr as $arr) {
                if ($arr['type'] == $key) {
                    $income_count[$key] = $arr['sum'];
                }
            }
            $total_payout = $income_count[$key] + $total_payout;
        }
        $income_count['total_payout'] = $total_payout;
        return $income_count;
    }

}
if (!function_exists('active_menu')) {

    function active_menu($link, $call_from) {
        $status = 0;
        if ($call_from == 'Settings') {
            if ($link == '/Admin/Settings/ResetPassword' || $link == '/Admin/Package/Edit/2' || $link == '/Admin/Package/Edit/1' || $link == '/Admin/Management/NetworkCommission') {
                $status = 1;
            }
        }
        if ($call_from == 'Membership') {
            if ($link == '/Admin/Management/Tree/Admin' || $link == '/Admin/Management/users' || $link == '/Admin/Management/paidUsers' || $link == '/Admin/Management/subscription_members' || $link == '/Admin/Withdraw/AddressRequests' || $link == '/Admin/Management/today_joinings') {
                $status = 1;
            }
        }
        if ($call_from == 'WalletManagement') {
            if ($link == '/Admin/Withdraw/Pending' || $link == '/Admin/Management/fund_history' || $link == '/Admin/Withdraw') {
                $status = 1;
            }
        }
        if ($call_from == 'E-Commerce') {
            if ($link == '/Admin/Settings/manage_store_url') {
                $status = 1;
            }
        }
        if ($call_from == 'NetworkCommisions') {
            if ($link == '/Admin/Management/Bill_requests') {
                $status = 1;
            }
        }
        if ($call_from == 'Reports') {
            if ($link == '/Admin/Withdraw/incomeLedgar/' || $link == '/Admin/Withdraw/payout_summary/') {
                $status = 1;
            }
        }
        if ($call_from == 'Support') {
            if ($link == '/Admin/Support/inbox') {
                $status = 1;
            }
        }
        return $status;
    }

}
