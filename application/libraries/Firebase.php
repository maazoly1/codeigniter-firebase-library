<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__.'/../../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Firebase {

    protected $config	= array();
    protected $serviceAccount;

    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

        $this->serviceAccount = ServiceAccount::fromJsonFile($this->CI->config->item('firebase_app_key'));
    }

    
    public function init()
    {
        //this databaseURL you will find in Firebase Project setting/ Service Accounts
        //And this is very necessary because you will never connect with the realtime Database codeigniter 3 Projects
        return $firebase = (new Factory)->withServiceAccount($this->serviceAccount)->withDatabaseUri('https://my-project.firebaseio.com')->create();
    }
}
