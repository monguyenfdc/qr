<?php
include ('config.php');
include ('conten.php');
//BU?C 1: t?o db
$sql = "CREATE DATABASE IF NOT EXISTS qr CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'";
if (mysql_query($sql)) 
{     
    // BUOC 2: T?O TABLE
    mysql_select_db('qr');
    mysql_query("CREATE TABLE IF NOT EXISTS congnhan (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    nam VARCHAR(20) NOT NULL,
    cmnd VARCHAR(20) NOT NULL,
    doi VARCHAR(100) NOT NULL,
    ngay VARCHAR(50) NOT NULL,
    project VARCHAR(50) NOT NULL
)");
    // Th?c thi c�u truy v?n
    
     mysql_query("CREATE TABLE IF NOT EXISTS {$_COOKIE['project']} (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    doi VARCHAR(100) NOT NULL
)");
    // Th?c thi c�u truy v?n
    
     mysql_query("CREATE TABLE IF NOT EXISTS sheet1 (
    ID INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    nam VARCHAR(20) NOT NULL,
    cmnd VARCHAR(20) NOT NULL,
    doi VARCHAR(100) NOT NULL,
    note VARCHAR(50) NOT NULL,
    project VARCHAR(50) NOT NULL
)");
} else {
    echo "L?i t?o db (xem l?i tuong th�ch l?nh sql phi�n b?n php)";
}

// T?o xong th� ng?t k?t n?i

?>