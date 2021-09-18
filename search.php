<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css"/>
    <title>Registration Form Details</title>



  </head>
  <body>
      <form action="" method="post">
        <input type="text" placeholder="Search" name="search">
        <button type="submit" name="submit">Search</button>
    </form> 
<section>
<?php


if (isset($_POST['submit'])) {
	 $searchValue = $_POST['search'];
	$con = new mysqli("localhost", "root", "", "form2db");
    if ($con->connect_error) {
        echo "connection Failed: " . $con->connect_error;
    } else {
        $sql = "SELECT * FROM detailsform WHERE AutoID LIKE '%$searchValue%'";

        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
			//print_r($row);
				?>	
	<div class="container">
		<div class="admit-card">
			<div class="BoxA border- padding mar-bot"> 
				<div class="row">
					<div class="col-sm-6">
						<h5>SHRIDHAM WELLNESS FOUNDATION</h5>
						<p> HOME NO – 78, WARD NO -25/3 ,NEAR JAIN TRACTOR MOTI NAGAR SQUARE<br> MOTINAGAR BALAGHAT 481001(M.P) INDIA <br>07632-2444119617559343 , 9752109010, 7247614303​</p>
					</div>
					<div class="col-sm-3 txt-center">
						<img src="http://peoplehelp.in/mewaruni/assets/images/mewaruniversity.jpg" width="100px;" />
					</div>					
					<div class="col-sm-3">
						<h5>Registration Form</h5>
						<p>Date: <?php echo $row['Date']; ?></p>
					</div>
				</div>
			</div>
			<div class="BoxC border- padding mar-bot">
				<div class="row">
					<div class="col-sm-6">
						<h5>Registration No : <?php echo $row['AutoID']; ?></h5>
					</div>
				</div>
			</div>
			<div class="BoxD border- padding mar-bot">
				<div class="row">
					<div class="col-sm-10">
						<table class="table table-bordered">
						  <tbody>
							<tr>
							  <td><b>Name : <?php echo $row['name']; ?></b></td>
							  <td><b>Course: </b> <?php echo $row['course']; ?></td>
							</tr>
							<tr>
							  <td><b>Father/Husband/Guardian Name: </b><?php echo $row['guardian_Name']; ?></td>
							  <td><b>Sex: </b><?php echo $row['gender']; ?></td>
							</tr>
							<tr>
							  <td><b>Nationality: </b><?php echo $row['nationality']; ?></td>
							  <td><b>DOB: </b><?php echo $row['DOB']; ?></td>
							</tr>
							<tr>
							  <td><b>Email: </b><?php echo $row['email']; ?></td>
							  <td><b>Mobile: </b><?php echo $row['mobile']; ?></td>
							</tr>
							<tr>
							  <td colspan="2" style="height: 125px;"><b>Permanent Address: </b><?php echo $row['paddr1']; ?>,<br>
							  <?php echo $row['paddr2']; ?>,<?php echo $row['pcity']; ?>,<?php echo $row['pstate']; ?>,<?php echo $row['pcountry']; ?>-<?php echo $row['ppin']; ?></td>
							</tr>
							<tr>
							  <td colspan="2" style="height: 125px;"><b>Present Address: </b><?php echo $row['taddr1']; ?>,<br>
							  <?php echo $row['taddr2']; echo ","; ?> <?php echo $row['tcity']; echo ","; ?>,<?php echo $row['tstate']; echo ","; ?><?php echo $row['tcountry']; echo ","; ?><?php echo $row['tpin']; ?></td>
							</tr>
							<tr>
							  <td><b>Religion/Caste: </b><?php echo $row['reln']; ?></td>
							  <td><b>Blood Group: </b><?php echo $row['bloodgroup']; ?></td>
							</tr>
							<tr>
							  <td><b>Education: </b><?php echo $row['edu']; ?></td>
							  <td><b>Profession: </b><?php echo $row['occ']; ?></td>
							</tr>
							<tr>
							  <td><b>Course Mode: </b><?php echo $row['cmode']; ?></td>
							  <td><b>Course Medium: </b><?php echo $row['lang']; ?></td>
							</tr>
							<tr>
							  <td><b>Subscription Method: </b><?php echo $row['fee']; ?></td>
							  <td><b>ID Card: </b><?php echo $row['idcard']; ?></td>
							</tr>
							<tr>
							  <td><b>Remarks: </b><?php echo $row['remarks']; ?></td>
							  <td><b>Reading Material: </b><?php echo $row['readings']; ?></td>
							</tr>
						  </tbody>
						</table>
					</div>
					<div class="col-sm-2 txt-center">
						<table class="table table-bordered">
						  <tbody>
							<tr>
							  <th scope="row txt-center"><img src="http://peoplehelp.in/mewaruni/assets/uploads/student_photo/cda1af3d3e81a4b46ef182a5336b778b.jpg" width="123px" height="165px" /></th>
							</tr>
							<!-- <tr>
							  <th scope="row txt-center"><img src="http://peoplehelp.in/mewaruni/images/signature.png" /></th>
							</tr> -->
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			<footer class="txt-center">
				<p>**SHRIDHAM WELLNESS FOUNDATION**</p>
			</footer>
		<?php } //end of while loop
			
			} // end of else
}//end of isset if
			?>
		</div>
	</div>
	
</section>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>