<!DOCTYPE html>
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'مسؤول';

include('contact.php');
?>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>الأقسام الأكاديمية</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <span>كلية الحاسبات وتكنولوجيا المعلومات</span>
            </div>

            <nav class="nav">
                <a href="index.php">الرئيسية</a>
                <a href="about.php">عن الكلية</a>
                <a href="department.php">الأقسام</a>
                <a href="programesA.php">البرامج</a>
                <a href="news.php">الأخبار</a>
                <a href="contact.php">اتصل بنا</a>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="profile.php" class="login-link">الملف الشخصي</a>
                    <a href="logout.php" class="login-link">تسجيل الخروج</a>
                <?php else: ?>
                    <a href="login.php" class="login-link">تسجيل الدخول</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <section class="page-title">
        <h1>الأقسام الأكاديمية</h1>
    </section>

    <?php
    $sql = "SELECT * FROM academic ORDER BY id_Academic DESC";
    $result = $con->query($sql);
    ?>

    <?php if (!$isAdmin): ?>
        <section class="departments">
            <div class="container">
                <div class="grid">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($row['name']); ?></h3>

                            <p style="margin:15px 0; line-height:1.7;">
                                <?= htmlspecialchars($row['descr']); ?>
                            </p>

                            <small style="color:#666;">
                                تاريخ الإنشاء:
                                <?= htmlspecialchars($row['data_start']); ?>
                            </small>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($isAdmin): ?>
        <?php
        $result->data_seek(0);
        $count = 1;
        ?>

        <section class="departments">
            <div class="container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th colspan="7" style="text-align:right;">
                                <a href="insert.php" class="btn">إضافة قسم</a>
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>اسم القسم</th>
                            <th>العنوان</th>
                            <th>التفاصيل</th>
                            <th>تاريخ الإنشاء</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= htmlspecialchars($row['name']); ?></td>
                                <td><?= htmlspecialchars($row['Address']); ?></td>
                                <td class="details"><?= htmlspecialchars($row['descr']); ?></td>
                                <td class="date"><?= htmlspecialchars($row['data_start']); ?></td>
                                <td>
                                    <a class="btn-edit"
                                        href="update.php?id=<?= $row['id_Academic']; ?>&edit=1">
                                        تعديل
                                    </a>
                                </td>
                                <td>
                                    <a class="btn-delete"
                                        href="delete.php?id=<?= $row['id_Academic']; ?>&del=delete"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                        X
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>

    <footer class="footer">
        <p>© 2026 كلية الحاسبات وتكنولوجيا المعلومات</p>
    </footer>

</body>

</html>