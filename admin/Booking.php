<?php
session_start();
if(!isset($_SESSION['type'])=='admin')
{
  header('location:../../index.php');
}
require 'class/Booking.php'; 
$seek = New Booking(); 
if(isset($_POST['btnUpdate'])) 
{ 
	$seek->updateBooking($_POST['userid'], $_POST['roomid'], $_POST['checkin'], $_POST['checkout'], $_POST['status'], $_GET['eid']);
	echo '<script>alert("Booking updated successfully!")</script>'; 
}
require_once 'class/Booking.php';
$seek = New Booking();
if(isset($_GET['did']))
{
	$seek->deleteBooking($_GET['did']);
	header('location:Booking.php');
	echo '<script>alert("Booking Deleted Successfully!")</script>';
}

if(isset($_GET['eid']))
{
	$selected = $seek->selectSingleBooking($_GET['eid']);
}

$jobseekers= $seek->selectjoinBooking();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cms_css.css" />
    <title>Dashboard</title>
  </head>
  <body>
  
    <div class="container">
      
    <?php include 'header.php'; ?>

<div class="row">
  <?php include 'nav.php'; ?>
          <div class="col-md-9">
          <form method="post">
					<div class="mb-3">
						<input type="text" class="form-control" name="name" placeholder="Name" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['name'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="id" class="form-control" name="email" placeholder="Email" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['email'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="id" class="form-control" name="userid" placeholder="userid" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['userid'];}?>" >
					</div>
					<div class="mb-3">
						<input type="number" class="form-control" name="roomid" placeholder="roomid" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['roomid'];}?>">
					</div> 
                    <div class="mb-3">
						<input type="date" class="form-control" name="checkin" placeholder="checkin" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['checkin'];}?>">
					</div>
					<div class="mb-3">
						<input type="date" class="form-control" name="checkout" placeholder="checkout" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['checkout'];}?>">
					</div>
					<div class="mb-3">
					<div class="mb-3">
            			<select name="status" class="form-select" required>
							<option value="">Select Status</option>
							<option value="processing" <?php if(isset($_GET['eid']) && $selected[0]['status'] == 'processing'){ echo 'selected'; } ?>>Processing</option>
							<option value="booked" <?php if(isset($_GET['eid']) && $selected[0]['status'] == 'booked'){ echo 'selected'; } ?>>Booked</option>
				    		<option value="cancelled" <?php if(isset($_GET['eid']) && $selected[0]['status'] == 'cancelled'){ echo 'selected'; } ?>>Cancelled</option>
					</div>
					<div class="mb-3">
						<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
					</div>
				</form>

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-dark" id="myTable">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Name</th>
                                <th>Email</th>
								<th>userid</th>
								<th>roomid</th>
                                <th>checkin</th>
								<th>checkout</th>
                                <th>status</th>
						        <th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
						foreach($jobseekers as $js)
						{
							echo "<tr>
									<td>".$js['id']."</td>
									<td>".$js['name']."</td>
                                    <td>".$js['email']."</td>
									<td>".$js['userid']."</td>
									<td>".$js['roomid']."</td>
                                    <td>".$js['checkin']."</td>
									<td>".$js['checkout']."</td>
                                    <td>".$js['status']."</td>
									<td><a href='Booking.php?eid=".$js['id']."' class='btn btn-primary'>Edit</a></td>
									<td><a href='Booking.php?did=".$js['id']."' class='btn btn-danger'>Delete</a></td>
								</tr>";
						}
						?>
						</tbody>
					</table>
				</div>
          </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>



  </body>
</html>