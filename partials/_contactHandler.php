<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $servername = "localhost";
    $database = "portfolio";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if ($conn) {
        $sql = "INSERT INTO `contact` (`sno`, `name`, `email`, `subject`, `message`, `tstamp`) VALUES (NULL, '$name', '$email', '$subject', '$message', current_timestamp());";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            header("Location: /Portfolio/index.php?success=Your request has been recorded successfully!");
        }
        if (!$insert) {
            header("Location: /Portfolio/index.php?error=We are facing some technical issues!");
        }
    }
    if (!$conn) {
        echo "Error while connecting...";
    }
}
?>