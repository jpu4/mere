<?php 
session_start();
require_once './config/init.php';
$config = new config;

$MailMessage = '';
$MailMessageClass = '';
$pagename = 'Contact';

$actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$name = (isset($_POST['name']) ? strip_tags(htmlspecialchars($_POST['name'])) : null);
$email_address = (isset($_POST['email']) ? strip_tags(htmlspecialchars($_POST['email'])) : null);
$phone = (isset($_POST['phone']) ? strip_tags(htmlspecialchars($_POST['phone'])) : null);
$message = (isset($_POST['message']) ? strip_tags(htmlspecialchars($_POST['message'])) : null);
$emailIsValid = filter_var($email_address,FILTER_VALIDATE_EMAIL);

if(isset($_POST["captcha"]))  
if($_SESSION["captcha"]==$_POST["captcha"])  
{  
  
  if (empty($email_address) || (!$emailIsValid)){

    $MailMessage = "Email address is required. Check that it's entered correctly.";
    $MailMessageClass = 'danger';

  } else {

    // Create the email and send the message
    
    $subject = "Contact Form Submitted by:  $name";
    
    $body="<p>You have received a new message from your website contact form.</p>\n\n <p>Here are the details:</p>\n\n";
    foreach ($_POST as $key => $value){
      if (!contains('captcha',$key) && (!contains('btnSubmit',$key))){
        $body .= "<p>" . ucwords($key) . ": " . ucwords(strip_tags(htmlspecialchars($value))) . "</p>\n\n";
      }
    };

    $body .= "<p>Sent from " . $actual_url . "</p>\n\n";

    $MailMessage = mailto($subject,$body);
    if (contains('Error',$MailMessage)){
      $MailMessageClass = 'danger';
    } else {
      $MailMessageClass = 'success';
    };
  }
} else {  

    $MailMessage = 'CAPTCHA Required. (Spam is no fun)';
    $MailMessageClass = 'danger';
} 
?> 
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en-US">
<!--<![endif]-->

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="UTF-8" />
	<title>No Bull Management </title>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css" />

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="/assets/css/foundation-responsive.css">
	<link rel="stylesheet" href="/assets/css/style-nobull.css">

	<!--[if IE 7]>
		<link rel="stylesheet" href="http://nobullmgt.com/wp-content/themes/phoenix/stylesheet/ie7-style.css" /> 
	<![endif]-->

	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	
	<link rel='stylesheet' id='style-custom-css' href='assets/css/style-custom.css?ver=5.3' type='text/css' media='all' />
	<link rel='stylesheet' id='Google-Font-Open+Sans-css'
		href='https://fonts.googleapis.com/css?family=Open+Sans%3An%2Ci%2Cb%2Cbi&#038;subset=latin&#038;ver=5.3'
		type='text/css' media='all' />
	<link rel='stylesheet' id='layerslider-css'
		href='assets/css/layerslider.css?ver=6.9.2'
		type='text/css' media='all' />
	<link rel='stylesheet' id='ls-google-fonts-css'
		href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&#038;subset=latin%2Clatin-ext'
		type='text/css' media='all' />
	<link rel='stylesheet' id='wp-block-library-css' href='assets/css/style.min.css?ver=5.3' type='text/css' media='all' />
	<link rel='stylesheet' id='cptch_stylesheet-css'
		href='assets/css/front_end_style.css?ver=4.2.7' type='text/css'
		media='all' />
	<link rel='stylesheet' id='dashicons-css' href='assets/css/dashicons.min.css?ver=5.3'
		type='text/css' media='all' />
	<link rel='stylesheet' id='cptch_desktop_style-css'
		href='assets/css/desktop_style.css?ver=4.2.7' type='text/css'
		media='all' />
	<link rel='stylesheet' id='contact-form-7-css'
		href='assets/css/cf7-styles.css?ver=5.1.6' type='text/css'
		media='all' />
	<link rel='stylesheet' id='superfish-css'
		href='assets/css/superfish.css?ver=5.3' type='text/css'
		media='all' />
	<link rel='stylesheet' id='fancybox-css'
		href='assets/css/fancybox.css?ver=5.3' type='text/css'
		media='all' />
	<link rel='stylesheet' id='fancybox-thumbs-css'
		href='assets/css/jquery.fancybox-thumbs.css?ver=5.3'
		type='text/css' media='all' />
	<script type='text/javascript' src='assets/js/jquery/jquery.js?ver=1.12.4-wp'></script>
	<script type='text/javascript' src='assets/js/jquery/jquery-migrate.min.js?ver=1.4.1'>
	</script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var LS_Meta = {
			"v": "6.9.2"
		};
		/* ]]> */
	</script>
	<script type='text/javascript' src='assets/js/layerslider/greensock.js?ver=1.19.0'>
	</script>
	<script type='text/javascript' src='assets/js/layerslider/layerslider.kreaturamedia.jquery.js?ver=6.9.2'>
	</script>
	<script type='text/javascript' src='assets/js/layerslider/layerslider.transitions.js?ver=6.9.2'>
	</script>
	<script type='text/javascript' src='assets/js/jquery/jquery.fitvids.js?ver=1.0'></script>
	<meta name="generator"
		content="Powered by LayerSlider 6.9.2 - Multi-Purpose, Responsive, Parallax, Mobile-Friendly Slider Plugin for WordPress." />
	<!-- LayerSlider updates and docs at: https://layerslider.kreaturamedia.com -->
	<meta name="generator" content="Mere v1" />
	<link rel="canonical" href="http://nobullmgt.com/" />
	<link rel='shortlink' href='http://nobullmgt.com/' />

	<!--[if lt IE 9]>
