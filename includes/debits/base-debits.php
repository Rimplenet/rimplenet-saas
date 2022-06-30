<?php

namespace Debits;

use Utils\Utils;

abstract class Debits extends Utils
{

    /**
     * Check  if transaction has been executed before time
     * @param int $id > id of transaction
     * @param string $type > type of transaction (credit / debit)
     * @return object>boolean
     */
    protected function debitsExists(int $id, string $type= 'credit')
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM $wpdb->postmeta WHERE post_id ='$id' AND meta_key='request_id' AND meta_value = '$type' ");
    }
}
