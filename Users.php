<?php
class Users  extends Login
{

    function UsersVtiger($SesionName)
    {
        for ($r = 0; $r <= 10; $r++) {

            $query = "select * from Users limit 1 ;";

            $queryParam = urlencode($query);

            $params = Server_Adress . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";


            $getFirst = file_get_contents($params);

            $Decode = json_decode($getFirst, true);

            $Users = [];

            $UsersArray = $Decode['result'];

            echo "<pre>";
            echo "<h1>Users</h1>";
            print_r($UsersArray);
            echo "<br>";



        foreach ($UsersArray as $value) {

            if (isset($value['id'])) {

                $user_id = $value['id'];
            }

            $query = "select * from Calendar where assigned_user_id = $user_id ; ";

            $queryParam = urlencode($query);

            $params = Server_Adress . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";

            $getFirst = file_get_contents($params);

            $Decode = json_decode($getFirst, true);

            $Task = array();

            $Task = $Decode['result'];

            echo "<h1>Tasks</h1>";

            print_r($Task);

        }
     }
    }
}