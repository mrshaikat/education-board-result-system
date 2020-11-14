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

 // Create a Grad 
 function checkGrad($mark) {
     if( $mark >= 0 && $mark <= 32){
          $grad = 'F';
     }elseif($mark >= 33 && $mark <= 39){
          $grad = 'D';
     }elseif($mark >= 40 && $mark <= 49){
          $grad = 'C';
     }elseif($mark >= 50 && $mark <= 59){
          $grad = 'B';
     }elseif( $mark >= 60 && $mark <= 69 ){
          $grad = 'A-';
     }elseif($mark >= 70 && $mark <= 79){
          $grad = 'A';
     }elseif($mark >= 80 && $mark <= 100){
          $grad = 'A+';
     }else {
          $grad = 'Invalid';
     }

     return $grad;
}



// For  GPA Cal
function checkGpa($mark ){

     if( $mark >= 0 && $mark <= 32){
          $grad = '0';
     }elseif($mark >= 33 && $mark <= 39){
          $grad = '1';
     }elseif($mark >= 40 && $mark <= 49){
          $grad = '2';
     }elseif($mark >= 50 && $mark <= 59){
          $grad = '3';
     }elseif( $mark >= 60 && $mark <= 69 ){
          $grad = '3.5';
     }elseif($mark >= 70 && $mark <= 79){
          $grad = '4';
     }elseif($mark >= 80 && $mark <= 100){
          $grad = '5';
     }else {
          $grad = 'Invalid';
     }

     return $grad;

}

          //Total CGPA

         function checkCgpa($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa){
              $total_cgpa = $ban_gpa + $eng_gpa + $math_gpa + $s_gpa + $ss_gpa + $r_gpa ;
              $cgpa =  $total_cgpa / 6;

              return $cgpa;
         }

         function checkResult($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa){

		if( $ban_gpa == 0 || $eng_gpa == 0 || $math_gpa == 0 || $s_gpa == 0 || $ss_gpa == 0 || $r_gpa == 0   ){
			$result = "Failed";
		}else{
			$result = "Passed";
		}

		return $result;
	}

?>