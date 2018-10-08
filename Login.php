<?php

class Login
{

    function LoginVtiger()
    {


        $getChallenge = Server_Adress . '/webservice.php?operation=getchallenge&username=' . User_Name;

        $getToken = file_get_contents($getChallenge);

        $results = json_decode($getToken, true);

        if ($results['success'] == false) {

            echo "<pre>";

            print_r($results['error']);

        }


        $ChallengeTok = $results['result']['token'];

        $SecUrl = Server_Adress . '/webservice.php';


        $curl = curl_init($SecUrl);

        $Tokens = $ChallengeTok . User_AccesKey;

        $Tokens = md5($Tokens);

        $post_arry = array('operation' => 'login', 'username' => User_Name,

            'accessKey' => $Tokens);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_arry);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curlQuery = curl_exec($curl);

        $response = json_decode($curlQuery, true);

        if ($response['success'] == true) {

            $SesionName = $response['result']['sessionName'];
            return $SesionName;
        }

        print_r($response);
    }


}