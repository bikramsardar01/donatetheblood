<?php
session_start();
if (!isset($_SESSION['type']) == 'admin') {
	header('location:../../index.php');
}
require 'class/donor.php';
$dnr = new Donor();
if (isset($_POST['btnAdd'])) {
	$dnr->setValue(
		$_POST['name'],
		$_POST['gender'],
		$_POST['email'],
		$_POST['city'],
		$_POST['dob'],
		$_POST['contact_no'],
		$_POST['save_life_date'],
		$_POST['password'],
		$_POST['blood_group'],
		$_POST['type'],
		$_POST['status']
	);
	if ($dnr->registerDonor()) {
		echo '<script> alert("Registered successfully")</script>';
	}
}


if (isset($_POST['btnUpdate'])) {
	$dnr->updateDonor(
		$_POST['name'],
		$_POST['gender'],
		$_POST['email'],
		$_POST['city'],
		$_POST['dob'],
		$_POST['contact_no'],
		$_POST['save_life_date'],
		$_POST['password'],
		$_POST['blood_group'],
		$_POST['type'],
		$_POST['status'],
		$_GET['eid']
	);
	echo '<script>alert("User updated successfully!")</script>';
}
require_once 'class/Donor.php';
$seek = new Donor();
if (isset($_GET['did'])) {
	if ($seek->deleteDonor($_GET['did'])) {
		echo '<script>alert("User Deleted Successfully!")</script>';
	}
}

if (isset($_GET['eid'])) {
	$selected = $seek->selectSingleDonor($_GET['eid']);
}

$data = $seek->selectDonor();
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
						<input type="text" class="form-control" name="name" placeholder="Name" required value="<?php if (isset($_GET['eid'])) {
																													echo $selected[0]['name'];
																												} ?>">
					</div>
					<div class="mb-3">
						<select name="gender" class="form-select" required>
							<option value="">Select type</option>
							<option value="male" <?php if (isset($_GET['eid']) && $selected[0]['gender'] == 'male') {
														echo 'selected';
													} ?>>Male</option>
							<option value="female" <?php if (isset($_GET['eid']) && $selected[0]['gender'] == 'female') {
														echo 'selected';
													} ?>>Female</option>
							<option value="other" <?php if (isset($_GET['eid']) && $selected[0]['gender'] == 'other') {
														echo 'selected';
													} ?>>Other</option>
						</select>
					</div>
					<div class="mb-3">
						<input type="email" class="form-control" name="email" placeholder="Email" required value="<?php if (isset($_GET['eid'])) {
																														echo $selected[0]['email'];
																													} ?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="city" placeholder="City" required value="<?php if (isset($_GET['eid'])) {
																													echo $selected[0]['city'];
																												} ?>">
					</div>
					<div class="mb-3">
						<input type="date" class="form-control" name="dob" placeholder="date of birth" required value="<?php if (isset($_GET['eid'])) {
																															echo $selected[0]['dob'];
																														} ?>">
					</div>
					<div class="mb-3">
						<input type="number" class="form-control" name="contact_no" placeholder="Contact_no" required value="<?php if (isset($_GET['eid'])) {
																																	echo $selected[0]['contact_no'];
																																} ?>">
					</div>
					<div class="mb-3">
						<input type="date" class="form-control" name="save_life_date" placeholder="save life date" required value="<?php if (isset($_GET['eid'])) {
																																		echo $selected[0]['save_life_date'];
																																	} ?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="password" placeholder="Password" required value="<?php if (isset($_GET['eid'])) {
																															echo $selected[0]['password'];
																														} ?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="blood_group" placeholder="blood group" required value="<?php if (isset($_GET['eid'])) {
																																	echo $selected[0]['blood_group'];
																																} ?>">
					</div>

					<div class="mb-3">
						<select name="type" class="form-control">
							<option selected disabled>select</option>
							<option value="user" <?php if (isset($_GET['eid']) && $selected[0]['type'] == 'user') {
														echo 'selected';
													} ?>>User</option>
							<option value="admin" <?php if (isset($_GET['eid']) && $selected[0]['type'] == 'admin') {
														echo 'selected';
													} ?>>Admin</option>
						</select>
					</div>

					<div class="mb-3">
						<select name="status" class="form-control">
							<option selected disabled>select</option>
							<option value="donated" <?php if (isset($_GET['eid']) && $selected[0]['status'] == 'donated') {
														echo 'selected';
													} ?>>donated</option>
							<option value="pending" <?php if (isset($_GET['eid']) && $selected[0]['status'] == 'pending') {
														echo 'selected';
													} ?>>pending</option>
							<option value="not donated" <?php if (isset($_GET['eid']) && $selected[0]['status'] == 'not donated') {
															echo 'selected';
														} ?>>not donated</option>
						</select>
					</div>

					<div class="mb-3">
						<input type="submit" class="btn btn-primary" name="btnAdd" value="Add">
						<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
					</div>
				</form>

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-dark" id="myTable">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Email</th>
								<th>City</th>
								<th>Dob</th>
								<th>Contact_no</th>
								<th>Save_life_date</th>
								<th>Password</th>
								<th>Blood_group</th>
								<th>Type</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>

						<tbody>
							<?php
							foreach ($data as $js) {
								echo "<tr>
									<td>" . $js['id'] . "</td>
									<td>" . $js['name'] . "</td>
                                    <td>" . $js['gender'] . "</td>
                                    <td>" . $js['email'] . "</td>
                                    <td>" . $js['city'] . "</td>
									<td>" . $js['dob'] . "</td>
									<td>" . $js['contact_no'] . "</td>
									<td>" . $js['save_life_date'] . "</td>
                                    <td>" . $js['password'] . "</td>
                                    <td>" . $js['blood_group'] . "</td>
                                    <td>" . $js['type'] . "</td>
									<td>" . $js['status'] . "</td>
									<td><a href='donor.php?eid=" . $js['id'] . "' class='btn btn-primary'>Edit</a></td>
									<td><a href='donor.php?did=" . $js['id'] . "' class='btn btn-danger' 
										onclick='return confirm(&quot;Are you sure?&quot;)'>Delete</a></td>
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