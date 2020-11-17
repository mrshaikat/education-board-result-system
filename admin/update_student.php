<?php require_once "template/header.php"; ?>
									


									<!-- ADMIN  PANEL SECTION  -->

                    <div class="row">
                        <div class="col-md-10  " style="margin: 10px 0px 50px 50px;">
                            <section class="panel b-a" style=" min-height:500px;">


                                <div class="panel-heading b-b"> <a href="#" class="font-bold">Update Student Result</a> </div>

                                <div class="card " style="padding:0px 50px 50px 50px;">
                                  <div class="card-body">

                                  <?php 

                                            if( $_GET['id'] ){
                                                $sid = $_GET['id'];

                                               
                                                


                                                if( isset( $_POST['submit'] ) ){

                                                    $sql = "SELECT * FROM student_info WHERE student_id = '$sid' ";
                                                    $data =  $connection -> query( $sql);
                                        
                                                    $data_by_id = $data -> fetch_assoc();
                                        
                                                      $name = $data_by_id['name'];
                                                      $roll = $data_by_id['roll'];
                                                      $rollNumberCheck = rollNumberCheck($roll, $connection);

                                                      $reg = $data_by_id['reg'];
                                                      $regNumberCheck = regNumberCheck($reg, $connection);

                                                      $board = $data_by_id['board'];
                                                      $institute = $data_by_id['ins'];
                                                      



                                                    

                                                   

                                                    

                                                    //Photo Update System
                                                   
                                                    $old_photo = $data_by_id['photo'];

                                                     


                                                    
                                                    $ban = $_POST['ban'];
                                                    $ban_g = checkGrad($ban);
                                                    $ban_gpa = checkGpa($ban );

                                                    $eng =  $_POST['eng'];
                                                    $eng_g = checkGrad($eng);
                                                    $eng_gpa = checkGpa($eng );

                                                    $math =  $_POST['math'];
                                                    $math_g = checkGrad($math);
                                                    $math_gpa = checkGpa($math );

                                                    $science =  $_POST['science'];
                                                    $s_g = checkGrad($science);
                                                    $s_gpa = checkGpa($science );

                                                    $ss =  $_POST['ss'];
                                                    $ss_g = checkGrad($ss);
                                                    $ss_gpa = checkGpa($ss );

                                                    $religion =  $_POST['religion'];
                                                    $r_g = checkGrad($religion);
                                                    $r_gpa = checkGpa($religion );

                                                    

                                                    $student_cgpa = checkCgpa($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa);


                                                    $result = checkResult($ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa);

                                                    $tgrade = checkGrade($student_cgpa, $ban_gpa, $eng_gpa, $math_gpa, $s_gpa, $ss_gpa, $r_gpa);

                                                    $cgpa = round($student_cgpa );

                                                    if( !empty( $_FILES['new_photo']['name'] ) ){
                                                         $new_photo = $_FILES['new_photo']['name'];
                                                         $new_photot = $_FILES['new_photo']['tmp_name'];
    
                                                        $picture_extension_array = explode('.',$new_photo); 
    
                                                        $picture_extension = end($picture_extension_array);  
                                                        $picture_orginal_extension = strtolower($picture_extension );
                                   
                                                        $update_image_name = md5( time().rand().$new_photo).".".$picture_orginal_extension;
    
                                                        move_uploaded_file($new_photot, 'student_photos/'.$update_image_name);
    
                                                        //remove old picture
                                                        unlink('student_photos/'.$old_photo);
    
                                                        
    
                                                        }
                                                        
                                                         else{
    
                                                            $update_image_name = $old_photo;

                                                            
    
                                                        }

                                                        $sql ="UPDATE student_results SET name='$name', roll='$roll', reg='$reg', board = '$board', ins='$institute', photo='$update_image_name', ban_m='$ban', ban_g='$ban_g',ban_gpa='$ban_gpa', en_m='$eng', en_g='$eng_g', en_gpa='$eng_gpa', math_m='$math', math_g='$math_g', math_gpa='$math_gpa', s_m='$science', s_g='$s_g', s_gpa='$s_gpa', ss_m ='$ss', ss_g='$ss_g', ss_gpa='$ss_gpa', r_m='$religion', r_g='$r_g', r_gpa='$r_gpa', tgrade='$tgrade', cgpa='$cgpa', result='$result'  where student_id='$sid' ";

                                                            $connection -> query($sql);
                                                 
                                                                 $message = "<p class='alert alert-success text-center'><strong>Studen Information and Result Update Done</strong> !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

                                                      
            
                                                }


                                                $sql = "SELECT * FROM student_results where student_id='$sid' ";
                                                $data = $connection -> query($sql);

                                                $single_data = $data -> fetch_assoc();

                                                


                                            }

                                    ?>  


                                 
                                 
                                 

                                   


                                    <div class="mess">
                                        <?php  

                                          if( isset($mess) ){
                                            echo $mess;
                                          }

                                        ?>
                                    </div>





                                    <form action="<?php  echo $_SERVER['PHP_SELF'];?>?id=<?php echo $sid;  ?>" method="POST" enctype="multipart/form-data">

                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-6">
                                        <label for="">Bangla Mark</label>
                                        <input name="ban" type="text" class="form-control" value="<?php echo $single_data['ban_m']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="">English Mark </label>
                                        <input name="eng" type="text" class="form-control" value="<?php echo $single_data['en_m']; ?>">
                                        </div>
                                        


                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Mathmatics Mark</label>
                                        <input name="math" type="text" class="form-control" value="<?php echo $single_data['math_m']; ?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="">Science Mark</label>
                                        <input name="science" type="text" class="form-control" value="<?php echo $single_data['s_m']; ?>">
                                        </div>

                                       
                                        
                                        
                                    </div>

                                    <div class="form-row">
                                        
                                    <div class="form-group col-md-6">
                                        <label for="">Social-sciece Mark </label>
                                        <input name="ss" type="text" class="form-control" value="<?php echo $single_data['ss_m']; ?>">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Religion Mark</label>
                                        <input name="religion" type="text" class="form-control" value="<?php echo $single_data['r_m']; ?>">
                                        </div>

                                    

                                    

                                   

                                      
                                      
                                    


                                      <div class="form-group">
                                    
                                        <input name="submit" class="btn btn-success" type="submit" value="Result Update">
                                      </div>

                                    </form>

                                  </div>
                                </div>
                            </section>
                        </div>
                    </div>

    
<?php require_once "template/footer.php"; ?>
