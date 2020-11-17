<?php require_once "template/header.php"; ?>
									


									<!-- ADMIN  PANEL SECTION  -->

                    <div class="row">
                        <div class="col-md-10  " style="margin: 10px 0px 50px 50px;">
                            <section class="panel b-a" style=" min-height:500px;">


                                <div class="panel-heading b-b"> <a href="#" class="font-bold"><strong>Update Student Information</strong></a> </div>

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

                                                    $exam = $_POST['exam'];
                                                    $year = $_POST['year'];
                                                    $board = $_POST['board'];
                                                    $institute = $_POST['ins'];
                                                    

                                                    //Photo Update System
                                                   
                                                    $old_photo = $_POST['old_photo'];

                                                     


                                                   
                                                    


                                                    

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

                                                        $sql ="UPDATE student_info SET name='$name', roll='$roll', reg='$reg',exam='$exam', year='$year', board = '$board', ins='$institute', photo='$update_image_name'  where student_id='$sid' ";

                                                            $connection -> query($sql);
                                                 
                                                                 $message = "<p class='alert alert-success text-center'><strong>Studen Information Successfull</strong> !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

                                                      
            
                                                }


                                                $sql = "SELECT * FROM student_info where student_id='$sid' ";
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
                                        <label for="">Roll Number</label>
                                        <input name="roll" type="text" class="form-control" value="<?php echo $single_data['roll']; ?>">
                                        </div>

                                </div>


                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="">Registration No</label>
                                        <input name="reg" type="text" class="form-control" value="<?php echo $single_data['reg']; ?>">
                                        </div>



                                        <div class="form-group col-md-6">
                                        <label for="">Institute Name</label>
                                        <input name="ins" type="text" class="form-control" value="<?php echo $single_data['ins']; ?>">
                                        </div>

                                </div>

                                    
                                    <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="">Examination</label> <br>
                                            <select name="exam" id="">
                                            <option value="<?php echo $single_data['exam']; ?>" selected><?php echo $single_data['exam']; ?></option>
                                                
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


                                        

                                        <div class="form-group col-md-6">
                                        <label for="">Year</label> <br>
                                            <select name="year" id="">
                                                
                                                
                                                     <option value="<?php echo $single_data['year']; ?>" selected><?php echo $single_data['year']; ?></option>
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

                                       

                                       
                                        
                                        
                                    </div>






                                <div class="form-row">

                                    <div class="form-group col-md-6">

                                            <label for="">Board Name</label> <br>
                                            <select name="board" id="">
                                                     <option value="<?php echo $single_data['board']; ?>" selected><?php echo $single_data['board']; ?></option>
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

                                    
                                    
                                    </div>



                                    <div class="form-row">

                                    <div class="form-group col-md-6">
                                    <img class=" img-thumbnail" style=" width:100px; height:100px;" src="student_photos/<?php echo $single_data['photo']; ?>" alt="">
                                      <input name="old_photo" type="hidden" value="<?php echo $single_data['photo']; ?>">
                                        
                                        </div>

                                        <div class="form-group col-md-6">
                                       
                                        <input name="" type="hidden" class="" id="">
                                        
                                        
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="">Update Picture</label>
                                        <input name="new_photo" type="file" class="" id="">
                                        
                                        
                                        </div>

                                        
                                       
                                    </div>

                                   


                                      
                                      
                                    


                                      <div class="form-group">
                                    
                                        <input name="submit" class="btn btn-success" type="submit" value="Update Info">
                                      </div>

                                    </form>

                                  </div>
                                </div>
                            </section>
                        </div>
                    </div>

    
<?php require_once "template/footer.php"; ?>
