<?php
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

/* Set session variables to be used on profile.php page */
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

/* Escape all $_POST variables to protect against SQL injections */
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

/* Check if user with that email already exists */
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

/* We know user email exists if the rows returned are more than 0 */
if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
} else {
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    /* Add user to the database */
if ( $mysqli->query($sql) ){
    $_SESSION['admin'] = 0; //0 so that users don't get admin priviliges
    $_SESSION['active'] = 0; //0 until user activates their account with verify.php
    $_SESSION['logged_in'] = true; // So we know the user has logged in
    $_SESSION['message'] =

                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        /* Send registration confirmation link. */
    $to      = $email;
    $subject = 'Account Verification ( clevertechie.)';
    $message_body = '
    Hej '.$first_name.',

    Tack för att du har registrerat dig!

    Var vänlig att klicka på den här länken för att aktivera kontot:

    http://localhost/login-system/verify.email='.$email.'&hash='.$hash;

    mail( $to, $subject, $message_body );

    header("location: profile.php");

    }

    else {
        $_SESSION['message'] = 'Registreringen misslyckades!';
        header("location: error.php");
    }

}
