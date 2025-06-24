<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=jevandan_bbms", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
