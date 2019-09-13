<?php 
include_once ('db_config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO tbl_contact_us (`name`, `phone`, `email`, `message`) VALUES ('$name', '$phone', '$email', '$message')";
    $db->query($sql);

    $to = 'thuvarahan97@gmail.com';
    $subject = 'Contact Us';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: ".$email."\r\n";
    
    $msg = '<html>
            <head>'
            .'<p>Name: '.$name.'</p>'
            .'<p>Phone: '.$phone.'</p>'
            .'<p>Email: '.$email.'</p>'
            .'<br>'
            .$message;

    mail($to, $subject, $msg, $headers);

    echo "<script type='text/javascript'>
        alert('Message sent successfully!');
        window.location.href='contact_us.php';
        </script>";
    
}
?>