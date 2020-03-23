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
        if($directs >= 100)
            $rank = 'Diamond';
        elseif($directs >= 50)
            $rank = 'Emerald';
        elseif($directs >= 25)
            $rank = 'Topaz';
        elseif($directs >= 20)
            $rank = 'Pearl';
        elseif($directs >= 15)
            $rank = 'Gold';
        elseif($directs >= 10)
            $rank = 'Silver';
        elseif($directs >= 5)
            $rank = 'Star';
        else
            $rank = 'Associate';

        return $rank;
    }
}
if (!function_exists('calculate_package')) {

    function calculate_package($package_id) {
        if($package_id == 1)
            $package = '3600';
        elseif($package_id == 2)
            $package = '1400';
        else
            $package = 'Free';
        return $package;
    }
}

if (!function_exists('incomes')) {

    function incomes() {
        $incomes = array(
            'direct_income'=> 'Direct Income',
            'matching_bonus'=> 'Matching Income',
            'roi_income'=> 'ROI Income',
            'rewards_income'=> 'Rewards Bonus',
            'direct_income_withdraw' => 'Withdraw Request',
            'fasttrack_income' => 'FastTrack Income',
        );
        // return array_search($income_name, $incomes);
        return $incomes;
    }

}
if (!function_exists('get_income_name')) {

    function get_income_name($income_name) {
        $incomes = array(
            'direct_income'=> 'Direct Income',
            'matching_bonus'=> 'Matching Income',
            'roi_income'=> 'ROI Income',
            'rewards_income'=> 'Rewards Bonus',
            'direct_income_withdraw' => 'Withdraw Request',
            'fasttrack_income' => 'FastTrack Income',
        );
        // return array_search($income_name, $incomes);
        return $incomes[$income_name];
    }

}
if (!function_exists('calculate_income')) {

    function calculate_income($incomeArr) {
        
        $incomes = array(
            'direct_income'=> 'Direct Income',
            'matching_bonus'=> 'Matching Income',
            'roi_income'=> 'ROI Income',
            'rewards_income'=> 'Rewards Bonus',
            'direct_income_withdraw' => 'Withdraw Request',
            'fasttrack_income' => 'FastTrack Income',
        );
        $income_count = array();
        $total_payout = 0;
        foreach($incomes as $key => $income){
            $income_count[$key] = 0;
            foreach($incomeArr as $arr){
                if($arr['type'] == $key){
                    $income_count[$key] = $arr['sum'];
                }
            }
            $total_payout = $income_count[$key] + $total_payout;
        }
        $income_count['total_payout']= $total_payout;
        return $income_count;
    }
}


