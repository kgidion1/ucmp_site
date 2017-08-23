<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $to = "info@ucmp.ug";

    $subject = 'Request From Website';

    $headers = "From: " . strip_tags($email) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
    $message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
   
    $message .= "</table>";
    $message .= "</body></html>";

    mail($to, $subject, $message, $headers);

    echo "<script type='text/javascript'>alert('Your Request has been Recieved!')</script>";
}

?>
<?php include 'head_css.php';?>
<style type="text/css">
    #contact{
  background: url("images/cont.JPG") no-repeat !important;
  background-size: cover;
  background-position: 0 0;
  background-attachment: fixed;
  padding: 20px 10px;
  padding-top: 400px;
}


</style>
    <body>
    
<!--
        <div id="preloader"></div>-->
        <!-- header -->
      <?php include 'nav_trans.php'; ?>
        <!-- header end-->
      <div id="contact">
            <div class="container-fluid">
                <div class="row">
                  <!-- <div class="col-sm-3 animated fadeInLeft" data-wow-delay="0.1s">
                       <img src="images/ucmp.png" style="margin-top:-8em !important;"/>
                    </div> -->

                    <div class="col-sm-3 col-sm-push-9" style=" margin-top: -12.5em;">
                        <h1 style="font-size: 45px; color: #fff;text-transform: uppercase;">
                        Contact Us </h1>
                    </div>

                </div>
            </div>
        </div><!--breadcrumb end-->
 <!-- Google Map -->
                    <section style="margin-top:-1.1em;">            
                        <!-- Google Map ID -->
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </section>
                    <!-- End Google Map -->
        <div class="space-70"></div>

        <!--<div class="space-70"></div>-->
        <div class="container">
           <!--  <div class="row margin-b-50">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <p class="lead">Lorem ipsum dolor sit amet, <strong>consectetur adipisicing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-7 margin-b-30">
                   
                     <div class="contact-form">

                            <form role="form" id="feedbackForm" method="post" action="contact.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
<!--                                            <label class="control-label" for="name">Name *</label>-->
                                            <div>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required />

                                            </div>
                                            <span class="help-block" style="display: none;">Full Name.</span>
                                        </div> 
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
<!--                                            <label class="control-label" for="email">Email Address *</label>-->
                                            <div>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />

                                            </div>
                                            <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
<!--                                            <label class="control-label" for="name">Name *</label>-->
                                            <div>
                                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" />

                                            </div>
                                            <span class="help-block" style="display: none;">Phone Number.</span>
                                        </div> 
                                    </div>
                      
                                </div>
                                <div class="form-group">
<!--                                    <label class="control-label" for="message">Message *</label>-->
                                    <div>
                                        <textarea rows="5" cols="30" class="form-control" id="message" name="message" placeholder="Enter your message" required></textarea>

                                    </div>
                                    <span class="help-block" style="display: none;">Please enter a message.</span>
                                </div>
                               <!--  <img id="captcha" src="form/library/vender/securimage/securimage_show.php?0.5079738034167987" alt="CAPTCHA Image">
                                <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="For security, please enter the code displayed in the box.">
                                <span class="help-block" style="display: none;">Please enter a the security code.</span> -->
                                
                                <input type="submit" name="submit" id="feedbackSubmit" class="btn btn-skin btn-xl" style="display: block; margin-top: 10px;" value="submit">
                            </form>
                        </div><!--contact form-->

                </div>
                <div class="col-md-5">
                    <h3>Get In Touch</h3>
                    <p>
                       Get in touch with us today using the following email and phone and send us a message by filling the form on your left.
                    </p>
                    <hr>
                    <p>
                         3rd Floor, Amber House<br> Plot 29/33, Kampala Road<br>
                    </p>
                      <hr>
                      <p>
                         P.O. Box 71797 Kampala<br>
                    </p>
                      <hr>
                      <p>
                          <strong>E:</strong>  info@ucmp.ug or events@ucmp.ug<br>
                          <strong>P:</strong>  +256(0) 393-516-695, +256(0) 414-976-674
                      </p>
                </div>
            </div>
       

            <div class="space-70"></div>   
        </div><!--container end-->    
       <?php include 'footer_js.php';?>