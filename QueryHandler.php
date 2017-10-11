<?php
    class QueryHandler{
        public static function insert_student($student_ID, $student_name, $student_major, $student_year, $student_semester)
        {

            $conn = mysqli_connect('localhost','root','','capstone');
            if(!$conn)
                die("CONNECTION FAILED :" . mysqli_error($conn));

            $check = mysqli_query($conn,"SELECT * FROM student WHERE StuID = '$student_ID'");
            $exists = mysqli_num_rows($check);

            if($exists == 0)
            {
            $query = "INSERT INTO student (StuID,StuName,StuMajor,StuYear,StuSemester) VALUES ('$student_ID','$student_name','$student_major','$student_year','$student_semester')";
            $result = mysqli_query($conn,$query);
            }else {
              echo "<script>alert('Student Already Exists, entry not stored');</script>";
            }


            mysqli_close($conn);
        }

    }
?>
