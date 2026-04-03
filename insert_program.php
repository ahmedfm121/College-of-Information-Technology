<!DOCTYPE html>
<?php
require_once 'session_setup.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'مسؤول') {
    header("Location: index.php");
    exit;
}
?>
<html lang="ar" dir="rtl">
<head>
    <style>
        .page-title {
            background: #eef5ea;
            padding: 40px 0;
            text-align: center;
            color: #4b7f2f;
        }

        .departments {
            padding: 60px 0;
        }

        .dept-card {
            background: #fff;
            text-align: center;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        .dept-card img {
            width: 80px;
            margin-bottom: 15px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 25px;
            text-align: center;
            border-bottom: 5px solid #2980b9;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .header p {
            opacity: 0.9;
            font-size: 16px;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f9f9f9;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }

        .submit-btn {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            width: 100%;
            margin-top: 20px;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #219653, #27ae60);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 0;
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s;
            padding: 10px 20px;
            border: 1px solid #3498db;
            border-radius: 6px;
            background-color: white;
        }

        .back-link:hover {
            color: white;
            background-color: #3498db;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.2);
        }

        .ll {
            text-align: center;
        }

        .yu {
            background-color: red;
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            width: 100%;
            margin-top: 5px;
            letter-spacing: 1px;
            text-decoration: none;


        }

        .yu:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }
    </style>
    <meta charset="UTF-8">
    <title>إضافة برنامج جديد</title>
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

            <!-- 
            <nav class="nav">
                <a href="index.php">الرئيسية</a>
                <a href="">عن الكلية</a>
                <a href="department.php">الأقسام</a>
                <a href="programesA.php">البرامج</a>
                <a href="news.php">الأخبار</a>
                <a href="contact_us.php">اتصل بنا</a>
                <a href="login.php" class="login-link">تسجيل الدخول </a>
            </nav> -->

        </div>
    </header>
    <section class="page-title">
        <h1>إضافة برنامج جديد</h1>
    </section>

    <body>
        <?php
        include('contact.php');

        if (isset($_POST['add'])) {

            $name    = $_POST["name_program"];
            $mas     = $_POST["text_program"];
            $tim11   = $_POST["date_add"];
            $tim22   = $_POST["date_up"];

            $sql = "INSERT INTO program (name_program, text_program, date_add, date_up) VALUES ('$name', '$mas', '$tim11', '$tim22')";

            $r = mysqli_query($con, $sql);

            if ($r) {
                echo "<script>alert('تمت الإضافة بنجاح');</script>";
            } else {
                echo "<script>alert('فشل الإضافة');</script>";
            }
        }
        ?>
        <div class="form-container">
            <form action="insert_program.php" method="post" autocomplete="off">

                <div class="form-row">
                    <div class="form-group">
                        <label for="name_program" class="required">اسم البرنامج</label>
                        <input type="text" id="name_program" name="name_program" class="form-control" placeholder="أدخل اسم البرنامج" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text_program" class="required">الوصف / التفاصيل</label>
                    <textarea id="text_program" name="text_program" rows="7" class="form-control" placeholder="أدخل التفاصيل" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date_add" class="required">تاريخ الإضافة</label>
                        <input type="date" id="date_add" name="date_add" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="date_up">تاريخ التعديل</label>
                        <input type="date" id="date_up" name="date_up" class="form-control">
                    </div>
                </div>

                <input type="submit" name="add" class="submit-btn" value="إضافة">
                </input>
                <div class="ll ">
                    <a href="programesA.php" class=" yu"> إلغاء </a>
                </div>
            </form>
    </body>
    <footer class="footer">
        <p>© 2026 كلية الحاسبات وتكنولوجيا المعلومات</p>
    </footer>

</html>