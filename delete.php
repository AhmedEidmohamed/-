<?php
include 'config.php'; // يستدعي الاتصال بقاعدة البيانات

// التأكد من وصول id الطالب من الرابط
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];

// جلب بيانات الطالب للعرض
$stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

// إذا لم يوجد الطالب، ارجع للصفحة الرئيسية
if (!$student) {
    header("Location: index.php");
    exit;
}

// تنفيذ الحذف عند الضغط على زر الحذف
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delStmt = $db->prepare("DELETE FROM students WHERE id = ?");
    $delStmt->execute([$id]);

    header("Location: index.php"); // بعد الحذف ارجع للرئيسية
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حذف طالب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🗑️ حذف طالب</h1>
        </div>

        <div class="nav-links">
            <a href="index.php" class="btn btn-primary">🏠 الرئيسية</a>
        </div>

        <div class="content">
            <div class="alert alert-error">
                ⚠️ <strong>تنبيه:</strong> أنت على وشك حذف الطالب 
                <strong><?php echo htmlspecialchars($student['name']); ?></strong>
            </div>

            <div class="form-container">
                <p>هل أنت متأكد من أنك تريد حذف هذا الطالب؟ هذا الإجراء لا يمكن التراجع عنه.</p>
                
                <form method="POST">
                    <button type="submit" class="btn btn-danger">🗑️ نعم، احذف الطالب</button>
                    <a href="index.php" class="btn btn-primary">❌ إلغاء</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
