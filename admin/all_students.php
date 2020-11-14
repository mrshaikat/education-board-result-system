
<?php require_once "template/header.php"; ?>

<?php 

$sql = "SELECT * from student_info ";
$data = $connection -> query($sql);

$all_row = $data -> num_rows ;

?>



    <!-- ADMIN  PANEL SECTION  -->

    <div class="row">
        <div class="col-md-10  " style="margin: 50px 0px 50px 50px;">
            <section class="panel b-a" style=" min-height:500px;">


                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"> <?php echo $all_row; ?> </span> <a href="#" class="font-bold">All Students</a> </div>

                <div class="scrollable">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
    <th>SL</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Reg</th>
    <th>Board</th>
    <th>Institue</th>
    <th>Photo</th>
    <th>Action</th>
                    </thead>

                    <tbody>
                    <?php 

                        $sql = "SELECT * from student_info ";
                        $data = $connection -> query($sql);

                       $i=1;
                      
                        while(  $all_student = $data -> fetch_assoc()){

                    ?>
            <tr>
                <td><?php echo $i; $i++;?></td>
                <td> <?php echo $all_student['name']; ?> </td>
                <td><?php echo $all_student['roll']; ?></td>
                <td><?php echo $all_student['reg']; ?></td>
                <td><?php echo $all_student['board']; ?></td>
                <td><?php echo $all_student['ins']; ?></td>
                <td>
                    <img class=" img-circle" style="width: 50px; height:50px;" src="student_photos/<?php echo $all_student['photo']; ?>">
                </td>

                <td>
                    <a href="add_result.php?id=<?php echo $all_student['student_id']; ?>" class="btn btn-info btn-sm">Add Result</a>
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