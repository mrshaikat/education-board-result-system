
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

            $exam = $_POST['exam'];
            $year = $_POST['year'];
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


            if( empty($name) || empty($roll) || empty($reg) || empty($ins) || empty($exam) || empty($year) || empty($board) ){

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

                $sql = "INSERT INTO student_info(name, roll, reg, exam, year, board, ins, photo, status) VALUES('$name', '$roll', '$reg','$exam', '$year', '$board','$ins', '$picture_uniqueName','Active') ";

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
					  <label for="">Examination</label>
                      <select name="exam">
	                            <option value="hsc">HSC/Alim/Equivalent</option>
	                            <option value="jsc">JSC/JDC</option>
	                            <option value="ssc">SSC/Dakhil</option>
								<option value="ssc_voc">SSC(Vocational)</option>
	                            <option value="hsc">HSC/Alim</option>
								<option value="hsc_voc">HSC(Vocational)</option>
								<option value="hsc_hbm">HSC(BM)</option>
								<option value="hsc_dic">Diploma in Commerce</option>
								<option value="hsc">Diploma in Business Studies</option>
                          	</select>
                      </div>

                      <div class="form-group">
					  <label for="">Exam Year</label>
                      <select name="year">
                            <option value="0000" selected>Select One</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                          </select>
                      </div>

                      <div class="form-group">
					  <label for="">Board Name</label>
                      <select name="board">
		                          <option value=""selected>Select One</option>
								  <option value="barisal">Barisal</option>
								  <option value="chittagong">Chittagong</option>
								  <option value="comilla">Comilla</option>
		                          <option value="dhaka">Dhaka</option>
								  <option value="dinajpur">Dinajpur</option>
								  <option value="jessore">Jessore</option>
		                          <option value="rajshahi">Rajshahi</option>
		                          <option value="sylhet">Sylhet</option>
		                          <option value="madrasah">Madrasah</option>
								  <option value="tec">Technical</option>
								  <option value="dibs">DIBS(Dhaka)</option>
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