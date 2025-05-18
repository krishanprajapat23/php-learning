<?php

// Assuming `auth()` returns true if user is logged in
if ($_SESSION['user'] ?? false) {
    view('dashboard.view.php');
} else {
    view('index.view.php');
}