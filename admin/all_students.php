
<?php require_once "template/header.php"; ?>

<?php 

$sql = "SELECT * from student_info ";
$data = $connection -> query($sql);

$all_row = $data -> num_rows ;

?>



    <!-- ADMIN  PANEL SECTION  -->

    <div class="row">
        <div class="col-md-10  " style="margin: 50px 0px 50px 30px;">
            <section class="panel b-a scrollable" style="min-height:650px; min-width: 1130px;">


                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"> <?php echo $all_row; ?> </span> <a href="#" class="font-bold">All Students</a> </div>

                <div class="">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Reg</th>
                        <th>Exam</th>
                        <th>Year</th>
                        <th>Board</th>
                        <th>Institue</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                    <?php 

                        
                        $sql = "SELECT * from student_info ";
                        $data = $connection -> query($sql);

                        $sql = "SELECT * from student_results ";
                        $num = $connection -> query($sql);
                        $all_data = $num -> fetch_assoc() ;
                        


                       $i=1;
                      
                        while(  $all_student = $data -> fetch_assoc()){

                    ?>
            <tr>
                <td><?php echo $i; $i++;?></td>
                <td> <?php echo $all_student['name']; ?> </td>
                <td><?php echo $all_student['roll']; ?></td>
                <td><?php echo $all_student['reg']; ?></td>
                <td><?php echo $all_student['exam']; ?></td>
                <td><?php echo $all_student['year']; ?></td>
                <td><?php echo $all_student['board']; ?></td>
                <td><?php echo $all_student['ins']; ?></td>
                <td>
                    <img class=" img-circle" style="width: 50px; height:50px;" src="student_photos/<?php echo $all_student['photo']; ?>">
                </td>

                <td>
                


               


                <a href="info_update.php?id=<?php echo $all_student['student_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="inc/delete_student.php?id=<?php echo $all_student['student_id']; ?>&sphoto=<?php echo $all_student['photo']; ?>" class="btn btn-danger btn-sm">Delete</a>

                        <?php 
                        
                            $res_num = checkResults($all_student['roll'], $all_student['reg'], $connection );

                            if($res_num == 0) : 
                        
                        ?>


                    <a href="add_result.php?id=<?php echo $all_student['student_id']; ?>" class="btn btn-info btn-sm">Add Result</a>

                        <?php else : ?>


                            <a href="update_student.php?id=<?php echo $all_data['student_id']; ?>" class="btn btn-warning btn-sm">Edit Result</a>

                         <?php endif ?>   


                </td>

            </tr>
                        <?php } ?>


           
                
                    </tbody>
                </table>




                </div>
                                                




					
            </section>
        </div>
    </div>


<?php require_once "template/footer.php"; ?>