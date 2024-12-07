<?php
$servername = "localhost";
$username = "اسم المستخدم";
$password = "كلمة المرور";
$dbname = "اسم قاعدة البيانات";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$scanned_barcode = $_POST['barcode'];

$sql = "SELECT * FROM barcodes WHERE content = '$scanned_barcode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['content'] == 1) {
        echo "تم";
    } else {
        echo "فشل";
    }
} else {
    echo "فشل";
}

$conn->close();
?>