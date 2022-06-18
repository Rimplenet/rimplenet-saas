<?php

// namespace Credits\CreateCredits;

// use Rimplenet_Wallets;
use WalletBalance\RimplenetBalance;
use Traits\Wallet\RimplenetWalletTrait;

class RimplenetGetWalletBalance extends RimplenetBalance
{
    use RimplenetWalletTrait;
    public function getWalletBalance(array $param = [])
    {

        $prop = empty($param) ? $this->req : $param;
        extract($prop);

        $data =array();
        foreach ($wallet_id as $key => $value) {
            $data[$key]=$this->get_withdrawable_wallet_bal($user_id, $value) + $this->get_nonwithdrawable_wallet_bal($user_id, $value);
        }

        return $this->response = [
                'status_code' => 200,
                'status' => true,
                'response_message' => 'Wallet Balance retrieved',
                'data' => $data
            ];

        // $balance = $this->get_withdrawable_wallet_bal($user_id, $wallet_id) + $this->get_nonwithdrawable_wallet_bal($user_id, $wallet_id);
       
    }
}
