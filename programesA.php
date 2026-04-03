<!DOCTYPE html>
<?php
require_once 'session_setup.php';
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'مسؤول';
?>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>الأقسام الأكاديمية</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png">
                <span>كلية الحاسبات وتكنولوجيا المعلومات</span>
            </div>
            <nav class="nav">
                <a href="index.php">الرئيسية</a>
                <a href="about.php">عن الكلية</a>
                <a href="department.php">الأقسام</a>
                <a href="programesA.php">البرامج</a>
                <a href="news.php">الأخبار</a>
                <a href="contact_us.php">اتصل بنا</a>


                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="profile.php" class="login-link"> الملف الشخصي</a>
                    <a href="logout.php" class="login-link">تسجيل الخروج</a>
                <?php else: ?>
                    <a href="login.php" class="login-link">تسجيل الدخول</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <section class="page-title">
        <h1>اقسام البرامج</h1>
    </section>

    <?php
    include('contact.php');
    $sql = "select * from program order by id_program DESC";
    $sp = $con->prepare($sql);
    $sp->execute();
    $result = $sp->get_result();
    ?>

    <!-- ================== المستخدم العادي ================== -->
    <?php if (!$isAdmin): ?>
        <section class="programs">
    <div class="container">
        <h2 class="section-title">البرامج الأكاديمية</h2>

        <div class="grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card program-card">

                    <?php if (!empty($row['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($row['image']); ?>" 
                             alt="برنامج"
                             style="width:100%;height:180px;object-fit:cover;border-radius:6px;margin-bottom:15px;">
                    <?php endif; ?>

                    <h3><?= htmlspecialchars($row['name_program']); ?></h3>

                    <p>
                        <?= htmlspecialchars($row['text_program']); ?>
                    </p>

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
        <table class="styled-table">
            <thead>
                <?php if ($isAdmin): ?>
                    <tr><a href="insert_program.php" class="btn">إضافة</a></tr>
                <?php endif; ?>
                <tr>
                    <th>الرقم</th>
                    <th>اسم البرنامج</th>
                    <th> تفاصيل</th>
                    <th> تاريخ الاضافة</th>
                    <?php if ($isAdmin): ?>
                        <th>تارخ التعديل </th>
                        <th>التعديل</th>
                        <th>حذف</th>
                    <?php endif; ?>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $row["name_program"]; ?></td>
                        <td><?php echo $row["text_program"]; ?></td>
                        <td class="date"> <?php echo $row["date_add"]; ?></td>
                        <?php if ($isAdmin): ?>
                            <td class="date"> <?php echo $row["date_up"]; ?></td>
                            <td><a class="btn-edit" href="updateprogrames.php?id=<?php echo $row['id_program']  ?>&edit=update">تعديل</a></td>
                            <td><a class="btn-delete" href="deleteprograms.php?id=<?php echo $row['id_program']  ?>&del=delete" onClick="return con">X</a></td>
                        <?php endif; ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>
    <footer class="footer">
        <p>© 2026 كلية الحاسبات وتكنولوجيا المعلومات</p>
    </footer>
</body>

</html>
<?php





?>