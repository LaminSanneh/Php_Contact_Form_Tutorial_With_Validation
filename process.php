<?php

require('vendor/autoload.php');
$config = require(__DIR__.'/config.php');

$body = "<p>You received an email from {$_POST['first_name']} {$_POST['last_name']}
with details</p>
<p>{$_POST['body']}</p>";

// echo $body;

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = 'ssl';
$mailer->Host = "smtp.gmail.com";
$mailer->Port = 465;
$mailer->IsHTML(true);

$mailer->Username = $config['username'];
$mailer->Password = $config['password'];
$mailer->SetFrom($_POST['email']);
$mailer->Subject = $_POST['subject'];
$mailer->Body = $body;
$mailer->AddAddress($config['recipient']);

$filedsToValidate = ['first_name', 'last_name', 'email',
        'subject', 'body'
    ];

function validateForm($values, $fields){
    $errors = [];

    foreach($fields as $field){
        if(!isset($values[$field]) || strlen(trim($values[$field])) === 0){
            $errors[$field] = "$field cannot be empty";
        }
    }

    return $errors;
}

$errors = validateForm($_POST, $filedsToValidate);

if(count($errors) !== 0){
    $errors = http_build_query($errors);
    header("Location: index.php?$errors");
    exit();
}

if($mailer->Send()){
    header("Location: success.php");
}
else{
    header("Location: index.php?errors=We could not send email for some reason");
}
?>
