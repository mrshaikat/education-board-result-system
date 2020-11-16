
<?php require_once "template/header.php"; ?>
			<!-- ADMIN  PANEL SECTION  -->

    <div class="row">
        <div class="col-md-10  " style="margin: 20px 0px 50px 50px;">
            <section class="panel b-a" style=" min-height:1200px; padding: 0px 100px;">

    <?php 

    if(isset($_GET['id'])){
        $sid= $_GET['id'];

    }else{
        $sid= '';
    }
		
        if(isset( $_POST['submit'] )){

            $sql = "SELECT * FROM student_info WHERE student_id = '$sid' ";
            $data =  $connection -> query( $sql);

            $data_by_id = $data -> fetch_assoc();

              $name = $data_by_id['name'];
              $roll = $data_by_id['roll'];
              $reg = $data_by_id['reg'];
              $board = $data_by_id['board'];
              $s_ins = $data_by_id['ins'];
              $s_photo = $data_by_id['photo'];



            $ban = $_POST['ban'];
            $ban_g = checkGrad($ban );
            $ban_gpa = checkGpa($ban );
            
            $eng = $_POST['en'];
            $eng_g = checkGrad($eng);
            $eng_gpa = checkGpa($eng );

            $math = $_POST['math'];
            $math_g = checkGrad($math);
            $math_gpa = checkGpa($math );

            $science = $_POST['science'];
            $s_g = checkGrad($science);
            $s_gpa = checkGpa($science );

            $ss = $_POST['ss'];
            $ss_g = checkGrad($ss);
            $ss_gpa = checkGpa($ss );

            $religion = $_POST['religion'];
            $r_g = checkGrad($religion);
            $r_gpa = checkGpa($religion );

            $student_cgpa = checkCgpa($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa);


            $result = checkResult($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa);

            $tgrade = checkGrade($student_cgpa);

            $cgpa = round($student_cgpa );
            


            


            if( empty($ban) || empty($eng) || empty($math) || empty($science) || empty($ss) || empty($religion) ){

               $message = "<p class='alert alert-danger text-center'><strong>Fild Must Not Be Empty</strong> !! <button class='close' data-dismiss='alert'>&times;</button> </p>";
            }else{

                $sql ="INSERT INTO student_results(name, roll, reg, board, ins, photo, ban_m, ban_g, ban_gpa, en_m, en_g, en_gpa, math_m, math_g, math_gpa,  s_m, s_g, s_gpa, ss_m, ss_g, ss_gpa, r_m, r_g, r_gpa,tgrade, cgpa, result) values('$name', '$roll', '$reg', '$board','$s_ins','$s_photo','$ban', '$ban_g', '$ban_gpa', '$eng', '$eng_g', '$eng_gpa', '$math', '$math_g', '$math_gpa' ,'$science', '$s_g', '$s_gpa', '$ss', '$ss_g', '$ss_gpa', '$religion', '$r_g', '$r_gpa','$tgrade', '$cgpa', '$result')";

                $connection -> query($sql);

                $message = "<p class='alert alert-success text-center'><strong>Student Result Added Successfully </strong>!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

               

            }

        }
    
    ?>

                    <div class="panel-heading b-b"> <a href="#" class="font-bold">Add Result</a> </div>

                <div class="addstu_message">
                       <?php

                        if( isset($message) ){

                              echo $message;
                        }
                       
                       ?>
				 </div>

                                              
				  <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $sid?>" method="POST">

                          <div class="form-group">
						  <label for="">Bangla</label>
						  <input name="ban" class=" form-control" type="text" value=" ">
					  </div>

                        <div class="form-group">
						  <label for="">English</label>
						  <input name="en" class=" form-control" type="text">
                        </div>
                        
                        <div class="form-group">
						  <label for="">Mathmatic</label>
						  <input name="math" class=" form-control" type="text">
                        </div>
                        
                        <div class="form-group">
						  <label for="">Science</label>
						  <input name="science" class=" form-control" type="text">
                        </div>
                        
                        <div class="form-group">
						  <label for="">Social Science</label>
						  <input name="ss" class=" form-control" type="text">
                        </div>
                        
                        <div class="form-group">
						  <label for="">Religion</label>
						  <input name="religion" class=" form-control" type="text">
						</div>
						
                       

                                
					  

					  
                      
                    
					  
                                
					  
                                

					  <div class="form-group">
						 
						  <input name="submit" class=" btn btn-info" type="submit" value="Add Resuld">
                                </div>
                                
                                
				  </form>

			 




                                                




					
                                            </section>
                                        </div>
                                    </div>


<?php require_once "template/footer.php"; ?>