
<?php
//@Author - Rayvn Manuel
//Utility | parse xml or json content => renderable array


function parseWebService($data){
   $error_message = array();
   //echo "Message is of type: ". gettype($error_message)."<br />";


//TRY - Fetch file and convert to string
//If it fails log error to error message.
    try{
      $json_file = html_entity_decode(file_get_contents($data));

    }   //catch exception
        catch(Exception $exFile) {
       $error_message -> $exFile->getMessage();
    }

  /****
  !IMPORTANTE!
  The preg_replace catches random characters that may be present in the file.
  Without it - json_decode breaks and returns a null object.
  **/

  try{
  $jsonObj = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json_file), TRUE );
   }
     catch(Exception $exDecode){
      $error_message -> $exDecode->getMessage();
   }

   if(empty($error_message)){
       //echo "WHEW! There are no errors!";
   }
    else {
     echo "Oooops! We gots errors!";
     print_r($error_message);
     }

return $jsonObj;
//print_r($jsonObj);

 }//end of function parseWebServiceFle


function displayWSCountryResults($dataObj, $country_code){

       $countries = array();
       $countries =  parseWebService($dataObj);
                    //print_r($countries['data']);
           foreach($countries['data'] as $keys => $values){
               foreach($values as $key => $value){

                         //echo "Key: ".$key."| Value: ".$value."<br />";
                         $country[$key] = $value;
                   }

               $countryName =  $country['name'];
               $countryCapital =  $country['capital'];
               $countryGovtStructure =  $country ['governmentType'];
               $countryPopulation = number_format( $country['population']);
               $countryCurrencyName =  $country['currency'];
               $countryCurrencyCode =   $country['currencyCode'];
               $countryCode =   $country['countryCode'];
               $countryFlag =   $country['flag'];


                if($country_code == $countryCode){
                    print('<h2>'.ucwords($countryName). '</h2>');
                    print("<img src='./assets/media/images/countryFlags/$countryFlag.svg' width='100em' />");
                    print('<br /><br />');
                    print('<ul class="list-unstyled">');
                    print('<li><strong>Capital: </strong>'.ucwords($countryCapital). '</li>');
                    print('<li><strong>Population: </strong>'.$countryPopulation. '</li>');
                    print('<li><strong>Government Structure: </strong>'.ucwords($countryGovtStructure). '</li>');
                    print('<li><strong>Currency: </strong>'.ucwords($countryCurrencyName, ". "). ' ('.$countryCurrencyCode.')'. '</li>');
                    print('<li><strong>Country Code: </strong>'.$countryCode. '</li>');
                    print('</ul>');
                    print('<hr />');

                }  //echo $countryList;



     }

} //end of function displayWSCountryResults






