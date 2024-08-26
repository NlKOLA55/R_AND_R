<?php
session_start();

if(isset($_SESSION['doctor'])) {
    echo json_encode($_SESSION['doctor']);
} else {
    echo json_encode(null);
}