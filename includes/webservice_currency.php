
<?php
//@Author - Rayvn Manuel
//Utility | parse xml or json content => renderable array
include_once('master.inc');
 //Currency

   /**
    function createCurrencyURL($base){
     $currency="JPN, USA, CAN, GBP, ARE";
     $currencyAPIURL = "http://apilayer.net/api/live";
     $currencyAPIKEY = "access_key=9fa9f3b84733f831785097f4be6ecd19";
     //$currencySource = "source=".$base;
     $currencySource = "source=".$base;
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

    **/

    function createCurrencyURL($base){
     $symbols="JPN, USA, CAN, GBP, ARE";
     $currencyAPIURL = "http://api.fixer.io/latest";
     $currencySource = "source=".$base;
     $currencyTarget =  "currencies=".$currency;
     $API_format = "format=1";

      //CREATE Currency WebService API URL
       if(isset($currencySource)){
        $currencyURL = "$currencyAPIURL?$currencySource&symbols=$symbols";
        return $currencyURL;
        //echo "This is the URL: " .$currencyURL."<br />";
         } else{

           echo "Source not set";
         }

    }

        function getCurrencyListURL(){

         $currencyAPIURL = "http://apilayer.net/api/list";
         $currencyAPIKEY = "access_key=9fa9f3b84733f831785097f4be6ecd19";
         $API_format = "format=1";


            $currencyURL = "$currencyAPIURL?$currencyAPIKEY&amp;$API_format";
            return $currencyURL;

        }


        function getWSData($URL){

        //USE PHP cURL to retrieve webservices jsObject

        $wsFile = './data/webserviceOutputFile.txt';

        $fp = fopen($wsFile, 'w+');
        // Initialize cURL
        $curl = curl_init();
        // Set query data here with the URL
        curl_setopt($curl, CURLOPT_URL, $URL);
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


        return $jsonObj;


 }  //end of function  parseCurrencyServiceURL



function displayWSCurrencyResults($obj){

$currentCountryCode = $_POST['country_code'];
$dataObj = getWSData(getCurrencyListURL());

foreach($obj['quotes'] as $key => $value){
$exchangeRatesArray[$key] = (float)$value;
}

foreach($dataObj['currencies'] as $key => $value){
    //echo "Key: ".$key."| Value: ".$value."<br />";
}

$listArray = parse_ini_file(getCurrencyConfigList(), true);
foreach($listArray['currencies'] as $key => $value){
    //echo "Key: ".$key."| Value: ".$value."<br />";
}


foreach($exchangeRatesArray  as $key => $value){

     if($currentCountryCode == substr($key, 3)){
           echo $key." | ".$value."<br />";
     }else{
           echo substr($key, 3)."<br />";
           echo $currentCountryCode;
     }
}




} //end of function displayWSCountryResults

