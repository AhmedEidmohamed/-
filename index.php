<?php

   include 'config.php';
   

   $stmt=$db->query('select * from students');


 $students=  $stmt->fetchAll(PDO::FETCH_ASSOC);

//  var_dump($students);

$total=count($students);

$avg =$db->query('select AVG(gpa) from students order by gpa DESC')->fetchColumn();

//    var_dump($avg);



   



?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>نظام إدارة الطلاب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 نظام إدارة الطلاب</h1>
            <p>إدارة كاملة لبيانات الطلاب في المؤسسة التعليمية</p>
        </div>

        <div class="nav-links">
            <a href="index.php" class="btn btn-primary">🏠 الرئيسية</a>
            <a href="create.php" class="btn btn-success">➕ إضافة طالب</a>
        </div>

        <div class="content">

            <div class="stats">
                <div class="stat-card">
                    <h3>إجمالي الطلاب</h3>
                    <div class="stat-number"><?php echo $total; ?></div>
                </div>
                <div class="stat-card">
                    <h3>متوسط المعدل</h3>
                    <div class="stat-number"> <?php echo round($avg,2) ?></div>
                </div>
                <div class="stat-card">
    <h3>أعلى معدل</h3>
    <div class="stat-number">
        <?php echo isset($top['gpa']) ? $top['gpa'] : "—"; ?>
    </div>
    <small>
        <?php echo isset($top['name']) ? $top['name'] : "لا يوجد طلاب"; ?>
    </small>
</div>


            </div>

            <!-- جدول الطلاب -->
            <div class="table-container">
               
               <?php  if(count($students)>0):    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>المستوى</th>
                                <th>المعدل</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                               <?php foreach($students as $student): ?>
                                <tr>

                                    <td><?php  echo $student['id']   ?></td>
                                    <td><?php  echo $student['name']   ?></td>
                                    <td><?php  echo $student['level']   ?></td>
                                    <td><?php  echo $student['gpa']   ?></td>


                                        

                                    <td>
                                    
                                        <a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-warning btn-sm">✏️ تعديل</a>
                                        <a href="delete.php?id=<?php echo $student['id']; ?>" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('هل أنت متأكد من حذف الطالب <?php echo ($student['name']); ?>؟')">🗑️ حذف</a>
                                    </td>
                                </tr>

                                <?php endforeach; ?>

                           
                        </tbody>
                    </table>

                    <?php  else: ?>
                    
                            <div class="alert alert-error">
                                ❌ لا توجد طلاب مسجلين في النظام. 
                                <a href="create.php" style="color: #721c24; font-weight: bold;">اضغط هنا لإضافة طالب جديد</a>
                            </div>

                     <?php endif; ?>         
                   
            </div>
        </div>
    </div>
</body>
</html>