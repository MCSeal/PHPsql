<?php 
    require 'vendor/autoload.php';




    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = 
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("mzeal93@gmail.com", "Mathew Seal");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

        
        try{
            $response = $sendgrid->send($email);
        }catch(Exception $e){
            echo 'Email exception caught : ' . $e->getMessage() . "\n";
            return false;
            }
        }
    }
?>