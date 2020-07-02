<?php namespace ebukaubah\GsmNumberPrefixes;

/**
*  Index class
*
*  The Index class provides a getNetworkProvider function that obtains the correct provider of
*  a particular mobile number passed to the function as arguement.
*
*  @author Ebuka Ubah
*/
class GsmNumberPrefix{
  /**
  * getNetworkProvider Method
  *
  * A function to retrieve the network provider for the mobile number passed in as an arguement $number.
  * 
  *
  * @param string $number A string containing the mobile number you want to ascertain its network provider
  *
  * @return string
  */
   public function getNetworkProvider($number){
      $mobileNetworkPrefixes = [
          "0703" => "MTN",
         "0706" => "MTN",
         "0803" => "MTN",
         "0806" => "MTN",
         "0810" => "MTN",
         "0813" => "MTN",
         "0814" => "MTN",
         "0816" => "MTN",
         "0903" => "MTN",
         "0906" => "MTN",
         "0705" => "Glo",
         "0805" => "Glo",
         "0807" => "Glo",
         "0811" => "Glo",
         "0815" => "Glo",
         "0905" => "Glo",
         "0701" => "Airtel",
         "0708" => "Airtel",
         "0802" => "Airtel",
         "0808" => "Airtel",
         "0812" => "Airtel",
         "0902" => "Airtel",
         "0907" => "Airtel",
         "0901" => "Airtel",
         "0809" => "9Mobile",
         "0817" => "9Mobile",
         "0818" => "9Mobile",
         "0908" => "9Mobile",
         "0909" => "9Mobile",
         "07028" => "starcomms",
         "07029" => "starcomms",
         "0819" => "starcomms",
         "07025" => "visafone",
         "07026" => "visafone",
         "0704" => "visafone",
         "07027" => "multilinks",
         "0709" => "multilinks",
         "0707" => "zoom",
         "0804" => "ntel",
         "0702" => "smile"
     ];

      //check if its a phone number 
      $firstCharacter = substr($number,0,1);
      $firstThreeCharacters = substr($number,0,3);
      if($firstCharacter == 0 && strlen($number) == 11) {
            //get the first 4 digits
            $firstFourDigits = substr($number,0,4);
            $firstFiveDigits = substr($number,0,5);

            if(isset($mobileNetworkPrefixes[$firstFourDigits]) && !empty($mobileNetworkPrefixes[$firstFourDigits])) {
               return $mobileNetworkPrefixes[$firstFourDigits];
            }elseif(isset($mobileNetworkPrefixes[$firstFiveDigits]) && !empty($mobileNetworkPrefixes[$firstFiveDigits])) {
               return $mobileNetworkPrefixes[$firstFiveDigits];
            }else{
               return "unknown";
            }
      }
      elseif($firstCharacter == "+" && strlen($number) == 14) {
            $firstThreeCharacters = substr($number,1,3);
            if($firstThreeCharacters == "234") {
               $firstFourDigits = "0".substr($number,4,3);
               $firstFiveDigits = "0".substr($number,4,4);
               if(isset($mobileNetworkPrefixes[$firstFourDigits]) && !empty($mobileNetworkPrefixes[$firstFourDigits])) {
                  return $mobileNetworkPrefixes[$firstFourDigits];
               }elseif(isset($mobileNetworkPrefixes[$firstFiveDigits]) && !empty($mobileNetworkPrefixes[$firstFiveDigits])) {
                  return $mobileNetworkPrefixes[$firstFiveDigits];
               }else{
                  return "unknown";
               }
            }else{
               return "unknown";
            }
      }
      elseif($firstThreeCharacters == "234" && strlen($number) == 13) {
            $firstFourDigits = "0".substr($number,3,3);
            $firstFiveDigits = "0".substr($number,3,4);
            if(isset($mobileNetworkPrefixes[$firstFourDigits]) && !empty($mobileNetworkPrefixes[$firstFourDigits])) {
               return $mobileNetworkPrefixes[$firstFourDigits];
            }elseif(isset($mobileNetworkPrefixes[$firstFiveDigits]) && !empty($mobileNetworkPrefixes[$firstFiveDigits])) {
               return $mobileNetworkPrefixes[$firstFiveDigits];
            }else{
               return "unknown";
            }
      }else{
            return "unknown";
      }
   }
}
