
<?php require_once "template/header.php"; ?>
									<!-- ADMIN  PANEL SECTION  -->

                                    <div class="row">
                                        <div class="col-md-10  " style="margin: 20px 0px 50px 50px;">
                                            <section class="panel b-a" style=" min-height:1200px; padding: 0px 100px;">

                                            <?php 
		
        if(isset( $_POST['submit'] )){

            $name = $_POST['name'];

            //roll Management
            $roll = $_POST['roll'];
            $rollNumberCheck = rollNumberCheck($roll, $connection);

            //Registration Management
            $reg = $_POST['reg'];
            $regNumberCheck = regNumberCheck($reg, $connection);


            $board = $_POST['board'];
            $ins = $_POST['ins'];
            $sphoto = $_FILES['sphoto'];

            $picture_name = $sphoto['name']; 
               
            $tmp_name = $sphoto['tmp_name'];


            //Picture Management
            $picture_extension_array = explode('.',$picture_name); 

            $picture_extension = end($picture_extension_array);  
            $picture_orginal_extension = strtolower($picture_extension );

            $picture_uniqueName = md5( time().rand()).".".$picture_orginal_extension;


            if( empty($name) || empty($roll) || empty($reg) || empty($ins) || empty($board) ){

               $message = "<p class='alert alert-danger text-center'>Fild Must Not Be Empty!! <button class='close' data-dismiss='alert'>&times;</button> </p>";
            }
            elseif( $rollNumberCheck == false ){

                $message = "<p class='alert alert-danger text-center'><strong>Roll Number</strong> Already Exists !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

             }

             elseif( $regNumberCheck == false ){

                $message = "<p class='alert alert-danger text-center'><strong>Registration Number</strong> Already Exists !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

             }

             
             elseif( in_array( $picture_orginal_extension, ['jpg','png','jpeg','gif']) == false  ){

                $message = "<p class='alert alert-danger text-center'>Invalid Image formate !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

             }
            else{

                $sql = "INSERT INTO student_info(name, roll, reg, board, ins, photo, status) VALUES('$name', '$roll', '$reg', '$board','$ins', '$picture_uniqueName','Active') ";

                    $connection -> query($sql);

                move_uploaded_file($tmp_name, 'student_photos/'.$picture_uniqueName);

                $message = "<p class='alert alert-success text-center'>Student Added Successfull <button class='close' data-dismiss='alert'>&times;</button> </p>";

            }

        }
    
    ?>

                    <div class="panel-heading b-b"> <a href="#" class="font-bold">Add New Student</a> </div>

                <div class="addstu_message">
                       <?php

                        if( isset($message) ){

                              echo $message;
                        }
                       
                       ?>
				 </div>

                                              
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
						  <label for="">Student Name</label>
						  <input name="name" class=" form-control" type="text" value=" ">
					  </div>

                        <div class="form-group">
						  <label for="">Student Roll</label>
						  <input name="roll" class=" form-control" type="text">
						</div>
						
                        <div class="form-group">
						  <label for="">Reg.No</label>
						  <input name="reg" class=" form-control" type="text">
					  </div>

                                
					  

					  <div class="form-group">
					  <label for="">Board</label>
						  <select name="board" id="">
							  <option value="Jessore">Jessore</option>
							  <option value="Barishal">Barishal</option>
							  <option value="Comillha">Comillha</option>
							  <option value="Dhaka">Dhaka</option>
							  <option value="Chattagong">Chattagong</option>
						  </select>
                      </div>
                      
                      <div class="form-group">
						  <label for="">Institute</label>
						  <input name="ins" class=" form-control" type="text">
					  </div>

					  
                                
					  <div class="form-group">

						  <label for="">Profile Picture</label>
						  <input name="sphoto" class="" type="file">

                        </div>
                                

					  <div class="form-group">
						 
						  <input name="submit" class=" btn btn-info" type="submit" value="Add Student">
                                </div>
                                
                                
				  </form>

			 




                                                




					
                                            </section>
                                        </div>
                                    </div>


<?php require_once "template/footer.php"; ?>