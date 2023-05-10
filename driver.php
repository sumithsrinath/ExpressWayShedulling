
<?php
 $conn=mysqli_connect("localhost","root","","expressway"); 
 $name = $_POST['ownernameOrpassword'];
 $q = "select * from bus_details where ownerName='".$name."' or email ='".$name."'";

 
 $connect=mysqli_query($conn,$q); 
 $data = mysqli_fetch_assoc($connect);

 $startl = $data['startl'];
 $endl = $data['endl'];

 $q2 = "select origin_id from origin";
 $q3 = "select dest_id from destination where dest_destination ='".$endl."'";



 $connect1=mysqli_query($conn,$q2); 
 $connect2=mysqli_query($conn,$q3); 
 $data2 = mysqli_fetch_assoc($connect1);
 $data3 = mysqli_fetch_assoc($connect2);

 $startl_id = $data2['origin_id'];
 $endl_id = $data3['dest_id'];
 $q4 = "select * from booked where origin_id='".$startl_id."' and dest_id ='".$endl_id."'";


 $connect4 =mysqli_query($conn,$q4); 
 $BooKData = mysqli_fetch_assoc($connect4);
 
 $connect3=mysqli_query($conn,$q4); 
 $date = $BooKData['book_departure'];//err
 $count = mysqli_num_rows($connect3);


 $bname = $BooKData['book_by'];//err

 $q5 = "select * from Booked where book_by='".$bname."'";
 $connect5 =mysqli_query($conn,$q5); 

 $count2 = mysqli_num_rows($connect5);


 $num4=mysqli_num_rows($connect4);

 
 




?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Driver Dashboard</title>
    <link rel="icon" href="img/icon.ico" type="image/ico">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" type="text/css" href="css/driverstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

	

</head>
<body>
	<header>
        <a class="logo" href="index.html"> <i class="fas fa-home"></i></a>
		Driver Dashboard
		<div class="user-name">Logged in as <?php 
						echo $data['ownerName'];						
						
						?> 
			<div class="Logout">
				<button onclick="logout()">Logout</button>
			</div>
        </div>
		
       
	</header>

	<div class="card">
		<h2>Bookings Total:</h2>
        <h3><?php echo $count; ?></h3>
		<button onclick="showDetails()">View Details</button>
	</div>
	<div class="card">
		<Form action="datapass.php" method="post">
		<h2>Available:</h2>
		
		<input type="radio" name="available" value="yes" id="y">
		<label for="color-red">YES</label>
		<br>
		<input type="radio" name="available" value="no" id="n">
		<label for="color-green">NO</label>
		<br>

		
		<button onclick="display()">Submit</button>
</form>
	</div>

	<!-- Modal for displaying booking details -->
	<div id="myModal" class="modal">
	  <div class="modal-content">
	    <span class="close" onclick="closeDetails()">&times;</span>
	    <h2>Booking Details </h2>
	    <p>Booking Date: <?php echo $date; ?></p>
	    <p>Number of Persons: <?php echo $count; ?></p>
	    <p> </p>

        <table border="1">
					<caption> <h2 align="center" style="font: size 5px; color:#ebecee;"> Passenger Details  </h2></caption> 
						<tr>  
							 
							 <th>Name</th>  							 
							 <th>Contact Number</th>
							 <th>Date</th>
							 
						</tr>    
						
						<?php 
							 if ($num4>0) {  
								  while($data=mysqli_fetch_assoc($connect4)){  
									   echo "  
											<tr>  
											<td>".$data['book_name']."</td> 
											<td>".$data['book_contact']."</td>  
											<td>".$data['book_departure']."</td>
											</tr>  
									   ";  
								  }  
							 }  
						?> 
				</table>

	  </div>
	</div>

	<script type="text/javascript" src="booking-dashboard.js"></script>

</body>
</html>
