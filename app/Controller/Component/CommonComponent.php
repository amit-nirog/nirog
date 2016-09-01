<?php

class CommonComponent extends Component {

    function generatedOTP($mobileN) 
    {      
       
        $ch = curl_init();
        $key = '22551';
        $msg_token ='ut12345';
        $senderid ='JKRACE';
        $optp =$this->generate_password(); 
        $message='OTP+is+'.$optp; 
        $url ="http://192.111.149.178/unified.php?usr=".$key."&pwd=".$msg_token."&ph=".$mobileN."&sndr=".$senderid."&text=".$message;
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        $res_arr = json_decode($res);
        return $optp;
    }
    function generate_password()
    {
         $length = 6 ;
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
				
}

                
                
//Class End	
?>
