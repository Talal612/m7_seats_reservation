<?php
session_start();
include './includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] != "POST" && !isset($_SESSION)) {
    die("You are Unethical person !");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fontawesome.com/releases/v5.15/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" s
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body>

    <nav class="navbar navbar-expand-lg bg-info ">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="#">Royal Jordanian</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active fw-bolder <?= !isset($_SESSION["validUserData"]) ? "d-none" : "" ?>"
                        aria-current="page" href="./home.php">Home</a>
                </div>
            </div>
        </div>
        <div class="mx-4 border-4 fa-solid pt-2  <?= !isset($_SESSION["validUserData"]) ? "d-none" : "" ?>">
            <h6 class=" fw-bolder "><?= $_SESSION["validUserData"]->name  ?></h6>
        </div>

        <div class="mx-4 <?= !isset($_SESSION["validUserData"]) ? "d-none" : "" ?>">
            <a href="./auth/logout.php" class="btn btn-danger ">LogOut</a>
        </div>

    </nav>

</body>