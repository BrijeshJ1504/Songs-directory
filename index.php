<?php
include("dbconfig/config.php");
if(isset($_GET['filter']) OR (isset($_GET['yor']) && isset($_GET['min']) && isset($_GET['max']))){
	$yor1=$_GET['yor'];
	$min1=$_GET['min'];
	$max1=$_GET['max'];
	header("?yor=$yor1&min=$min1&max=$max1");
}
if(isset($_GET['search'])){
	$search=$_GET['user_query'];
	header("?search=$search");
}

?>
<html>
<head>
<title>Songs</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
#player{
	width:300;
	margin-left:40px;
	border:1px solid #fff;
	background-color:#fff;
}
</style>
</head>
<body style="background:linear-gradient(45deg,#00BFFF,#fffde7);">
<?php include("header.php");?>
<div class="container-fluid">
<br>
<h1 style="padding-left:45%;">All songs</h1>
<hr>
<h5 style="padding-left:100px;">FILTERS :</h5><br>
<div class="row" style="padding-left:100px;">
	<div class="col-md-3">
		<h5>Year Of Realease:</h5>
	</div>
	<div class="col">
		<form method="get" enctype="multipart/form-data">
			<select id="yor" class="yor" name="yor" style="height:30px;width:70px;border-radius:5;">
				<option value="YOR">YOR</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
			</select>
		
	</div>
</div>
<div class="row" style="padding-left:100px;">
	<div class="col-md-3">
		<h5>Duration:</h5>
	</div>
	<div class="col">
		
			<input type="search" id="min" name="min" placeholder="min" style="height:30px;width:70px;border-radius:5;">
			<input type="search" id="max" name="max" placeholder="max" style="height:30px;width:70px;border-radius:5;">
			<button name="filter" type="submit">Filter</button>
		</form>
	</div>
</div>
<div class="row pt-5" style="padding-left:70px;">
<?php 

if(isset($_GET['yor']) && isset($_GET['min']) && isset($_GET['max'])){
	$yor=$_GET['yor'];
	$min=$_GET['min'];
	$max=$_GET['max'];	
	$get_data="select * from song where yor='$yor' OR duration BETWEEN '$min' AND '$max'";
}
elseif(isset($_GET['user_query'])){
	$user_keyword=$_GET['user_query'];
	$get_data="select * from song where keywords like '%$user_keyword%'";	
}
else{
	$get_data="select * from song";
}
$run_query=mysqli_query($con,$get_data);
$count=mysqli_num_rows($run_query);
if($count>0){
	while($row_data=mysqli_fetch_array($run_query)){
		$song_image=$row_data['images'];
		$song_name=$row_data['song_name'];
		$p_left=$row_data['p_left'];
		$artist=$row_data['artist'];
		$song=$row_data['song'];
			$query="select artist_name from artist where artist_id=$artist";
			$run_q=mysqli_query($con,$query);

			$data=mysqli_fetch_assoc($run_q);
			$artist_name=$data['artist_name'];
				echo"
				<div class='single_product' style='padding-top:50px;padding-left:50px;'>
					<img src='images/$song_image'  height='350' width='300' style='margin-left:40px;cursor:pointer;border-radius:0;'>
					<br>
					<audio id='player' controls>
						<source src='song/$song' width='200px' type='audio/mp3'>
					</audio>
					<p class='text-danger' style='padding-left:$p_left'>$song_name</p>
					<p style='padding-left:110'>Artist: $artist_name</p>
				</div>	
				";
			
	}
}
else{
	echo"
		<h1 style='padding-left:30%;padding-top:50px;'>No song found</h1>
	";
}
?>

</div>
</div>
</body>
</html>

