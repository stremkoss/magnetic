<?php
class Leads extends Login {

    function LeadsVtiger($SesionName)
    {

        $query = "select * from Leads LIMIT  10;";

        $queryParam = urlencode($query);

        $params = Server_Adress . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";


        $getFirst = file_get_contents($params);

        $Decode = json_decode($getFirst, true);



        print_r($Decode);
    }
}