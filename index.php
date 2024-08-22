<?php
include"leads/config.php";

if(isset($_POST["form_submit"]))
{
    $email=$_POST['email']; 
    $yourname=$_POST['yourname'];
    $phone=$_POST['phone'];
    $whatsAppyesno=$_POST['whatsAppyesno'];
    $location=$_POST['location'];
    $enquiresitevisit=$_POST['enquiresitevisit'];
    
    //  print_r($_POST);
    
    //  die;
    
    $rdate = date("Y-m-d");
    
     $sql = "INSERT INTO `contactus` ( `name`, `email`, `phone`, `whatsAppyesno`, `location`, `enquiresitevisit`, `rdate`, `reg_date`) VALUES ( '$yourname', '$email', '$phone', '$whatsAppyesno', '$location', '$enquiresitevisit', '$rdate', current_timestamp());";
    
    
    
    
    if ($conn->query($sql) === TRUE) {
    
         $to = 'marketingwealthcreators@gmail.com'; 
       
         $from = 'admin@acasa.wealthcreatorsheights.com'; 
         $fromName = 'Acasa Contact us'; 
       
 
        $subject = "Acasa Contact us Leads"; 
         
        $htmlContent = ' 
                        <!doctype html>
                        <html>
                            <head>
                              <meta charset="UTF-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1.0">
                              <!--<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>-->
                            </head>
                            <body>
                                <section class="lg:px-24 px-4 lg:pt-24 pt-4 ">
                                 
                                 <p class="mt-2 text-sm">Leads Details are as follows:</p>
                                 <table>
                                    	<tr>
                                    		<th>Name:</th>	<td>'.$yourname.'</td>
                                    	</tr>
                                    	<tr>
                                    		<th>Email:</th>	<td>'.$email.'</td>
                                    	<tr>
                                    
                                    		<th>Contact No:</th>	<td>'.$phone.'</td>
                                    	</tr>
                                    	<tr>
                                    		<th>Location:</th>	<td>'.$location.'</td>
                                    
                                    	</tr>
                                    	</tr>
                                    	<tr>
                                    		<th>WhatsAppyesno:</th>	<td>'.$whatsAppyesno.'</td>
                                    	</tr>
                                    	<tr>
                                    		<th>Enquiresitevisit:</th>	<td>'.$enquiresitevisit.'</td>
                                    	</tr>
                                    </table>
                        
                            
                                </section>
                            </body>
                        </html>'; 
         
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        // $headers .= 'Cc: welcome@digiclawmedia.com' . "\r\n"; 
        // $headers .= 'Bcc: welcome2@digiclawmedia.com' . "\r\n"; 
         
        // Send email 
        if(mail($to, $subject, $htmlContent, $headers)){ 
            // echo 'Email has sent successfully.'; 
            // header("Location:index.html");
            
            echo"<script>('Thank Your for submitting.'); window.location.href='index.html';</script>";
        }else{ 
          echo 'Email sending failed.'; 
        }

} 
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
        


}

else{ 
          echo 'Please Fill all fields.'; 
        }

?>
      
