<?php
header('Content-Type: application/json');

try {
    $db = new PDO("mysql:host=localhost;dbname=sec4;charset=utf8", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $students = $db->query("SELECT * FROM students")->fetchAll();
    $total = count($students);
    $avg = $db->query("SELECT AVG(gpa) FROM students")->fetchColumn();
    $top = $db->query("SELECT name, gpa FROM students ORDER BY gpa DESC LIMIT 1")->fetch();

    echo json_encode([
        'students' => $students,
        'total' => $total,
        'avg' => floatval($avg),
        'top' => $top
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