<style type="text/css">
	div.shortcode-dropcap.circle{
		z-index: 1000;
		position: relative;
		behavior: url(http://nobullmgt.com/wp-content/themes/phoenix/stylesheet/ie-fix/PIE.php);
	}
	div.search-wrapper .search-text{ width: 185px; }
	div.feedback-wrapper a{ left: 0px; }
	div.top-navigation-left{ width: 50%; text-align: left; }
	span.hover-link, span.hover-video, span.hover-zoom{ display: none !important; }
	
	.portfolio-media-wrapper:hover span{ display: block !important; }
	.blog-media-wrapper:hover span{ display: block !important; }
</style>
<![endif]-->

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>

<body class="home page-template-default page page-id-2">

	<div class="body-wrapper">

		<div class="header-outer-wrapper container wrapper">
			<div class="header-wrapper container main">

				<!-- Get Logo -->
				<div class="logo-wrapper">
					<h1><a href="http://nobullmgt.com"><img src="/assets/img/Logo2.png" alt="" /></a></h1>
				</div>
				<div class="logo-right-text"><a href="Tel: <?php echo $config::$Owner_Phone; ?>"><i class="fa fa-phone"></i> <?php echo $config::$Owner_Phone; ?></a> <br />
					<a href="mailto:Mike@nobullmgt.com"><i class="fa fa-envelope-o"></i> Mike@nobullmgt.com</a><br />
				</div>
				<!-- Navigation -->
				<div class="clear"></div>
				<div class="gdl-navigation-wrapper">
					<div class="responsive-menu-wrapper"><select id="menu-main-menu" class="menu dropdown-menu">
							<option value="" class="blank">&#8212; Main Menu &#8212;</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-16 menu-item-depth-0"
								value="index.php" selected="selected">Home</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31 menu-item-depth-0"
								value="about-us.php">About Us</option>
							<option
								class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-46 menu-item-depth-0"
								value="#">Services</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47 menu-item-depth-1"
								value="carpet-cleaning.php">- Carpet Cleaning</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 menu-item-depth-1"
								value="cleaning-services.php">- Cleaning services</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78 menu-item-depth-0"
								value="our-equipment.php">Our Equipment</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91 menu-item-depth-0"
								value="gallery.php">Gallery</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15 menu-item-depth-0"
								value="testimonials.php">Testimonials</option>
							<option
								class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30 menu-item-depth-0"
								value="contact-us.php">Contact Us</option>
						</select></div>
					<div class="navigation-wrapper ">
						<div class="navigation-sliding-bar" id="navigation-sliding-bar"></div>
						<div id="main-superfish-wrapper" class="menu-wrapper">
							<ul id="menu-main-menu-1" class="sf-menu">
								<li id="menu-item-16"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-16">
									<a href="/" aria-current="page">Home</a></li>
								<li id="menu-item-31"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31"><a
										href="/about-us">About Us</a></li>
								<li id="menu-item-46"
									class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-46">
									<a href="#">Services</a>
									<ul class="sub-menu">
										<li id="menu-item-47"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47">
											<a href="/carpet-cleaning">Carpet Cleaning</a></li>
										<li id="menu-item-48"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48">
											<a href="/cleaning-services">Cleaning services</a></li>
									</ul>
								</li>
								<li id="menu-item-78"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a
										href="/our-equipment">Our Equipment</a></li>
								<li id="menu-item-91"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91"><a
										href="/gallery">Gallery</a></li>
								<li id="menu-item-15"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a
										href="/testimonials">Testimonials</a></li>
								<li id="menu-item-30"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30"><a
										href="contact-us.php">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<!-- search form 
					<div class="top-search-form">
						<div class="gdl-search-button" id="gdl-search-button"></div>
						<div class="search-wrapper">
							<div class="gdl-search-form">
								<form method="get" id="searchform" action="http://nobullmgt.com/">
									<div class="search-text">
										<input type="text" value="Search..." name="s" id="s" autocomplete="off"
											data-default="Search..." />
									</div>
									<input type="submit" id="searchsubmit" value="Go!" />
									<div class="clear"></div>
								</form>
							</div>
						</div>
					</div>-->
					<div class="clear"></div>
				</div>
			</div> <!-- header wrapper container -->

			<div class="navigation-bottom-bar container wrapper"></div>
		</div> <!-- header wrapper container wrapper -->
		<div class="page-header-wrapper container wrapper">


<div class="page-header-container container">
	<div class="gdl-header-wrapper">
		<h1 class="gdl-header-title">Contact Us</h1>
	</div>
</div>
</div>
<div class="content-outer-wrapper container wrapper">
	<div class="top-slider-bottom-bar container wrapper"></div>
	<div class="content-wrapper container main">
		<div class="page-wrapper single-page ">
			<div class="row">
				<div class="gdl-page-left mb0 twelve columns">
					<div class="row">
						<div class="gdl-page-item mb20 twelve columns">
							<div class="row">
								<div class="twelve columns mb0">
									<div class="gdl-page-content"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="row">
								<div class="six columns ">
									<div class="gdl-item-header-wrapper">
										<h3 class="gdl-item-header-title">Send Us a Message</h3>
									</div>
									<div class="gdl-column-item">
										<div class="Contact-page-form">
												<div class="screen-reader-response"></div>
												<!-- Display submission status -->
												<!-- For success/fail messages -->
          <div id="mailmessage" class="alert alert-<?php echo $MailMessageClass ;?>"><?php echo $MailMessage ;?> </div>

												<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
    												<input type="text" id="name" placeholder="name" name="name"  aria-required="true" size="40" class="formfield" required pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+" title="firstname lastname" />
    												<input type="email" id="email" placeholder="email" name="email" aria-required="true" size="40" class="formfield" required />
    												<input type="tel" id="phone" placeholder="phone" name="phone" size="40" class="formfield" />
													<textarea id="message" placeholder="message" name="message" rows="10" class="formfield"></textarea>
													<!--<input type="file" id="attachment" name="attachment" placeholder="attachment" accept=".jpg,.jpeg,.png,.pdf" />-->
													<div>
														<label for="pwd">Anti Spam code, Please Enter 3 Black Symbols</label>
    												<img src="/assets/captcha/captcha.php" alt="captcha image" style="height:40px;">
													<input type="text" name="captcha" size="3″ maxlength="3″ class="formfield" aria-required="true" aria-invalid="false" required /></div>
													  <!--<button name="submit" onclick="form.submit();">Submit</button>-->
													  
          <input type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit" value="Send Message">
												</form>

										</div>
									</div>
								</div>
								<div class="six columns ">
									<div class="gdl-item-header-wrapper">
										<h3 class="gdl-item-header-title">Address </h3>
									</div>
									<div class="gdl-column-item"><strong>No Bull Professional Services LLC </strong>
										<br>
										Hours of Operation 9am – 4pm Monday - Friday <br>
										24 / 7 For Qualifying Emergency Services <br><br>

										Headquarters: 2015 Gus Kaplan Dr.<br>
										Alexandria, LA. 71301<br><br>

										<strong>Correspondence: </strong><br>
										PO Box 6972 Alexandria, Louisiana 71307-6972 <br><br>

										<strong>Site Supervisor Michael Schopp </strong><br>
										Phone : <a href="Tel:(318) 709-1115">(318) 709-1115</a><br>
										Email : <a href="mailto:Mike@nobullmgt.com">Mike@nobullmgt.com</a>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="row">
								<div class="twelve columns ">
									<div class="gdl-item-header-wrapper">
										<h3 class="gdl-item-header-title">Our Location</h3>
									</div>
									<div class="gdl-column-item"><iframe
											src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.0118162943063!2d-92.47170317249146!3d31.275768365596612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x863ab52568310251%3A0x82c68e3e187e4aac!2s2015+Gus+Kaplan+Dr%2C+Alexandria%2C+LA+71301%2C+USA!5e0!3m2!1sen!2sin!4v1440051526150"
											width="100%" height="250" frameborder="0" style="border:0"
											allowfullscreen></iframe></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div> <!-- page wrapper -->
	</div> <!-- content wrapper -->

	
	
  <!-- Footer -->
  <div class="footer-wrapper container wrapper">
    <div class="footer-top-bar"></div>
  
    <!-- Get Footer Widget -->
    <div class="footer-container container">
      <div class="footer-widget-wrapper">
        <div class="row">
          <div class="four columns gdl-footer-1 mb0">
            <div class="custom-sidebar">
              <h3 class="custom-sidebar-title">Dealing with Dust Mites?</h3>
              <div class="clear"></div>
              <div class="textwidget">Dust mites are small arthropods that live in your home and feed on
                flaked-off human skin. Although they are microscopic, they can cause serious health issues.
                Even if you're a neat freak, if there's dust, there's a strong possibility you have dust
                mites...<a href="dust-mites.php">more</a></div>
            </div>
          </div>
          <div class="four columns gdl-footer-2 mb0">
            <div class="custom-sidebar">
              <h3 class="custom-sidebar-title">About Us</h3>
              <div class="clear"></div>
              <div class="textwidget">No Bull Professional Services offers a variety of supportive cleaning
                services for commercial / residential properties based on the needs of our customers- from
                basic carpet cleaning and floor maintenance to disaster relief support services.....<a
                  href="about-us.php">more</a></div>
            </div>
          </div>
          <div class="four columns gdl-footer-3 mb0">
            <div class="custom-sidebar">
              <div class="textwidget">
                <div role="form" class="wpcf7" id="wpcf7-f85-o1" lang="en-US" dir="ltr">
                  <div class="screen-reader-response"></div>
                  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div> <!-- close row -->
      </div>
    </div>
  
    <!-- Get Copyright Text -->
    <div class="container copyright-container">
      <div class="copyright-wrapper">
        <div class="clear"></div>
        <div class="copyright-left">
          <!-- Get Social Icons -->
          <div id="gdl-social-icon" class="social-wrapper">
            <div class="social-icon-wrapper">
            </div> <!-- social icon wrapper -->
          </div> <!-- social wrapper -->
        </div>
        <div class="copyright-right">
          2016 © No Bull. ALL Rights Reserved | Developed and Hosted by <a href="http://mach.us/"
            target="_blank">Machus Media</a>.
        </div>
        <div class="clear"></div>
      </div>
    </div>
  
  </div><!-- footer wrapper -->
  </div><!-- content outer wrapper -->
  </div> <!-- body wrapper -->
  
  <script type="text/javascript">
    jQuery(document).ready(function () {});
  </script>
  <script>
    var getElementsByClassName = function (a, b, c) {
        if (document.getElementsByClassName) {
          getElementsByClassName = function (a, b, c) {
            c = c || document;
            var d = c.getElementsByClassName(a),
              e = b ? new RegExp("\\b" + b + "\\b", "i") : null,
              f = [],
              g;
            for (var h = 0, i = d.length; h < i; h += 1) {
              g = d[h];
              if (!e || e.test(g.nodeName)) {
                f.push(g)
              }
            }
            return f
          }
        } else if (document.evaluate) {
          getElementsByClassName = function (a, b, c) {
            b = b || "*";
            c = c || document;
            var d = a.split(" "),
              e = "",
              f = "http://www.w3.org/1999/xhtml",
              g = document.documentElement.namespaceURI === f ? f : null,
              h = [],
              i, j;
            for (var k = 0, l = d.length; k < l; k += 1) {
              e += "[contains(concat(' ', @class, ' '), ' " + d[k] + " ')]"
            }
            try {
              i = document.evaluate(".//" + b + e, c, g, 0, null)
            } catch (m) {
              i = document.evaluate(".//" + b + e, c, null, 0, null)
            }
            while (j = i.iterateNext()) {
              h.push(j)
            }
            return h
          }
        } else {
          getElementsByClassName = function (a, b, c) {
            b = b || "*";
            c = c || document;
            var d = a.split(" "),
              e = [],
              f = b === "*" && c.all ? c.all : c.getElementsByTagName(b),
              g, h = [],
              i;
            for (var j = 0, k = d.length; j < k; j += 1) {
              e.push(new RegExp("(^|\\s)" + d[j] + "(\\s|$)"))
            }
            for (var l = 0, m = f.length; l < m; l += 1) {
              g = f[l];
              i = false;
              for (var n = 0, o = e.length; n < o; n += 1) {
                i = e[n].test(g.className);
                if (!i) {
                  break
                }
              }
              if (i) {
                h.push(g)
              }
            }
            return h
          }
        }
        return getElementsByClassName(a, b, c)
      },
      dropdowns = getElementsByClassName('dropdown-menu');
    for (i = 0; i < dropdowns.length; i++)
      dropdowns[i].onchange = function () {
        if (this.value != '') window.location.href = this.value;
      }
  </script>
  <script type='text/javascript' src='assets/js/superfish.js?ver=1.0'>
  </script>
  <script type='text/javascript' src='assets/js/supersub.js?ver=1.0'>
  </script>
  <script type='text/javascript' src='assets/js/hoverIntent.js?ver=1.0'>
  </script>
  <script type='text/javascript' src='assets/js/jquery/jquery.easing.js?ver=1.0'>
  </script>
  <script type='text/javascript'>
    /* <![CDATA[ */
    var ATTR = {
      "enable": "enable",
      "width": "80",
      "height": "45"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='assets/js/jquery/jquery.fancybox.js?ver=1.0'></script>
  <script type='text/javascript' src='assets/js/jquery/jquery.fancybox-media.js?ver=1.0'></script>
  <script type='text/javascript' src='assets/js/jquery/jquery.fancybox-thumbs.js?ver=1.0'></script>
  <script type='text/javascript' src='assets/js/gdl-scripts.js?ver=1.0'>
  </script>
  <script type='text/javascript' src='assets/js/jquery/jquery.cycle.js?ver=1.0'>
  </script>
  
  </body>
  
  </html>