<?php 
        require_once "../libs/config.php";



        if( isset( $_GET['id'] ) &&  isset( $_GET['resultid'] )  ){

             $sid = $_GET['id'];
             $student_picture = $_GET['sphoto'];
             $result_id = $_GET['resultid'];

             $sql = "DELETE FROM student_info where student_id='$sid' ";
             $connection -> query($sql);

             $sql = "DELETE FROM student_results where student_id='$result_id' ";
             $connection -> query($sql);

        unlink('../student_photos/'.$student_picture );
        
        header("location:../all_students.php");
            
           
        }
        

           
            

        



?> 