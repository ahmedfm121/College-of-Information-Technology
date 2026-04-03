<?php
require_once 'session_setup.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>الملف الشخصي</title>
</head>

<body>

    <h2>مرحبًا <?= $_SESSION['user_name']; ?> 👋</h2>
    <p>هذه صفحة الملف الشخصي</p>

</body>

</html>