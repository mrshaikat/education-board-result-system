<?php 
        require_once "../libs/config.php";



        if( isset( $_GET['id'] )  ){

             $sid = $_GET['id'];
             $student_picture = $_GET['sphoto'];

             $sql = "DELETE FROM student_info where student_id='$sid' ";
        $connection -> query($sql);

        unlink('../student_photos/'.$student_picture );
        
        header("location:../all_students.php");
            
           
        }
        

           
            

        



?> 