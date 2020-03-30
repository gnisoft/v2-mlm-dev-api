<?php 
/** set your paypal credential **/

//development credentials
$config['client_id'] = 'AXJFAHJrf_pR9fjzYueDy0VzOekr4isD5Tgze04dqL6Jwo6PCXo_-iGYDLp4s0dF4lhhu_nsO1eAWocP';
$config['secret'] = 'EOjlv3ktkMhObKKlAltef_-qtbhFpv7n3pRpMFG_9bZyxCavTOTesHXzHE8t-8pX9dzgUp00DoFblUKI';

//referance credentials
//$config['client_id'] = 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS';
//$config['secret'] = 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL';

//client credentials
$config['client_id'] = 'ATWYJH57rO1BhOQJIaU_2MowAyuZIThp3sOPCSRs9hQgjLVirSMHBxTTWNdPef80QZbymV8zsAQwXt7m';
$config['secret'] = 'EE847Mqvnbdat0ngJ6e03dlxZfTWm994F5e5FjF31V0rxAmjrSm9C77rZ40q6p64yvzvxbigufCYpaYM';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);