<?php
try {
    $user = 'root';
    $password = '';
    $dsn = "mysql:host=localhost;dbname=sec4;port=3306;charset=utf8";

    $db = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // إنشاء الجدول إذا لم يوجد
    $db->exec("CREATE TABLE IF NOT EXISTS students (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name VARCHAR(50) NOT NULL,
        level INT NOT NULL,
        gpa FLOAT NOT NULL
    )");

    // ---------- المثال هنا بدون إدخال تلقائي ----------
    // يمكنك عمل INSERT عند الحاجة في ملفات create.php أو عند POST

    // جلب كل الطلاب
    $students = $db->query("SELECT * FROM students")->fetchAll();

    // إجمالي الطلاب
    $total = count($students);

    // متوسط المعدل
    $avg = $db->query("SELECT AVG(gpa) FROM students")->fetchColumn();

    // أعلى معدل واسم صاحبه
    $top = $db->query("SELECT name, gpa FROM students ORDER BY gpa DESC LIMIT 1")->fetch();

} catch (PDOException $e) {
    echo 'فشل الاتصال: ' . $e->getMessage();
}
