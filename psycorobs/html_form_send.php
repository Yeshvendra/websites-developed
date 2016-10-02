<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "support@psycorobs.com";
     
    $email_subject = "web-support";
     
     
    function died($error) {
        // your error code can go here
        echo '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>mPurpose - Multipurpose Feature Rich Bootstrap Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="css/leaflet.css" />
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/leaflet.ie.css" />
    <![endif]-->
    <link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

       
        <div class="mainmenu-wrapper">
          <div class="container">
            <div class="menuextras">
          <div class="extras">
            <ul>
              
                </ul>
          </div>
            </div>
            <nav id="mainmenu" class="mainmenu">
          <ul>
            <li class="logo-wrapper"><a href="index.html"><img src="img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
            <li>
              <a href="index.html">Home</a>
            </li>
            
            <li class="active">
              <a href="credits.html">Credits</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    
    <div class="section section-breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Psycorobs</h1>
          </div>
        </div>
      </div>
    </div>
        
        <div class="section">
          <div class="container">
            <h2>Error</h2>
            <div class="row">
              <div class="col-md-12">
                We are very sorry, but there were error found with the form you submitted.<br><br>'
                
                .$error.'<br /><br />
                Please go back and fix these errors.<br /><br />              
              </div>
            </div>
          </div>
      </div>

     
      <div class="footer">
        <div class="container">
          <div class="row">
            
            <center>
            <div class="col-footer col-md-12 col-xs-6">
              <h3>Contact Us</h3>
              
              <p class="contact-us-details">
                  <b>Address:</b> Psycorobs, Hotel Highway Choice, Kanwarpura, Kotputli, Jaipur, Rajasthan - 303108<br/>
                  <b>Phone:</b> +91-8116356204<br/>
                  
                  <b>Email:</b> <a href="mailto:support@psycorobs.com">support@psycorobs.com</a>
                </p>

            </div>
            </center>
            
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="footer-copyright">&copy; 2016 Psycorobs. All rights reserved.</div>
            </div>
          </div>
        </div>
      </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>

    </body>
</html>';        
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>mPurpose - Multipurpose Feature Rich Bootstrap Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/leaflet.ie.css" />
    <![endif]-->
    <link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

       
        <div class="mainmenu-wrapper">
          <div class="container">
            <div class="menuextras">
          <div class="extras">
            <ul>
              
                </ul>
          </div>
            </div>
            <nav id="mainmenu" class="mainmenu">
          <ul>
            <li class="logo-wrapper"><a href="index.html"><img src="img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
            <li>
              <a href="index.html">Home</a>
            </li>
            
            <li class="active">
              <a href="credits.html">Credits</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    
    <div class="section section-breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Psycorobs</h1>
          </div>
        </div>
      </div>
    </div>
        
        <div class="section">
          <div class="container">
            <h2>Thank you</h2>
            <div class="row">
              <div class="col-md-12">
                Thank you for contacting us. We will be in touch with you very soon.
                <br><br><br><br><br><br><br>
              
              </div>
            </div>
          </div>
      </div>

     
      <div class="footer">
        <div class="container">
          <div class="row">
            
            <center>
            <div class="col-footer col-md-12 col-xs-6">
              <h3>Contact Us</h3>
              
              <p class="contact-us-details">
                  <b>Address:</b> Psycorobs, Hotel Highway Choice, Kanwarpura, Kotputli, Jaipur, Rajasthan - 303108<br/>
                  <b>Phone:</b> +91-8116356204<br/>
                  
                  <b>Email:</b> <a href="mailto:support@psycorobs.com">support@psycorobs.com</a>
                </p>

            </div>
            </center>
            
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="footer-copyright">&copy; 2016 Psycorobs. All rights reserved.</div>
            </div>
          </div>
        </div>
      </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>

    </body>
</html> 
 
<?php
}
die();
?>