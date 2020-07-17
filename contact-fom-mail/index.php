
<!-- 
   Name:contact form
   version: 1
   purpose: contact-form  
   Developer: Haripriya
  
 -->

 <?php
 #including dbconfig file
include "resources/dbconfig/dbconfig.php";
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Contact Form</title>
      <!-- core CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    </head>
   <!--/head-->
   <body >
	  
	  	<section id="contact">
	        <div class="container">
		
	        <div class="row">    
               <div class="contact-form">

                  <form id="main-contact-form" class="contact__form"  name="contact-form" method="post" action="mail.php">
				          <!-- form message -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                    </div>
                                </div>
							<!-- end message -->

                      <!-- form element -->
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" onkeypress="return isNameKey(event)" required>
                     </div>
                     <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                     </div>
                     <div class="form-group">
                        <textarea name="message" class="form-control" rows="8" placeholder="message" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Send</button>
                  </form>
               </div>
            </div>
			</div>
	  </section>

	  <script src="js/mail-ajax.js"></script>  

   </body>
</html>
