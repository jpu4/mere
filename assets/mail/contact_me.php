<?php
//if ($_SERVER['REQUEST_URI']=='/contact'){
$config = new config;
$MailMessage = '';
$MailMessageClass = '';

// Check for empty fields
/*if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   $MailMessage = 'No arguments Provided!';
   $MailMessageClass = 'danger';
   
   //return false;*/
      var_dump($_POST);
   if(empty($_POST['email'])){
      
      $MailMessage = 'No arguments Provided!';
      $MailMessageClass = 'danger';
   
   } else{
   
      var_dump($_POST);
      $name = (isset($_POST['name']) ? strip_tags(htmlspecialchars($_POST['name'])) : null);
      $email_address = (isset($_POST['email']) ? strip_tags(htmlspecialchars($_POST['email'])) : null);
      $phone = (isset($_POST['phone']) ? strip_tags(htmlspecialchars($_POST['phone'])) : null);
      $message = (isset($_POST['message']) ? strip_tags(htmlspecialchars($_POST['message'])) : null);

      echo 'VARS SHOULD BE LOADED';
      echo $name . ' ' . $phone . ' ' . $email_address . ' ' . $message;

      // Create the email and send the message
      $to =  $config::$Mail_SendTo; // Add your email address
      $email_subject = "Contact Form Submitted by:  $name";
      $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
      $headers = "From: ". $config::$Mail_Sendfrom . "\n"; // This is the email address the message will be from. 
      $headers .= "Reply-To: " . $config::$Mail_SendTo;   
      echo "mail - $to,$email_subject,$email_body,$headers";

      $MailMessage = 'Mail Sent. Thank you.';
      $MailMessageClass = 'success';
      //return true;         
   }
//}
?>
