<?php
 include_once('master.inc');


 function createCountrySelectOptions($list){

     $listArray = parse_ini_file($list, true);

  print('<select class="form-control single_select" name="country_code">');
  print ('<option class="country_list" id="country_code">Select a Country</option>');
    foreach($listArray as $countries){
        foreach($countries as $key => $value){

            if(!isset($_POST['country_code'])){

            $_POST['country_code'] = 'USA';
            print("<option value='USD' selected='selected' class ='list_items'>United States</option>");

            }elseif(($_POST['country_code']!== null) && ($_POST['country_code']==$value)){
            print("<option value='$value' selected='selected' class ='list_items'>".ucwords($key)."</option>");
            } else{
            print("<option value='$value' class ='list_items'>".ucwords($key)."</option>");
            }

        }
    }


print("</select>");

}



 function createCurrencySelectOptions($list){

     $listArray = parse_ini_file($list, true);

  print('<select class="form-control single_select" name="currency_code">');
  print ('<option class="country_list" id="currency_code">Select a Country</option>');
    foreach($listArray as $countries){
        foreach($countries as $key => $value){

            if(!isset($_POST['country_code'])){

            print("<option value='USD' selected='selected' class ='list_items'>United States</option>");

            }elseif(($_POST['country_code']!== null) && ($_POST['country_code']==$value)){
             print("<option value='$key' selected='selected' class ='list_items'>".ucwords($value, " (")."</option>");

            } else{
            print("<option value='$key' class ='list_items'>".ucwords($value, " (")."</option>");
            }

        }
    }


print("</select>");

}