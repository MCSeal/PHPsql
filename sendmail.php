<?php 
    require 'vendor/autoload.php';




    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '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';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("mzeal93@gmail.com", "Mathew Seal");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

        
        try{
            $response = $sendgrid->send($email);
            return $response;
        }catch(Exception $e){
            echo 'Email exception caught : ' . $e->getMessage() . "\n";
            return false;
            }
        }
    }
?>