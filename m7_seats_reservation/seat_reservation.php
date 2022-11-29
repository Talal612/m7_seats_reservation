<?php
session_start();
if (empty($_GET['id']))
    die("You are Unethical person!");

include './includes/functions.php';
$seat = get_seat_by_id($_GET['id']);

if ($seat->isAvailable) {
    update_seat_reservation($seat->id, 0, $_SESSION["validUserData"]->id);
} else {
    if ($_SESSION["validUserData"]->id != $seat->userId)
        die('You are trying to unreserve a seat that does not belong to you!');
    update_seat_reservation($seat->id, 1, null);
}


rj_redirect('./home.php');