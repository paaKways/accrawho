<?php

    $NO_EMAIL = 'Please enter a valid email';
    $MESSAGE = 'You have a new request for contact from the following email address:<br><br>';


    if(!$_POST['email']){
        echo $NO_EMAIL;
    }else {
        $email = filter_var(
                    $_POST['email'], 
                    FILTER_SANITIZE_EMAIL);
    }

    $msg_obj = array(
        'to' => 'kaybeta500@gmail.com',
        'subject' => 'Website Contact Form - accrawho.ugmsa.org',
        'message' => $MESSAGE.$email,
        'headers' => "From: webmaster@accrawho.ugmsa.org" . "\r\n"
    );

    send_mail($msg_obj);



    // mail(to,subject,message,headers,parameters);
    function send_mail($message_obj) {
        if( mail(
            $message_obj['to'],
            $message_obj['subject'],
            $message_obj['message'],
            $message_obj['headers']
        )){
            return 'Mail sent';
        }
    }

?>