<?php

class Rimplenet_Base_Transactions {


	public function __construct() {
		$this->load_required_files();
	}

    private function load_required_files() {
   	 //Add Required Files to Load
	 require_once plugin_dir_path( dirname( __FILE__ ) ) . 'transactions/base-transactions.php';
	 require_once plugin_dir_path( dirname( __FILE__ ) ) . 'transactions/get-transactions.php';
    }
	
}


$Rimplenet_Base_Transfers = new Rimplenet_Base_Transactions();