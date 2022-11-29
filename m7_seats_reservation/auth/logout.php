<?php

include '../includes/functions.php';

session_start();
session_destroy();

session_unset();

rj_redirect("../");