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
if (!function_exists('is_logged_in')) {

//    protected $CI;

    function is_logged_in() {
        $ci = & get_instance();
        $ci->load->library('session');
        if (isset($ci->session->userdata['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('userinfo')) {

    function userinfo() {
        $ci = & get_instance();
        $ci->load->model('user_model');
        $userdetails = $ci->user_model->get_single_object('tbl_users', array('user_id' => $ci->session->userdata['user_id']), '*');
        return $userdetails;
    }

}
if (!function_exists('store_url')) {

    function store_url() {
        $ci = & get_instance();
        $ci->load->model('user_model');
        $url = $ci->user_model->get_single_object('tbl_shopping_url', array(), '*');
        return $url->url;
    }

}
if (!function_exists('pool_count')) {

    function pool_count() {
        $ci = & get_instance();
        $ci->load->model('user_model');
        $pool_count = $ci->user_model->get_single_object('tbl_pool', array('user_id' => $ci->session->userdata['user_id']), 'ifnull(count(id),0) as pool_count');
        return $pool_count;
    }

}
if (!function_exists('country_flag')) {

    function country_flag($country_id) {
        if ($country_id != '') {
            $ci = & get_instance();
            $ci->load->model('user_model');
            $name = $ci->user_model->get_single_object('countries', array('id' => $country_id), 'name');
            return str_replace(' ', '-', $name->name);
        }else{
            return;
        }
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

        return $package;
    }

}
if (!function_exists('calculate_rank_bonus')) {

    function calculate_rank_bonus($directs, $package_id) {
        if ($package_id == 1) {
            if ($directs >= 100)
                $income = 200;
            elseif ($directs >= 50)
                $income = 175;
            elseif ($directs >= 25)
                $income = 150;
            elseif ($directs >= 20)
                $income = 125;
            elseif ($directs >= 15)
                $income = 100;
            elseif ($directs >= 10)
                $income = 75;
            elseif ($directs >= 5)
                $income = 50;
            else
                $income = 0;

            return $income;
        }else {
            if ($directs >= 100)
                $income = 105;
            elseif ($directs >= 50)
                $income = 90;
            elseif ($directs >= 25)
                $income = 75;
            elseif ($directs >= 20)
                $income = 60;
            elseif ($directs >= 15)
                $income = 45;
            elseif ($directs >= 10)
                $income = 30;
            elseif ($directs >= 5)
                $income = 15;
            else
                $income = 0;

            return $income;
        }
    }

}
if (!function_exists('notify_user')) {

    function notify_user($user_id, $message) {
        $ci = & get_instance();
        $ci->load->model('user_model');
        $user = $ci->user_model->get_single_object('tbl_users', array('user_id' => $user_id), 'name,phone,email');

        /* for sms */
        // $key = "303f2b8d83XX";
        // $userkey = "gniweb2";
        // $senderid = "GRAMIN";
        // $baseurl = "sms.gniwebsolutions.com/submitsms.jsp?";
        // $msg = urlencode($message);
        // $url = $baseurl . 'user=' . $userkey . '&&key=' . $key . '&&mobile=' . $user->phone . '&&senderid=' . $senderid . '&&message=' . $msg . '&&accusage=1';
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_URL, $url);
        // $data = curl_exec($ch);
        // curl_close($ch);
        // $sms_data = array('user_id' => $user_id , 'message' => $msg , 'response' => $data);
        // $ci->user_model->add('tbl_sms_counter', $sms_data);
        /* for sms */
        /* for email */
        date_default_timezone_set('Asia/Singapore');
        $CI = & get_instance();
        $CI->load->library('email');
        $CI->email->from('info@hope.net.ph', 'Hope Partners');
        $CI->email->to($user->email);
        $CI->email->subject('Registrataion Alert');
        $CI->email->message($message);

        $CI->email->send();
        /* for email */
    }

}
if (!function_exists('tax')) {

    function tax() {
        $ci = & get_instance();
        $ci->load->model('user_model');
        $tax = $ci->user_model->get_single_object('tbl_tax', array('id' => 1), '*');
        return $tax->tax;
    }

}
if (!function_exists('cart_items')) {

    function cart_items() {
        $ci = & get_instance();
        $ci->load->model('Shopping_model');
        $userdetails = $ci->Shopping_model->cart_items($ci->session->userdata['user_id']);
        return $userdetails;
    }

}
if (!function_exists('tree_img')) {

    function tree_img($package_amount, $empty) {
        if ($empty == 0) {
            if ($package_amount > 0) {
                $img = base_url('SiteAssets/treeimage/tree.png');
            } else {
                $img = base_url('SiteAssets/treeimage/male.jpg');
            }
        } else {
            $img = base_url('SiteAssets/treeimage/unknown.jpg');
        }
        return $img;
    }

}


if (!function_exists('get_income_name')) {

    function get_income_name($income_name) {
        $incomes = array(
            'direct_income' => 'Direct Revenue',
            'direct_level_income' => 'Other Revenue',
            'income_transfer' => 'Income Transfer',
            'direct_income_withdraw' => 'Withdraw Amount',
            'network_commisions' => 'Network Commisions',
        );
        // return array_search($income_name, $incomes);
        return $incomes[$income_name];
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

if (!function_exists('getIndianCurrency')) {

    function getIndianCurrency($number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else
                $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }

}

function country_dropdown($name, $id, $class, $selected_country, $top_countries = array(), $all, $selection = NULL, $show_all = TRUE) {
    // Getting the array of countries from the config file
    $countries = config_item('country_list');
    $html = "<select name='{$name}' id='{$id}' class='{$class}'>";
    $selected = NULL;
    if (in_array($selection, $top_countries)) {
        $top_selection = $selection;
        $all_selection = NULL;
    } else {
        $top_selection = NULL;
        $all_selection = $selection;
    }
    if (!empty($selected_country) && $selected_country != 'all' && $selected_country != 'select') {
        $html .= "<optgroup label='Selected Country'>";
        if ($selected_country === $top_selection) {
            $selected = "SELECTED";
        }
        $html .= "<option value='{$selected_country}'{$selected}>{$countries[$selected_country]}</option>";
        $selected = NULL;
        $html .= "</optgroup>";
    } else if ($selected_country == 'all') {
        $html .= "<optgroup label='Selected Country'>";
        if ($selected_country === $top_selection) {
            $selected = "SELECTED";
        }
        $html .= "<option value='all'>All</option>";
        $selected = NULL;
        $html .= "</optgroup>";
    } else if ($selected_country == 'select') {
        $html .= "<optgroup label='Selected Country'>";
        if ($selected_country === $top_selection) {
            $selected = "SELECTED";
        }
        $html .= "<option value='select'>Select</option>";
        $selected = NULL;
        $html .= "</optgroup>";
    }
    if (!empty($all) && $all == 'all' && $selected_country != 'all') {
        $html .= "<option value='all'>All</option>";
        $selected = NULL;
    }
    if (!empty($all) && $all == 'select' && $selected_country != 'select') {
        $html .= "<option value='select'>Select</option>";
        $selected = NULL;
    }

    if (!empty($top_countries)) {
        $html .= "<optgroup label='Top Countries'>";
        foreach ($top_countries as $value) {
            if (array_key_exists($value, $countries)) {
                if ($value === $top_selection) {
                    $selected = "SELECTED";
                }
                $html .= "<option value='{$value}'{$selected}>{$countries[$value]}</option>";
                $selected = NULL;
            }
        }
        $html .= "</optgroup>";
    }
    if ($show_all) {
        $html .= "<optgroup label='All Countries'>";
        foreach ($countries as $key => $country) {
            if ($key === $all_selection) {
                $selected = "SELECTED";
            }
            $html .= "<option value='{$key}'{$selected}>{$country}</option>";
            $selected = NULL;
        }
        $html .= "</optgroup>";
    }

    $html .= "</select>";
    return $html;
}
