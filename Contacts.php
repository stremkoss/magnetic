<?php

class  Contacts extends Login
{

    function ContactsVtiger($SesionName)
    {

        $query = "select * from Contacts LIMIT  10;";

        $queryParam = urlencode($query);

        $params = Server_Adress . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";


        $getFirst = file_get_contents($params);

        $Decode = json_decode($getFirst, true);

        echo "<pre>";


        print_r($Decode);
    }
}

//const Server_Adress = 'https://stremkossss.od2.vtiger.com';
//
//const User_Name = 'urastrembu@gmail.com';
//
//const User_AccesKey = 'C8WFieLz5WMCdLLu';
//
//     function LoginVtiger() {
//
//
//         $getChallenge = Server_Adress.'/webservice.php?operation=getchallenge&username='.User_Name;
//
//         $getToken = file_get_contents($getChallenge);
//
//         $results = json_decode($getToken,true);
//
//         if( $results['success'] == false )  {
//
//          echo "<pre>";
//
//          print_r($results['error']);
//
//         }
//
//
//
//         $ChallengeTok = $results['result']['token'];
//
//         $SecUrl = Server_Adress . '/webservice.php';
//
//
//         $curl = curl_init($SecUrl);
//
//         $Tokens = $ChallengeTok . User_AccesKey;
//
//         $Tokens = md5($Tokens);
//
//         $post_arry = array('operation'=>'login', 'username'=> User_Name,
//
//             'accessKey'=>$Tokens );
//         curl_setopt($curl , CURLOPT_POST, true);
//         curl_setopt($curl , CURLOPT_POSTFIELDS, $post_arry);
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//         curl_exec($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//         $curlQuery = curl_exec($curl);
//
//         $response = json_decode($curlQuery ,true);
//
//         if($response['success'] == true) {
//
//             $SesionName = $response['result']['sessionName'];
//             return $SesionName;
//         }
//
//         die();
//     }
//
//  $SesionName = LoginVtiger();
//
//
//
//   $queryFirst = Server_Adress . '/webservice.php?operation=listtypes&sessionName=' . $SesionName;
//
//   $getFirst = file_get_contents($queryFirst);
//
//   $moduleName = 'Contacts';
//
//$querySec = Server_Adress."/webservice.php?operation=describe&sessionName=$SesionName&elementType=$moduleName" ;
//
//
//$getFirstS = file_get_contents($querySec);
//
//$Decode = json_decode($getFirstS);
//
//$query = "select * from Contacts LIMIT  10;";
//
//$queryParam = urlencode($query);
//
//$params =   Server_Adress  . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";
//
//
//$getFirst = file_get_contents($params);
//
//$Decode = json_decode($getFirst ,true);
//
//echo "<pre>";
//
//
//print_r($Decode);