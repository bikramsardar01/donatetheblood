<?php 

	//include header file
	include ('include/header.php');

?>


<div class="container-fluid header-img">
				<div class="row">
					<div class="col-md-6 offset-md-3">

						<div class="header">
							<h1 class="text-center">Donate the blood, save the life</h1>
						<p class="text-center">Donate the blood to help the others.</p>
						</div>


						<h1 class="text-center">Search The Donors</h1>
						<hr class="white-bar text-center">

						<form action="search.php" method="get" class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
							<div class="form-group text-center justify-content-center">
							
								<select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
	<option value="">-- Select --</option><optgroup title="Koshi (Province1)" label="&raquo; Koshi (Province1)"></optgroup><option value="Biratnagar" >Biratnagar</option><option value="Dhankuta" >Dhankuta</option><option value="Ilam" >Ilam</option><option value="Jhapa" >Jhapa</option><option value="Khotang" >Khotang</option><option value="Sunsari" >Sunsari</option><option value="Morang" >Morang</option><option value="Udayapur" >Udayapur</option><optgroup title="Bagmati (Province3)" label="&raquo; Bagmati (Province3)"></optgroup><option value="Kathmandu" >Kathmandu</option><option value="Hetauda" >Hetauda</option><option value="Lalitpur" >Lalitpur</option><option value="Bharatpur" >Bharatpur</option><option value="Bhaktapur" >Bhaktapur</option><option value="Dhulikhel" >Dhulikhel</option><option value="Bidur" >Bidur</option>< value="Manthali" >Manthali</option></select>
							</div>
							<div class="form-group center-aligned">
								<select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">
									
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>

								</select>
							</div>
							<div class="form-group center-aligned">
								<button type="submit" class="btn btn-lg btn-danger">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- header ends -->

			<!-- donate section -->
			<div class="container-fluid red-background">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center"  style="color: white; font-weight: 700;padding: 10px 0 0 0;">Donate The Blood</h1>
						<hr class="white-bar">
						<p class="text-center pera-text">
						Certainly! Donating blood is a selfless act that involves giving a portion of your blood to help save lives and improve the health of patients in need. When you donate blood, it is collected by trained medical professionals and then used for various medical purposes, such as surgeries, trauma care, cancer treatment, and other medical conditions.

						People of all ages and backgrounds can donate blood, and it's a relatively simple and safe process. Donors are usually screened for eligibility to ensure the safety of both the donor and the recipient. After donating, your body regenerates the donated blood over time, and you can typically donate again after a specified period, depending on local regulations.
						</p>
						<a href="#" class="btn btn-default btn-lg text-center center-aligned">Become a Life Saver!</a>
					</div>
				</div>
			</div>
			<!-- end doante section -->
			

			<div class="container">
				<div class="row">
    				<div class="col">
    					<div class="card">
     						<h3 class="text-center red">Our Vission</h3>
								<img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
									We are a group of BCA programmers; our aim is to promote education. As of my last knowledge update in September 2021, "Donate the Blood" could refer to a charitable initiative or organization focused on promoting blood donation for medical purposes. While I don't have specific information on any particular "Donate the Blood".
								</p>
						</div>
    				</div>
    				
    				<div class="col">
    					<div class="card">
      							<h3 class="text-center red">Our Goal</h3>
								<img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
									We are a group of BCA programmers; our aim is to promote education.The primary goal of blood donation is to save lives and improve the health of patients in need. By voluntarily donating blood, individuals contribute to a crucial and lifesaving process that helps address various medical situations.
								</p>
						</div>
    				</div>
    			
    				<div class="col">
    					<div class="card">
      						<h3 class="text-center red">Our Mission</h3>
								<img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
								The mission of "Donate the Blood" is to ensure a steady and reliable supply of safe and high-quality blood donations to meet the medical needs of patients in need. This organization aims to raise awareness about the importance of voluntary blood donation and to encourage individuals to become regular donors.
								</p>
							</div>
   			 		</div>
 			</div>
 		</div>

			<!-- end aboutus section -->


<?php
//include footer file
include ('include/footer.php');
 ?>