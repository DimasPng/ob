<?php

require $_SERVER["DOCUMENT_ROOT"].'/ob/protected/vendor/sendpulse/autoload.php';
use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

define('API_USER_ID', Settings::item('sendpulseID'));
define('API_SECRET', Settings::item('sendpulseSecret'));
define('PATH_TO_ATTACH_FILE', __FILE__);

class Sendpulse
{    
    public static function getLists(){  
    	try {	    	
		    $SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());	        
			return $SPApiClient->listAddressBooks(100); 		   
		}
		catch (Exception $e) {
		    
		}
    }  

    public static function addEmail($bookID, $email, $firstName){         
        $SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());
        $emails = array(
		    array(
		        'email' => $email,
		        'variables' => array(
		            'Имя' => $firstName,
		        )
		    )
		);

        $SPApiClient->addEmails($bookID, $emails);
    }  
}
