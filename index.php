<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-datepicker.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php 
				$profile =scandir("upload");
				print_r($profile);
				 ?>
				<img src="upload/<?php echo($profile[2]) ?>">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="profile" required >
					<button type="submit" class="btn btn-primary">
						Add Profile
					</button>
					
				</form>
				<form action="calculate.php" method="post">
				  <div class="form-group">
				    <label for="Break Fast">Break Fast</label>
				    <input type="number" class="form-control" id="breakfast" aria-describedby="emailHelp" name="breakfast" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="Bus Fees">Bus Fees</label>
				    <input type="number" class="form-control" id="busfees" name="busfees" required>
				  </div>
				  <div class="form-group">
				    <label for="Donation">Donation</label>
				    <input type="number" class="form-control" id="donation" name="donation" required>
				  </div>
				  <div class="form-group">
				    <label for="Lunch">Lunch</label>
				    <input type="number" class="form-control" id="lunch" name="lunch" required>
				  </div>
				  <div class="form-group">
				    <label for="General Use">General Use</label>
				    <input type="number" class="form-control" id="generaluse"  name="generaluse" required>
				  </div>
				  <div class="form-group">
				    <label for="General Use">Date</label>
				    <input type="text" class="form-control" id="date"  name="date" required>
				  </div>
				  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
				</form>
			</div>
			<div class="col-md-6">
				<div class="result">
					<h3>Today Spent</h3>
				<!-- <?php	if(isset($_SESSION['result'])):?>
				<table class="table-hover table-bordered text-centered">
						<tr>
							<th>Today Breakfast</th>
							<th>Today Bus Fees</th>
							<th>Today Donation</th>
							<th>Today Luch</th>
							<th>Today General Use</th>
							<th>Today Total Spent</th>
							<tr>
								<td>
									<?php 
									echo$_SESSION['result'][0];
									 ?>
								</td>
								<td>
									<?php echo$_SESSION['result'][1];?>
								</td>
								<td>
									<?php echo$_SESSION['result'][2]; ?>

								</td>
								<td>
									<?php echo$_SESSION['result'][3]; ?>
								</td>
								<td>
									<?php echo$_SESSION['result'][4]; ?>
								</td>
								<td>
									<?php echo$_SESSION['result'][5]; ?>
								</td>
							</tr>
							
						</tr>
					</table>
					<?php 
					session_destroy();
						endif; ?>
				-->
				<?php 
					include("config/database.php");
					$result = mysqli_query($con,"SELECT * FROM dailyusage");
					$row = mysqli_fetch_assoc($result);
				?>
					<table class="table-hover table-bordered text-centered">
						<tr>
							<th>Today Breakfast</th>
							<th>Today Bus Fees</th>
							<th>Today Donation</th>
							<th>Today Luch</th>
							<th>Today General Use</th>
							<th>Today Total Spent</th>
						</tr>
							<?php while($row = mysqli_fetch_assoc($result)):?>
								<tr>
									<td><?php echo $row['breakfast']?></td>
									<td><?php echo $row['busfees']?></td>
									<td><?php echo $row['donation']?></td>
									<td><?php echo $row['lunch']?></td>
									<td><?php echo $row['generaluse']?></td>
									<td><?php echo $row['total']?></td>
								</tr>
							<?php endwhile;?>
					</table>
 			</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#submit").click(function(){
				var breakfast = $("#breakfast").val();
				var  busfees= $("#busfees").val();
				var  donation= $("#donation").val();
				var lunch= $("#lunch").val();
				var  generaluse= $("#generaluse").val();

				if (breakfast < 0 || busfees < 0 || donation < 0 || lunch < 0 || generaluse < 0) {
					alert( "Please Try with Valid Values")
				}
			});
			$("#date").datepicker({autoclose:true,format:'dd-mm-yy',todayHighLight:true});
			});
	
	</script>

</body>
</html>