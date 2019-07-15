<?php


   if($_POST["action"] == "Add")
   {
    $data = array(
     ':teacher_name'    => $teacher_name,
     ':teacher_address'   => $teacher_address,
     ':teacher_emailid'   => $teacher_emailid,
     ':teacher_password'   => password_hash($teacher_password, PASSWORD_DEFAULT),
     ':teacher_qualification' => $teacher_qualification,
     ':teacher_doj'    => $teacher_doj,
     ':teacher_image'   => $teacher_image,
     ':teacher_grade_id'   => $teacher_grade_id
    );
    $query = "
    INSERT INTO tbl_teacher 
    (teacher_name, teacher_address, teacher_emailid, teacher_password, teacher_qualification, teacher_doj, teacher_image, teacher_grade_id) 
    SELECT * FROM (SELECT :teacher_name, :teacher_address, :teacher_emailid, :teacher_password, :teacher_qualification, :teacher_doj, :teacher_image, :teacher_grade_id) as temp 
    WHERE NOT EXISTS (
     SELECT teacher_emailid FROM tbl_teacher WHERE teacher_emailid = :teacher_emailid
    ) LIMIT 1
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     if($statement->rowCount() > 0)
     {
      $output = array(
       'success'  => 'Data Added Successfully',
      );
     }
     else
     {
      $output = array(
       'error'     => true,
       'error_teacher_emailid' => 'Email Already Exists'
      );
     }
    }
   }
?>

