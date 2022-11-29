<?php

function rj_redirect($path)
{
    header("Location: $path");
    exit();
}

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clients";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function create_user($email, $name, $pass)
{
    $connection = connect();
    $sql = "INSERT INTO users (email,password,name) VALUES ('$email','$pass','$name')";
    $new_user_id = 0;
    if (mysqli_query($connection, $sql)) {
        $new_user_id = $connection->insert_id;
    }
    mysqli_close($connection);
    return $new_user_id;
}

function get_user($id)
{
    $connection = connect();
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    return mysqli_fetch_object($result);
}


function get_all_users_data($email)
{
    $connection = connect();
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $user = mysqli_fetch_object(mysqli_query($connection, $sql));
    mysqli_close($connection);
    return $user;
}


function create_seats($seats_number)
{
    for ($i = 1; $i <= $seats_number; $i++) {
        $connection = connect();
        $query = "INSERT INTO seats (seatNumber) VALUES ($i)";
        mysqli_query($connection, $query);
        mysqli_close($connection);
    }
}

function get_all_seats_data()
{
    $seats = array();
    $connection = connect();
    $sql = "SELECT * FROM seats";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) {
            $seats[] = $row;
        }
    }
    mysqli_close($connection);
    return $seats;
}



function get_seat_by_id($id)
{
    $connection = connect();
    $sql = "SELECT * FROM seats WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    return mysqli_fetch_object($result);
}



function update_seat_reservation($id, $status, $user_id)
{
    $user_id = !empty($user_id) ? $user_id : "NULL";
    $connection = connect();
    $sql = <<<EOD
    UPDATE seats
        SET isAvailable=$status, userId=$user_id
        WHERE id=$id
    EOD;
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
}