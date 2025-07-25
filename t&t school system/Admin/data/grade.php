<?php 

//All Grades
function getAllGrade($conn) {
    $sql = "SELECT * FROM grade ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $grade = $stmt->fetchAll();
        return $grade;
    }else {
        return 0;
    }

}


//Get Grade by ID
function getGradeById($grade_id, $conn) {
    $sql = "SELECT * FROM grade WHERE grade_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$grade_id]);

    if ($stmt->rowCount() == 1) {
        $grade = $stmt->fetch();
        return $grade;
    }else {
        return 0;
    }

}
?>