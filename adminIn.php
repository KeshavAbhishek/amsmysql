<?php

    include('smtp/PHPMailerAutoload.php');
    function smtp_mailer($to,$subject, $msg){
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; 
        $mail->Username = 'keshavabhishek2003@gmail.com';
        $mail->Password = '';
        $mail->SetFrom('keshavabhishek2003@gmail.com');
        $mail->Subject = $subject;
        $mail->Body =$msg;
        // $mail->AddAttachment('https://amsmysql.000webhostapp.com/ilovepdf/A-2.pdf');
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
        }
        else{
            return;
        }
    }

    date_default_timezone_set('Asia/Calcutta');

    if (isset($_GET['pass'])) {
        if($_GET['pass']!='keshav'.date('hi')){
            header('Location:./adminCheck.php');
        }
    }else{
        header('Location:./adminCheck.php');
    }

    include "getData.php";
    echo $data;
    smtp_mailer('crystaled2003@gmail.com','PHPMailerSendingMail', $data);

?>
