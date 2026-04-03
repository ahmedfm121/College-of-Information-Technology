<!DOCTYPE html>
<?php require_once 'session_setup.php';
?>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>عن الكلية</title>
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
                    <a href="profile.php" class="login-link">الملف الشخصي</a>
                    <a href="logout.php" class="login-link">تسجيل الخروج</a>
                <?php else: ?>
                    <a href="login.php" class="login-link">تسجيل الدخول</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <section class="page-title">
        <h1>عن الكلية</h1>
    </section>

    <section class="about-page">
        <div class="container">

            <div class="about-block">
                <h2>نبذة عن الكلية</h2>
                <p>
                    تأسست كلية الحاسبات وتكنولوجيا المعلومات بهدف إعداد كوادر
                    مؤهلة علميًا وعمليًا في مجالات الحوسبة وتقنيات المعلومات،
                    بما يخدم المجتمع ويلبي احتياجات سوق العمل.
                </p>
            </div>

            <div class="about-block">
                <h2>رؤية الكلية</h2>
                <p>
                    الريادة والتميز في التعليم والبحث العلمي في مجالات
                    الحاسبات وتكنولوجيا المعلومات محليًا وإقليميًا.
                </p>
            </div>

            <div class="about-block">
                <h2>رسالة الكلية</h2>
                <p>
                    تقديم برامج تعليمية متميزة، وإجراء بحوث علمية تطبيقية،
                    والمساهمة في التنمية المستدامة من خلال إعداد خريجين
                    قادرين على المنافسة في سوق العمل.
                </p>
            </div>

            <div class="about-block">
                <h2>أهداف الكلية</h2>
                <ul>
                    <li>إعداد خريجين مؤهلين في مجالات الحوسبة.</li>
                    <li>دعم البحث العلمي والابتكار.</li>
                    <li>خدمة المجتمع وتنمية البيئة.</li>
                    <li>مواكبة التطور التكنولوجي.</li>
                </ul>
            </div>

        </div>
    </section>

    <footer class="footer">
        <p>© 2026 كلية الحاسبات وتكنولوجيا المعلومات</p>
    </footer>

</body>

</html>