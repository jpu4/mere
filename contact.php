<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
session_start(); // used for captcha
$config = new config;
$MailMessage = '';
$MailMessageClass = '';
$pagename = 'Contact';

$sent = isset($_POST['sent']) ? $_POST['sent'] : null;
$name = (isset($_POST['name']) ? strip_tags(htmlspecialchars($_POST['name'])) : null);
$email_address = (isset($_POST['email']) ? strip_tags(htmlspecialchars($_POST['email'])) : null);
$phone = (isset($_POST['phone']) ? strip_tags(htmlspecialchars($_POST['phone'])) : null);
$message = (isset($_POST['message']) ? strip_tags(htmlspecialchars($_POST['message'])) : null);

//if($sent){
  
if(isset($_POST["captcha"]))  
if($_SESSION["captcha"]==$_POST["captcha"])  
{  
  
  if (empty($email_address)){

    $MailMessage = 'Email address is required.';
    $MailMessageClass = 'danger';

  } else {

    // Create the email and send the message
    $to =  $config::$Mail_SendTo; // Add your email address
    $email_subject = "Contact Form Submitted by:  $name";
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: ". $config::$Mail_Sendfrom . "\n"; // This is the email address the message will be from. 
    $headers .= "Reply-To: " . $config::$Mail_SendTo;   
    mail($to,$email_subject,$email_body,$headers);

    $MailMessage = 'Mail Sent. Thank you.';
    $MailMessageClass = 'success';
  }
} else {  

    $MailMessage = 'CAPTCHA Required. (Spam is no fun)';
    $MailMessageClass = 'danger';
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $config::$Site_Descr; ?>">
  <meta name="author" content="<?php echo $config::$Site_Author; ?>">
  <link rel="shortcut icon" type="image/png" href="/favicon.jpg"/>

  <title><?php echo $config::$Site_Name . ' - ' . $pagename; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>
  
  <!-- Navigation -->
<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="assets/images/logo.jpg" alt="logo" style="width:20%;margin-right:5px;" /><?php echo $config::$Site_Name;?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php echo $pagename; ?>
      <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">Home</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $pagename; ?></li>
    </ol>
    
  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
        <?php echo $config::$Owner_Address1 ;?><br>
        <?php echo $config::$Owner_Address2 ;?><br>
        <?php echo $config::$Owner_CityStateZip ;?><br>
        </p>
        <p>
          <abbr title="Phone">P</abbr>: <?php echo $config::$Owner_Phone ;?>
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:<?php echo $config::$Mail_SendTo ;?>"><?php echo $config::$Mail_SendTo ;?>
          </a>
        </p>
        <p>
          <abbr title="Hours">H</abbr>: <?php echo $config::$Owner_Hours ;?>
        </p>
      </div>
    </div>
    <!-- /.row -->
    
    <!-- Contact Form -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form name="contactForm" id="contactForm" method="POST" action="contact.php" novalidate>
          <input type="hidden" name="sent" value="1" />
          <!-- For success/fail messages -->
          <div id="mailmessage" class="alert alert-<?php echo $MailMessageClass ;?>"><?php echo $MailMessage ;?> </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name." value="<?php echo $name; ?>">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number." value="<?php echo $phone; ?>">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address." value="<?php echo $email_address; ?>">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"><?php echo $message; ?></textarea>
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-8 pull-left"><label for="pwd">Anti Spam code, Please Enter 3 Black Symbols</label>
          <img src="assets/captcha/captcha.php" alt="captcha image" style="width:100px;"></div>
          <div class="col-sm-4 pull-right"><input type="text" name="captcha" size="3″ maxlength="3″ class="form-control"></div>
          </div>
          <input type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit" value="Send Message">
        </form> 
      </div>

    </div>
    <!-- /.row -->
    </div>
<!-- /.container -->
  <!-- content end-->

</div>
<!-- end page content -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; <?php echo $config::$Site_Name;?> 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


</body>

</html>
