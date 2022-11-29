<?php

session_start();
include '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST)) {
    die("You are Unethical person !!");
} else {
    $email = !empty($_POST["email"]) ? $_POST["email"] : null;
    $name = !empty($_POST["name"]) ? $_POST["name"] : null;
    $pass = !empty($_POST["pass"]) ? $_POST["pass"] : null;

    if (!empty($email) && !empty($name) && !empty($pass)) {
        $new_user_id = create_user($email, $name, $pass);

        if ($new_user_id) {
            $user = get_user($new_user_id);
            if (empty($user)) {
                $_SESSION["errorMsg"] = "User is not existed";
                rj_redirect("../user_registration.php");
            }
        } else {
            $_SESSION["errorMsg"] = "User is already existed";
            rj_redirect("../user_registration.php");
        }
        $_SESSION['user'] = array(
            'name' => $user->name,
            'isAdmin' => $user->isAdmin,
            'userId' => $user->userId
        );
        rj_redirect("../home.php");
    } else {
        $_SESSION["errorMsg"] = "You need to fill out the form!";
        rj_redirect("../user_registration.php");
    }
}