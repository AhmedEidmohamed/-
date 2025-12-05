<?php
  
 
  include 'config.php';
  //insert

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
     

      $name=$_POST['name'];
      $level =$_POST['level'];
      $gpa =$_POST['gpa'];


      $stmt=$db->prepare('insert into students(name,level,gpa) values(?,?,?)')  ;

      $stmt->execute([$name,$level,$gpa]);

    
  }

 


?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة طالب جديد</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>➕ إضافة طالب جديد</h1>
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
                        <input type="text" id="name" name="name" required value="">
                    </div>


                    <div class="form-group">
                        <label for="grade">المستوى</label>
                        <select id="grade" name="level">
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gpa">المعدل التراكمي (GPA)</label>
                        <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" >
                    </div>

                    <button type="submit" class="btn btn-success">💾 حفظ الطالب</button>
                    <a href="index.php" class="btn btn-primary">↩️ رجوع</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>