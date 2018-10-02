<?php 
header("Content-type:text/html");
require_once('./config.php');

require_once(__DIR__.'/phpmailer/PHPMailerAutoload.php');

if(isset($_POST['html'])){
    $mailer = new PHPMailer(true);
    $html = $_POST['html'];
    try {
        //Server settings
        $mailer->SMTPDebug = 0;
        $mailer->isSMTP();
        $mailer->Host = ' mail.philipoh.site';
        $mailer->SMTPAuth = true;
        $mailer->Username = $config['username'];                            //'pgrosales.apt@gmail.com';
        $mailer->Password = $config['password'];         
        // $mailer->Username = $config['mail_username'];
        // $mailer->Password = $config['mail_password'];
        $mailer->CharSet = 'UTF-8';
        // $mailer->SMTPSecure = 'tls';        
        $mailer->Port = 25;                  //587;                            
    
        //Recipients
        $mailer->setFrom('noreply@philipoh.site', 'Penbrothers');
        // $mailer->addAddress('philip@penbrothers.com', 'Philip Rosales');     // Add a recipient
        $mailer->addAddress('philiprosales95@gmail.com', 'Philip Rosales');     // Add a recipient
        // $mailer->addAddress('john@penbrothers.com', 'John Erazo');     // Add a recipient
        // $mailer->addAddress('stepphineuson@gmail.com');     // Add a recipient
        // $mailer->addAddress('stepphineuson@icloud.com');     // Add a recipient
        // $mailer->addAddress('stepphineuson@live.com');     // Add a recipient
        // $mailer->addAddress("gui@penbrothers.com", 'Gui');
        // $mailer->addAddress("xxiootbob7xx@yahoo.com", "Philip Rosales");
        // $mailer->addAddress('ellen@example.com');               // Name is optional
        $mailer->addReplyTo('no.reply@gmail.com', '');
        // $mailer->addCC('cc@example.com');
        // $mailer->addBCC('bcc@example.com');
    
        //Attachments
        // $mailer->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mailer->isHTML(true);   
        $mailer->AddEmbeddedImage("new_icons/pb_cropped.png", "pb_cropped", "PB_Logo" , "base64");
        $mailer->AddEmbeddedImage("new_icons/new_client.png", "new_client","New_Clients", "base64");
        $mailer->AddEmbeddedImage("new_icons/client_lost.png", "client_lost", "Lost_Clients", "base64");
        $mailer->AddEmbeddedImage("new_icons/new_employee.png", "new_employee");
        // $mailer->AddEmbeddedImage("new_icons/collection.png", "collection");
        // $mailer->AddEmbeddedImage("new_icons/renewed_client.png", "renewed_client");
        $mailer->AddEmbeddedImage("new_icons/client_price_range.png", "client_price_range");
        $mailer->AddEmbeddedImage("new_icons/client_by_industry.png", "client_by_industry");
        $mailer->AddEmbeddedImage("new_icons/client_revenue_by_country.png", "client_revenue_by_country");
        
        // $mailer->AddEmbeddedImage("imgs/lost_employee.png", "lost_employee");
        // $mailer->AddEmbeddedImage("imgs/freshdesk.png", "freshdesk");
        // $mailer->AddEmbeddedImage("./newfolder/capture_new.jpg","testImage","capture_new.jpg","base64"); 
        // $mailer->AddEmbeddedImage("./newfolder/capture_new6.png","Reports","capture_new.jpg","base64");        
        // $mailer->AddAttachment('./newfolder/capture_new6.pdf', "testPDF", 'base64', 'application/pdf');                       // Set email format to HTML
        // $mailer->AddAttachment('./newfolder/capture_new6.png', "testPNG", 'base64'); 
        $mailer->Subject = 'Management Report';
        $mailer->Body    = $html;
        $mailer->AltBody = '';
    
        // var_dump($mailer->send());
        // $mailer->send();
        // echo $html;
        // if(!$mailer->send()){
        //     echo $mailer->ErrorInfo;
        // }
    
    } catch (Exception $e) {
        echo '<pre>',print_r($e),'</pre>';
    }
    

}

