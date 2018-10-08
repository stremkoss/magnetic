<?php
//MOCK_DATA_TEST_TI.csv

$OpenFile = fopen('MOCK_DATA_TEST_TI.csv','r');

$ArrayKeys = fgetcsv($OpenFile);

$NewCsv = fopen('NeCsv','w');

$Fwrite = fputcsv($NewCsv,$ArrayKeys);


while (($handle = fgetcsv($OpenFile,1000000,',' )) !== false) {

         $ArrCombine = array_combine($ArrayKeys, $handle);

         foreach ($ArrCombine as $key => $value) {

                 $ArrCombine['phone'] = preg_replace("/[^a-zA-Z0-9\']/",'',$ArrCombine['phone']);


                 $ArrCombine['birthday'] = date("d-m-Y",strtotime($ArrCombine['birthday']));

                $list [] = $ArrCombine;


             foreach ($list as $fields) {

                 fputcsv($NewCsv, $fields);

             }

                 break;

              }




         }









