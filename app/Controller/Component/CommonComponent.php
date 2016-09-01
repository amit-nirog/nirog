<?php

class CommonComponent extends Component {

    function generatedOTP($mobileN) 
    {      
       
        $ch = curl_init();
        $key = '851';
        $msg_token ='well@vgt';
        $senderid ='Nirogs';
        $optp =$this->generate_password(); 
        $message='OTP+is+'.$optp; 
    
        $url ="http://push.vg4mobile.com/newBulkClient.jsp?senderID=".$senderid."&msisdn=".$mobileN."&userid=".$key."&msg=".$message."&pwd=".$msg_token;
      
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
