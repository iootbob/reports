<?php

require_once(__DIR__ . "/vendor/autoload.php");

use JonnyW\PhantomJs\Client;

require_once(__DIR__.'/phpmailer/PHPMailerAutoload.php');

// phpinfo();

 

// $mailer = new PHPMailer(true);

// try {
//     //Server settings
//     $mailer->SMTPDebug = 0;
//     $mailer->isSMTP();
//     $mailer->Host = ' smtp.gmail.com';
//     $mailer->SMTPAuth = true;
//     $mailer->Username = 'pgrosales.apt@gmail.com';
//     $mailer->Password = 'letmein11';         
//     // $mailer->Username = $config['mail_username'];
//     // $mailer->Password = $config['mail_password'];
//     $mailer->CharSet = 'UTF-8';
//     $mailer->SMTPSecure = 'tls';        
//     $mailer->Port = 587;                            

//     //Recipients
//     $mailer->setFrom('appworkmatrix@gmail.com', 'Appworkmatrix - PHP Mailer from');
//     $mailer->addAddress('philiprosales95@gmail.com', 'Phil');     // Add a recipient
//     // $mailer->addAddress('ellen@example.com');               // Name is optional
//     $mailer->addReplyTo('appworkmatrix@gmail.com', 'Appworkmatrix - Information');
//     // $mailer->addCC('cc@example.com');
//     // $mailer->addBCC('bcc@example.com');

//     //Attachments
//     // $mailer->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     // $mailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     //Content
//     $mailer->isHTML(true);   
//     $mailer->AddEmbeddedImage("./newfolder/capture_new5.jpg","testImage","capture_new.jpg","base64");        
//     $mailer->AddAttachment('./newfolder/capture_new6.pdf', "testPDF", 'base64', 'application/pdf');                       // Set email format to HTML
//     $mailer->AddAttachment('./newfolder/capture_new6.png', "testPNG", 'base64'); 
//     $mailer->Subject = 'Here is the subject from Local test2.php';
//     $mailer->Body    = 'Test <img src="cid:testImage">';
//     $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     var_dump($mailer->send());

//     echo 'Message has been sent';

// } catch (Exception $e) {
//     echo '<pre>',print_r($e),'</pre>';
// }

//SCREENSHOT//
$screen = Client::getInstance();
$screen->isLazy();
// $screen->getEngine()->debug(true);
$screen->getEngine()->setPath(__DIR__ . "/bin/phantomjs.exe");

$request_screen = $screen->getMessageFactory()->createCaptureRequest('http://philipoh.site/reports', 'GET');
// $request_screen->setDelay(6);
// $request_screen->setTimeout(10000);
$request_screen->setOutputFile('./newfolder/capture_new7.png');
$request_screen->setViewportSize(1320,1200);  // width x height
// $request_screen->setCaptureDimensions(1320,1200,1320,1200);  // width x height

$response_screen = $screen->getMessageFactory()->createResponse();
$screen->send($request_screen, $response_screen);

// if($response_screen->getStatus() === 200){
//     // echo $response_screen->getContent();
// }else{
//     // echo __FILE__;
// }
// echo '<pre>',print_r($response_screen),'</pre>';



//PDF//

