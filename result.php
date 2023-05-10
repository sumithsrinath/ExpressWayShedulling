<?php
$Busstart=$_POST["start"];
$Busend=$_POST["end"];
 $conn=mysqli_connect("localhost","root","","expressway"); //database connection  
 //hostname, username, password, database name  
  
 //check database connect or not  
 $query="select TicketPrice from rootdetails WHERE StartL='".$Busstart."' AND EndL='".$Busend."' ";  
 $query2="select Distance from rootdetails WHERE StartL='".$Busstart."' AND EndL='".$Busend."' ";
 
 $connect=mysqli_query($conn,$query); 
 $connect2=mysqli_query($conn,$query2);
 
 $query5="select * from bus_details where startl='".$Busstart."' AND endl='".$Busend."' ORDER BY timeSlot ASC ";

 $connect5=mysqli_query($conn,$query5);

 $num=mysqli_num_rows($connect); //check in database any data have or not  
 $num2=mysqli_num_rows($connect2);
 $num4=mysqli_num_rows($connect5);

 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<title>Bus schedule</title>
	<link rel="icon" href="img/icon.ico" type="image/ico">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- bootstrap footer -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="MyBus/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="MyBus/assets/css/bootstrap-theme.min.css">

	<!-- script-->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<style>
		table,
		td,
		th{
			padding:20px;
			align:center;
		}

		@media (max-height: 500px) or (max-width: 1000px) {
    .ctrldisplay {
      display: none;
    }
	</style>
	<link rel="stylesheet" href="styleTable.css">
	
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BUS Shedule</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
      	
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
    </ul>
  </div>
</nav>

	<div id="booking" class="section">
		<!--header-->
	<header >
	<div >	
		<br>
		<br>	
		<!-- <a href="index.html"><img src="img/logo.png" width="50%" height="50%"> </a> -->
	</div>
	</header>
	
	<div class="section-center">
	<div class="container">

		<!-- Title and description -->

		<div class="row">
			<div class="col-md-7 col-md-push-5">
			<div class="form-group">
			<div class="booking-cta">
			
			
			</div>
			</div>
			</div>
			<div class="col-md-7 col-md-push-5">
			<div class="form-group">
			<div class="booking-cta">

			<div class="table-align">

			<table>
					<caption> <h2 align="center" style="font: size 5px; color:#ebecee;"> Bus schedule </h2></caption> 
						<tr>  
							 
							 <th>Depature time</th>  
							 
							 <th>Bus Number</th>
							 <th>Availability</th>
							 
						</tr>    
						
						<?php 
							 if ($num4>0) {  
								  while($data=mysqli_fetch_assoc($connect5)){  
									   echo "  
											<tr>  
											<td>".$data['timeSlot']."</td> 
											<td>".$data['busNumber']."</td>  
											<td>".$data['available']."</td>  
											</tr>  
									   ";  
								  }  
							 }  
						?> 
				</table>
			</div>
				
			</div>
			</div>
			</div>

			<!-- Form -->

			<div class="col-md-4 col-md-pull-7">
				<div class="booking-form">
				<form>
			<!-- route details -->

				<div class="form-group" align="center">
					<span class="form-label" style="font-size: 20px;"> Bus route: <?php echo $Busstart; ?> to <?php echo $Busend; ?> </span> <br>
					<br>
					<span class="form-label"> Date: <?php echo $_POST["date"]; ?></span> <br>
					<br><br>
					<span class="form-label">Ticket price </span>
						<span class="form-control" >
						<?php 
						if (mysqli_num_rows($connect) > 0) {			
							$row = mysqli_fetch_assoc($connect);							
							$value = $row["TicketPrice"];
							echo  $value;
						} else {
							echo "No results found";
						}  
						?> 
						</span>
						<br>

						<span class="form-label">Distance: </span>
						<span class="form-control">
						<?php 
						if (mysqli_num_rows($connect2) > 0) {			
							$row = mysqli_fetch_assoc($connect2);							
							$value = $row["Distance"];
							echo  $value;
						} else {
							echo "No results found";
						}  
						?> 
						</span>
						<br>					
						<br>
						<br>


				<div class="clerButton">
					
					<button style  ="  
					background-color:blue; 
	
					
					color: green;
					padding: 10px 10px;
					text-align: center;
					text-decoration:solid;
					display: inline-block;
					font-size: 20px;
				
					
					width: 200px;
					position: relative;
					margin-left: auto;
					margin-left: auto;"
					type="button"><a href="booking&loginRegistrer/passengerlogin.php"> <p style="color:white;font-size: 20px;">RESERVE NOW</p></a></p>
				</div>



				
							
				</div>		
							
				</form>
					
			</div>
			</div>
		</div>
	</div>
	</div>
	</div>

<!-- footer -->
<div class="ctrldisplay">
<div class="navbar navbar-default navbar-fixed-bottom" role="navigation" style="background: #151414;">
    <div class="container" >     
	<div class="footer">
    	<ul class="social-icon">
      		<li class="social-icon__item"><a class="social-icon__link" href="#"><ion-icon name="logo-facebook"></ion-icon></a>
      		</li>
      		<li class="social-icon__item"><a class="social-icon__link" href="#"><ion-icon name="logo-twitter"></ion-icon></a>
    		</li>
      		<li class="social-icon__item"><a class="social-icon__link" href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
      		</li>
      		<li class="social-icon__item"><a class="social-icon__link" href="#"><ion-icon name="logo-instagram"></ion-icon></a>
      		</li>
    	</ul>
    	<p> Develop and designed by undergraduates of university of Sri Jayawardenepura Sri Lanka </p>   
    	<p>&copy;2023 | All Rights Reserved</p>
  	</div>
	</div>
</div>
</div>
</body>

</html>