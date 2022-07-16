<?php

$content = $_POST["content"];
$nsfw = filter_input(INPUT_POST, "nsfw", FILTER_VALIDATE_INT);

$host = "localhost";
$dbname = "content_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error:" . mysqli_connect_error());
}

$sql = "INSERT INTO content (content, nsfw)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "si", $content, $nsfw);

mysqli_stmt_execute($stmt);

header('Location: index.html');