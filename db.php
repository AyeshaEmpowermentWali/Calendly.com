<?php
$host = 'localhost';
$dbname = 'db017j5qqv5lpi';
$username = 'ugrj543f7lree';
$password = 'cgmq43woifko';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}
?>
