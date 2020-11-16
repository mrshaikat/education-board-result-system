
<?php 
include_once "admin/libs/function.php";

		if( isset( $_POST['submit']) ){

			$exam = $_POST['exam'];
			$year = $_POST['year'];
			$board = $_POST['board'];
			$roll = $_POST['roll'];
			$reg = $_POST['reg'];


			$sql = "SELECT * FROM student_results where board= '$board' AND roll='$roll' AND reg='$reg' ";
			$data = $connection -> query($sql);

			$search_result_data = $data -> fetch_assoc() ;



		}else{
			header("location:index.php");
		}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="assets/css/syle.css">

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/bd_logo.png">
</head>
<body>
	

	<div class="wraper">
		<div class="w-top">
			<div class="logo">
				<img src="assets/images/bd_logo.png" alt="">
			</div>
			<div class="banner">
				<h3>Ministry of Education</h3>
				<hr>
				<h4>Intermediate and Secondary Education Boards Bangladesh</h4>
			</div>
		</div>
		<div class="w-main">


				<div class="student-info">
					<div class="student-photo">
						<img src="admin/student_photos/<?php echo $search_result_data['photo'] ?>" alt="">
					</div>
					<div class="student-details">
						<table>
							<tr>
								<td>Name</td>
								<td><?php echo $search_result_data['name'] ?></td>
							</tr>
							<tr>
								<td>Roll</td>
								<td><?php echo $search_result_data['roll'] ?></td>
							</tr>
							<tr>
								<td>Reg.</td>
								<td><?php echo $search_result_data['reg'] ?></td>
							</tr>
							<tr>
								<td>Board</td>
								<td><?php echo $search_result_data['board'] ?></td>
							</tr>
							<tr>
								<td>Institute</td>
								<td><?php echo $search_result_data['ins'] ?></td>
							</tr>
							<tr>
								<td>Result</td>
								<td>


								<?php 
								
									if($search_result_data['result'] == 'Passed'): 
									
								?>

								<span style="color:green;font-weight:bold;">Passed<span>

								<?php 

									else :

								?>

								<span style="color:red;font-weight:bold;">Failed<span>


								<?php endif; ?>			







								</td>
							</tr>
						</table>
					</div>

				</div>

				<div class="student-result">
					<table>
						<tr>
							<td>Subject</td>
							<td>Marks</td>
							<td>Grade</td>
							<td>GPA</td>
							<td>CGPA</td>
						</tr>
						<tr>
							<td>Bangla</td>
							<td><?php echo $search_result_data['ban_m'] ?></td>
							<td><?php echo $search_result_data['ban_g'] ?></td>
							<td><?php echo $search_result_data['ban_gpa'] ?></td>
							<td rowspan="6"><?php echo $search_result_data['cgpa'] ?></td>
						</tr>
						<tr>
							<td>English</td>
							<td><?php echo $search_result_data['en_m'] ?></td>
							<td><?php echo $search_result_data['en_g'] ?></td>
							<td><?php echo $search_result_data['en_gpa'] ?></td>
						</tr>
						<tr>
							<td>Mathmatics</td>
							<td><?php echo $search_result_data['math_m'] ?></td>
							<td><?php echo $search_result_data['math_g'] ?></td>
							<td><?php echo $search_result_data['math_gpa'] ?></td>
						</tr>
						<tr>
							<td>Science</td>
							<td><?php echo $search_result_data['s_m'] ?></td>
							<td><?php echo $search_result_data['s_g'] ?></td>
							<td><?php echo $search_result_data['s_gpa'] ?></td>
						</tr>
						<tr>
							<td>Bangla</td>
							<td><?php echo $search_result_data['ss_m'] ?></td>
							<td><?php echo $search_result_data['ss_g'] ?></td>
							<td><?php echo $search_result_data['ss_gpa'] ?></td>
						</tr>
						<tr>
							<td>Religion</td>
							<td><?php echo $search_result_data['r_m'] ?></td>
							<td><?php echo $search_result_data['r_g'] ?></td>
							<td><?php echo $search_result_data['r_gpa'] ?></td>
						</tr>
					</table>
				</div>




		</div>
		<div class="w-footer">
			<div class="f-left">
				<p>©2005-2019 Ministry of Education, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<img src="assets/images/tbl_logo.png" alt="">
			</div>
		</div>
	</div>
	<div class="bottom">
		<img src="assets/images/play.png" alt="">
	</div>

	

	
</body>
</html>