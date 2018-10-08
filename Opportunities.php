<?php

class Opportunities extends Login {

    function OpportunitiesVtiger($SesionName)
    {

        $query = "select * from Opportunities LIMIT  10;";

        $queryParam = urlencode($query);

        $params = Server_Adress . "/webservice.php?operation=query&sessionName=$SesionName&query=$queryParam";


        $getFirst = file_get_contents($params);

        $Decode = json_decode($getFirst, true);

        echo "<pre>";


        print_r($Decode);
    }
}