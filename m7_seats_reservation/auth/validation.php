<?php

session_start();
include '../includes/functions.php';


if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST)) {
    die("You are Unethical person !!");
} else {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $user_data = get_all_users_data($email);
    if (!empty($user_data)) {
        if (strcmp($email, $user_data->email) == 0 && $pass == $user_data->password) {
            $_SESSION["validUserData"] = $user_data;
            $_SESSION["vaildUserName"] = $user_data->name;
            rj_redirect("../home.php");
        }
    }
    $_SESSION["errorMsg"] = "The username or password you’ve entered is incorrect !";
    header("location:../");
}
