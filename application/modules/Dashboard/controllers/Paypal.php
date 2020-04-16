<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/bootstrap.php'); // require paypal files

use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Agreement;

class Paypal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model('paypal_model', 'paypal');
        $this->load->helper(array('user'));
        // paypal credentials
        $this->config->load('Paypal');

        $this->_api_context = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('client_id'), $this->config->item('secret')
                )
        );
    }

    function createPlan() {
        $plan = new Plan();
        $plan->setName('Partners Subscription')
                ->setDescription('Subscription Plan for Level Income')
                ->setType('fixed');
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
                ->setType('REGULAR')
                ->setFrequency('Month')
                ->setFrequencyInterval("1")
                ->setCycles("12")
                ->setAmount(new Currency(array('value' => 20, 'currency' => 'USD')));
        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
                ->setAmount(new Currency(array('value' => 0, 'currency' => 'USD')));

        $paymentDefinition->setChargeModels(array($chargeModel));
        $merchantPreferences = new MerchantPreferences();
        $baseUrl = base_url() . 'Dashboard/payment_response';
        $merchantPreferences->setReturnUrl("$baseUrl/success")
                ->setCancelUrl("$baseUrl/failure")
                ->setAutoBillAmount("yes")
                ->setInitialFailAmountAction("CONTINUE")
                ->setMaxFailAttempts("0")
                ->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
        $request = clone $plan;
        try {
            $output = $plan->create($this->_api_context);
        } catch (Exception $ex) {
            ResultPrinter::printError("Created Plan", "Plan", null, $request, $ex);
            exit(1);
        }
        ResultPrinter::printResult("Created Plan", "Plan", $output->getId(), $request, $output);

        pr($output);
    }

    function plan_list() {
        try {
            $params = array('page_size' => '10');
            $planList = Plan::all($params, $this->_api_context);
        } catch (Exception $ex) {
            ResultPrinter::printError("List of Plans", "Plan", null, $params, $ex);
            exit(1);
        } ResultPrinter::printResult("List of Plans", "Plan", null, $params, $planList);

        return $planList;
    }

    public function SearchBillingTransactions() {
        // Adding Params to search transaction within a given time frame.
        $agreementId = 'I-DNYGSVPPX9PG';
        $params = array('start_date' => date('Y-m-d', strtotime('-15 years')), 'end_date' => date('Y-m-d', strtotime('+5 days')));

        try {
            $result = Agreement::searchTransactions($agreementId, $params, $this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Search for Transactions", "AgreementTransaction", $agreementId, null, $ex);
            exit(1);
        }

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printResult("Search for Transactions", "AgreementTransaction", $agreementId, $params, $result);

//        return $agreement;
    }

    function index() {
        $this->load->view('content/payment_credit_form');
    }

    public function paypal_token() {
        pr($payment->getAccessToken($this->_api_context));
    }

    function create_payment_with_paypal() {

        // setup PayPal api context
        $payment = new Payment();
        $this->_api_context->setConfig($this->config->item('settings'));


// ### Payer
// A resource representing a Payer that funds a payment
// For direct credit card payments, set payment method
// to 'credit_card' and add an array of funding instruments.

        $payer['payment_method'] = 'paypal';

// ### Itemized information
// (Optional) Lets you specify item wise
// information
        $item1["name"] = $this->input->post('item_name');
        $item1["sku"] = $this->input->post('item_number');  // Similar to `item_number` in Classic API
        $item1["description"] = $this->input->post('item_description');
        $item1["currency"] = "USD";
        $item1["quantity"] = 1;
        $item1["price"] = $this->input->post('item_price');

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
        $details['tax'] = $this->input->post('details_tax');
        $details['subtotal'] = $this->input->post('details_subtotal');
// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount['currency'] = "USD";
        $amount['total'] = $details['tax'] + $details['subtotal'];
        $amount['details'] = $details;
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
        $transaction['description'] = 'Payment description';
        $transaction['amount'] = $amount;
        $transaction['invoice_number'] = uniqid();
        $transaction['item_list'] = $itemList;

        // ### Redirect urls
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
        $baseUrl = base_url('Dashboard/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl . "paypal/getPaymentStatus")
                ->setCancelUrl($baseUrl . "paypal/getPaymentStatus");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to sale 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $ex);
            exit(1);
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        if (isset($redirect_url)) {
            /** redirect to paypal * */
            redirect($redirect_url);
        }

        $this->session->set_flashdata('success_msg', 'Unknown error occurred');
        redirect('Dashboard/paypal/index');
    }

    public function getPaymentStatus() {

        // paypal credentials

        /** Get the payment ID before session clear * */
        $payment_id = $this->input->get("paymentId");
        $PayerID = $this->input->get("PayerID");
        $token = $this->input->get("token");
        /** clear the session payment ID * */
        if (empty($PayerID) || empty($token)) {
            $this->session->set_flashdata('success_msg', 'Payment failed');
            redirect('Dashboard/ActivateAccount');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        /** PaymentExecution object includes information necessary * */
        /** to execute a PayPal account payment. * */
        /** The payer_id is added to the request query parameters * */
        /** when the user is redirected from paypal back to your site * */
        $execution = new PaymentExecution();
        $execution->setPayerId($this->input->get('PayerID'));

        /*         * Execute the payment * */
        $result = $payment->execute($execution, $this->_api_context);

//        pr($result,true);
        //  DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $trans = $result->getTransactions();

            // item info
            $Subtotal = $trans[0]->getAmount()->getDetails()->getSubtotal();
            $Tax = $trans[0]->getAmount()->getDetails()->getTax();

            $payer = $result->getPayer();
            // payer info //
            $PaymentMethod = $payer->getPaymentMethod();
            $PayerStatus = $payer->getStatus();
            $PayerMail = $payer->getPayerInfo()->getEmail();

            $relatedResources = $trans[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            // sale info //
            $saleId = $sale->getId();
            $CreateTime = $sale->getCreateTime();
            $UpdateTime = $sale->getUpdateTime();
            $State = $sale->getState();
            $Total = $sale->getAmount()->getTotal();
            /** it's all right * */
            /** Here Write your database logic like that insert record or value in database if you want * */
            $this->paypal->create($Total, $Subtotal, $Tax, $PaymentMethod, $PayerStatus, $PayerMail, $saleId, $CreateTime, $UpdateTime, $State);
            $this->session->set_flashdata('success_msg', 'Payment success');
            redirect('Dashboard/success');
        }
        $this->session->set_flashdata('success_msg', 'Payment failed');
        redirect('Dashboard/paypal/cancel');
    }

    function success() {
        $this->load->view("content/success");
    }

    function cancel() {
        $this->paypal->create_payment();
        $this->load->view("content/cancel");
    }

    function CallBack($user_id) {
        echo $this->paypal->add('tbl_callback', array('user_id' => $user_id));
    }

}
