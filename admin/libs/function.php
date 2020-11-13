<?php 

    
    require_once "config.php";

    function rollNumberCheck($roll, $connection){
        $sql = "SELECT * FROM student_info where roll='$roll' ";
        $data = $connection -> query($sql);

        $number = $data -> num_rows ;

       if( $number > 0  ){
            return false;
       }else{

        return true;
       }

}

function regNumberCheck($reg, $connection){
    $sql = "SELECT * FROM student_info where reg='$reg' ";
    $data = $connection -> query($sql);

    $number = $data -> num_rows ;

   if( $number > 0  ){
        return false;
   }else{

    return true;
   }

}

?>