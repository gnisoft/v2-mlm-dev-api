<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /* This function create new Service. */

    function create($Total, $SubTotal, $Tax, $PaymentMethod, $PayerStatus, $PayerMail, $saleId, $CreateTime, $UpdateTime, $State) {
        $insertArr['txn_id'] = $saleId;
        $insertArr['PaymentMethod'] = $PaymentMethod;
        $insertArr['PayerStatus'] = $PayerStatus;
        $insertArr['PayerMail'] = $PayerMail;
        $insertArr['Total'] = $Total;
        $insertArr['SubTotal'] = $SubTotal;
        $insertArr['Tax'] = $Tax;
        $insertArr['Payment_state'] = $State;
        $insertArr['CreateTime'] = $CreateTime;
        $insertArr['UpdateTime'] = $UpdateTime;
        $this->db->insert('payments', $insertArr);
        return $this->db->insert_id();
    }

}
