
<?php
//@Author - Rayvn Manuel
//Utility | parse xml or json content => renderable array

 //Currency

    function createCurrencyURL(){
     $currencyAPIURL = "http://api.fixer.io/latest";
     $currencySource = "source=".$src;
     $currencyTarget =  "currencies=".$currency;
     $API_format = "format=1";

      //CREATE Currency WebService API URL
       if(isset($currencySource)){
        $currencyURL = "$currencyAPIURL?$currencyAPIKEY&amp;$currencyTarget&amp;$currencySource&amp;$API_format";
        return $currencyURL;
        //echo "This is the URL: " .$currencyURL."<br />";
         } else{

           echo "Source not set";
         }

    }



 function fetchWSData($url){

  //USE PHP cURL to retrieve webservices jsObje

   $wsFile = 'data/webserviceOutputFile.txt';

  $fp = fopen($wsFile, 'w+');
 // Initialize cURL
 $curl = curl_init();
  // Set query data here with the URL
  curl_setopt($curl, CURLOPT_URL, $currencyURL);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_FILE, $fp);

$ws_response = trim(curl_exec($curl));
curl_close($curl);

//echo "Webservice Response type is: ".gettype($ws_response);
//var_dump($ws_response);

fclose($fp);
 //TRY - Fetch file and convert to string
 //If it fails log error to error message.
     try{

       if(file_exists($wsFile)){
       $json_file = html_entity_decode(file_get_contents($wsFile));
       //var_dump($json_file);
        }
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



        return jsonObj;


 }  //end of function  parseCurrencyServiceURL




function displayWSCurrencyResults($obj, $src, $curr){

         //print_r($obj);
         $currencyExchange = $src;
         //echo $src;
         //echo $curr;
         $currencyExchange .= $curr;

         echo $currencyExchange;
         echo "<br />This is the conversion: ".$obj['quotes'][$currencyExchange];





          //echo $countryList;


} //end of function displayWSCountryResults



