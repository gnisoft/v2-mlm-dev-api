<?php
/** set your paypal credential **/

$config['client_id'] = 'AXJFAHJrf_pR9fjzYueDy0VzOekr4isD5Tgze04dqL6Jwo6PCXo_-iGYDLp4s0dF4lhhu_nsO1eAWocP';
$config['secret'] = 'EOjlv3ktkMhObKKlAltef_-qtbhFpv7n3pRpMFG_9bZyxCavTOTesHXzHE8t-8pX9dzgUp00DoFblUKI';

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