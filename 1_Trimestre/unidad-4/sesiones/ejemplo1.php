<?php
// Registramos uan variable con $_SESSION
session_start();
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} else {
    $_SESSION['contador']++;
}