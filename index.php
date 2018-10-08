<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors',1);

require ('Login.php');
require ('Contacts.php');
require ('Leads.php');
require ('Accounts.php');
require ('Users.php');
require ('Opportunities.php');



const Server_Adress = 'https://stremkossss.od2.vtiger.com';

const User_Name = 'urastrembu@gmail.com';

const User_AccesKey = 'C8WFieLz5WMCdLLu';


$index = new Users();

$SesionId = $index->LoginVtiger();

$res = $index->UsersVtiger($SesionId );

print_r($res);