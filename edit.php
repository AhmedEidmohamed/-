<?php

include 'config.php';




  $id=$_GET['id'];

//   echo  $id;

   if(isset($id) && is_numeric($id))
   {

   $id=$_GET['id'];

   $stmt=$db->prepare("select * from students where id =?");

   $stmt->execute([$id]);

   
    //    var_dump($stmt);
      

       $student= $stmt->fetch(PDO::FETCH_ASSOC);

    //    var_dump($student);

   }


   
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
     

      $name=$_POST['name'];
      $level =$_POST['level'];
      $gpa =$_POST['gpa'];


      $stmt=$db->prepare('update students set name=?,level=?,gpa=? where id=?')  ;

      $stmt->execute([$name,$level,$gpa,$id]);

    
  }


  

?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل طالب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ تعديل بيانات الطالب</h1>
        </div>

        <div class="nav-links">
            <a href="index.php" class="btn btn-primary">🏠 الرئيسية</a>
            <a href="create.php" class="btn btn-success">➕ إضافة طالب</a>
        </div>

        <div class="content">
            
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">الاسم الكامل *</label>
                        <input type="text" id="name" name="name" required value="<?php echo $student['name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="grade">المستوى</label>
                        <select id="grade" name="level">
                            <option value="1" <?php echo $student['level']==1?'selected':'' ?> >1</option>
                            <option value="2" <?php echo $student['level']==2?'selected':'' ?> >2</option>
                            <option value="3" <?php echo $student['level']==3?'selected':'' ?>>3</option>
                            <option value="4" <?php echo $student['level']==4?'selected':'' ?>>4</option>
     
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gpa">المعدل التراكمي (GPA)</label>
                        <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" value="<?php echo $student['gpa'] ?>">
                    </div>

                    <button type="submit" class="btn btn-success">💾 حفظ التعديلات</button>
                    <a href="index.php" class="btn btn-primary">↩️ رجوع</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>