<?php require_once "template/header.php"; ?>
									


									<!-- ADMIN  PANEL SECTION  -->

                    <div class="row">
                        <div class="col-md-10  " style="margin: 10px 0px 50px 50px;">
                            <section class="panel b-a" style=" min-height:500px;">


                                <div class="panel-heading b-b"> <a href="#" class="font-bold">Add new Students</a> </div>

                                <div class="card " style="padding:0px 50px 50px 50px;">
                                  <div class="card-body">

                                  <?php 

                                            if( $_GET['id'] ){
                                                $sid = $_GET['id'];

                                               
                                                


                                                if( isset( $_POST['submit'] ) ){

                                                    

                                                    $name = $_POST['name'];

                                                    //Roll number cheek
                                                    $roll = $_POST['roll'];
                                                    $rollNumberCheck = rollNumberCheck($roll, $connection);

                                                    //registration number check
                                                    $reg = $_POST['reg'];
                                                    $regNumberCheck = regNumberCheck($reg, $connection);

                                                    $board = $_POST['board'];
                                                    $institute = $_POST['ins'];
                                                    

                                                    //Photo Update System
                                                   
                                                    $old_photo = $_POST['old_photo'];

                                                     


                                                    
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

                                                    $tgrade = checkGrade($student_cgpa);

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
                                        <label for="">Student Name</label>
                                        <input name="name" type="text" class="form-control" value="<?php echo $single_data['name']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="">Bangla Mark</label>
                                        <input name="ban" type="text" class="form-control" value="<?php echo $single_data['ban_m']; ?>">
                                        </div>
                                        


                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Roll Number</label>
                                        <input name="roll" type="text" class="form-control" value="<?php echo $single_data['roll']; ?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="">English Mark </label>
                                        <input name="eng" type="text" class="form-control" value="<?php echo $single_data['en_m']; ?>">
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Registration No</label>
                                        <input name="reg" type="number" class="form-control" value="<?php echo $single_data['reg']; ?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="">Mathmatics Mark</label>
                                        <input name="math" type="text" class="form-control" value="<?php echo $single_data['math_m']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Board Name</label> <br>
                                            <select name="board" id="">
                                                <option value="<?php echo $single_data['board']; ?>"><?php echo $single_data['board']; ?></option>
                                                <option value="Jessore">Jessore</option>
                                                <option value="Barishal">Barishal</option>
                                                <option value="Comillha">Comillha</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Chattagong">Chattagong</option>
                                            </select>
                          
                                        </div>


                                        <div class="form-group col-md-6">
                                        <label for="">Science Mark</label>
                                        <input name="science" type="text" class="form-control" value="<?php echo $single_data['s_m']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Institute Name</label>
                                        <input name="ins" type="text" class="form-control" value="<?php echo $single_data['ins']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="">Social-sciece Mark </label>
                                        <input name="ss" type="text" class="form-control" value="<?php echo $single_data['ss_m']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Update Picture</label>
                                        <input name="new_photo" type="file" class="" id="">
                                        <input name="old_photo" type="hidden" value="<?php echo $single_data['photo']; ?>">
                                        
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="">Religion Mark</label>
                                        <input name="religion" type="text" class="form-control" value="<?php echo $single_data['r_m']; ?>">
                                        </div>
                                    </div>


                                      
                                      
                                    


                                      <div class="form-group">
                                    
                                        <input name="submit" class="btn btn-success" type="submit" value="Add student">
                                      </div>

                                    </form>

                                  </div>
                                </div>
                            </section>
                        </div>
                    </div>

    
<?php require_once "template/footer.php"; ?>
