<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == "Admin") {
        include "../DB_Connection.php";
        include "data/subject.php";
        include "data/grade.php";
        $subject = getAllSubject($conn);
        $grade = getAllGrade($conn);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Fixed typo: UFT-8 to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Teacher</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../loogo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "../inc/navbar.php"; ?>

<div class="container mt-5"> 
    <a href="teacher.php" class="btn btn-dark">Go Back</a>
      <form method="post" class="shadow p-3 mt-5 form-w" action="req/teacher.php">
           <h3>Add New Teacher</h3><hr>
           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>
            
     <div class="mb-3">
    <label class="form-label">First Name</label>
    <input type="text" class="form-control" name="fname">
  </div>
  <div class="mb-3">
    <label class="form-label">Last Name</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="Username">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group mb-3">
         <input type="text" class="form-control" name="pass" id="passInput">
    <button class="btn btn-secondary" id="gBtn" >Random</button>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Subject</label>
    <div class="row row-cols-5">
        <?php foreach ($subject as $subject): ?>
        <div class="col">
            <input type="checkbox" name="subject[]" value="<?=$subject['subject_id']?>" >
            <?=$subject['subject']?>
        </div> 
        <?php endforeach ?>   
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Grade</label>
     <div class="row row-cols-5">
        <?php foreach ($grade as $grade): ?>
        <div class="col">
            <input type="checkbox" name="grade[]" value="<?=$grade['grade_id']?>" >
            <?=$grade['grade_code']?>-<?=$grade['grade']?>
        </div> 
        <?php endforeach ?>    
    </div>
      <button type="submit" class="btn btn-primary">Add</button>
  </div>
  </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
  $("#navLinks li:nth-child(2) a").addClass("active");
});
function makePass(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    var passInput = document.getElementById('passInput');
    passInput.value = result;
}

    var gBtn = document.getElementById('gBtn');
    gBtn.addEventListener('click', function(e){
        e.preventDefault();
        makePass(4);
    });


</script>

</body>
</html>
<?php 
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