try{

    $pdf = Client::getInstance();
    // $pdf->isLazy();
    $pdf->getProcedureCompiler()->disableCache();
    // $pdf->getEngine()->debug(true);
    $pdf->getProcedureCompiler()->disableCache();
    
    $pdf->getEngine()->setPath(__DIR__ . "/bin/phantomjs.exe");
    // $pdf->isLazy();
    // $request = $pdf->getMessageFactory()->createCaptureRequest('https://dashboards.penbrothers.com', 'GET');
    $request_pdf = $pdf->getMessageFactory()->createPdfRequest('http://philipoh.site/reports', 'DELETE');
    // $request_pdf->setDelay(6);
    // $request_pdf->setTimeout(10000);
    // $request_pdf = pdf->getMessageFactory()->createPdfRequest('https://dashboards.penbrothers.com', 'GET');
    
    $request_pdf->setOutputFile('./newfolder/capture_new7.pdf');
    $request_pdf->setFormat('A2');
    // $request_pdf->setPaperSize($width, $height);
    $request_pdf->setOrientation("portrait");
    $request_pdf->setMargin("1cm");
    // $request_pdf->setViewportSize(1320,1200);  // width x height
    // $request_pdf->setCaptureDimensions(1320,1200,1320,1200);  // width x height
     
    
    // echo pdf->getLog();
    
     
    $response_pdf = $pdf->getMessageFactory()->createResponse();
    $pdf->send($request_pdf, $response_pdf);

}catch(Exception $e){

}finally{

    $pdf = Client::getInstance();
    // $pdf->isLazy();
    $pdf->getProcedureCompiler()->disableCache();
    // $pdf->getEngine()->debug(true);
    $pdf->getProcedureCompiler()->disableCache();
    
    $pdf->getEngine()->setPath(__DIR__ . "/bin/phantomjs.exe");
    // $pdf->isLazy();
    // $request = $pdf->getMessageFactory()->createCaptureRequest('https://dashboards.penbrothers.com', 'GET');
    $request_pdf = $pdf->getMessageFactory()->createPdfRequest('http://philipoh.site/reports', 'GET');
    // $request_pdf->setDelay(6);
    // $request_pdf->setTimeout(10000);
    // $request_pdf = pdf->getMessageFactory()->createPdfRequest('https://dashboards.penbrothers.com', 'GET');
    
    $request_pdf->setOutputFile('./newfolder/capture_new7.pdf');
    $request_pdf->setFormat('A2');
    // $request_pdf->setPaperSize($width, $height);
    $request_pdf->setOrientation("portrait");
    $request_pdf->setMargin("1cm");
    // $request_pdf->setViewportSize(1320,1200);  // width x height
    // $request_pdf->setCaptureDimensions(1320,1200,1320,1200);  // width x height
     
    
    // echo pdf->getLog();
    
     
    $response_pdf = $pdf->getMessageFactory()->createResponse();
    $pdf->send($request_pdf, $response_pdf);

}




// if($response_pdf->getStatus() === 200 && $response_screen->getStatus() === 200){
//     // echo $response->getContent();
   
//     $mailer = new PHPMailer(true);

// try {
//     //Server settings
//     $mailer->SMTPDebug = 0;
//     $mailer->isSMTP();
//     $mailer->Host = ' smtp.gmail.com';
//     $mailer->SMTPAuth = true;
//     $mailer->Username = 'pgrosales.apt@gmail.com';
//     $mailer->Password = 'letmein11';         
//     // $mailer->Username = $config['mail_username'];
//     // $mailer->Password = $config['mail_password'];
//     $mailer->CharSet = 'UTF-8';
//     $mailer->SMTPSecure = 'tls';        
//     $mailer->Port = 587;                            

//     //Recipients
//     $mailer->setFrom('appworkmatrix@gmail.com', 'Appworkmatrix - PHP Mailer from');
//     $mailer->addAddress('philiprosales95@gmail.com', 'Phil');     // Add a recipient
//     // $mailer->addAddress('ellen@example.com');               // Name is optional
//     $mailer->addReplyTo('appworkmatrix@gmail.com', 'Appworkmatrix - Information');
//     // $mailer->addCC('cc@example.com');
//     // $mailer->addBCC('bcc@example.com');

//     //Attachments
//     // $mailer->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     // $mailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     //Content
//     $mailer->isHTML(true);   
//     // $mailer->AddEmbeddedImage("./newfolder/capture_new.jpg","testImage","capture_new.jpg","base64"); 
//     $mailer->AddEmbeddedImage("./newfolder/capture_new6.png","Reports","capture_new.jpg","base64");        
//     $mailer->AddAttachment('./newfolder/capture_new6.pdf', "testPDF", 'base64', 'application/pdf');                       // Set email format to HTML
//     $mailer->AddAttachment('./newfolder/capture_new6.png', "testPNG", 'base64'); 
//     $mailer->Subject = 'Here is the subject from Local test2.php';
//     $mailer->Body    = 'Test <img src="cid:Reports">';
//     $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     var_dump($mailer->send());

//     echo 'Message has been sent';

// } catch (Exception $e) {
//     echo '<pre>',print_r($e),'</pre>';
// }


// }else{
//     // echo __FILE__;
//     // echo $pdf->getLog();
//     // echo $screen->getLog();
// }
// // echo '<pre>',print_r($response),'</pre>';




// try{
//     $to = "philiprosales95@gmail.com";
//     $subject = "Hello World!";
//     $message = "Test from Xampp config";
//     $headers = "From : pgrosales.apt@gmail.com\r\n";
    
//     var_dump(mail($to,$subject,$message,$headers));
// }catch(Exception $e){
//     echo "<pre>",print_r($e),"</pre>";
// }