<?php

// use Wallets\GetWallets\RimplenetGetWallets;

$RetrieveWallet = new class extends RimplenetGetWallets
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register_api_routes']);
    }

    public function register_api_routes()
    {
        register_rest_route('/rimplenet/v1', 'wallets', [
            'methods' => 'GET',
            'callback' => [$this, 'retrieve_wallet']
        ]);
    }

    public function retrieve_wallet(WP_REST_Request $req)
    {
        // $allowed_roes = []; 
        do_action( 'rimplenet_api_request', $req, $allowed_roles = ['admin'], $action = 'get_rimplenet_wallets');
        # ================= set fields ============
        $wlt_id  = sanitize_text_field($req['wallet_id']);
        $page      = $req['page'] ?? 1;

        $key = (object) apache_request_headers();

        $obj = new RimplenetAuthorization;
        $rimp = $obj->authorization(str_replace('Bearer ', '', $key->Authorization));


            return new WP_REST_Response($rimp, $this->response['status_code']);
            
        # Check required
        // if ($wlt_id !== '') :
        //     # if wallet id is not empty return the wallet
        //     $this->getWallet($wlt_id);
        //     return new WP_REST_Response($this->response, $this->response['status_code']);
        // else :
        //     $this->getWallets();
        //     return new WP_REST_Response($this->response, $this->response['status_code']);
        // endif;
    }
};