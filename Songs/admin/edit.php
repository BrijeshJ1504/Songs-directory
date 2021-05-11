<?php
include('../dbconfig/config.php');
$get_id=$_GET['id'];
$get_data="select * from song where id=$get_id";
$run_query=mysqli_query($con,$get_data);
$row_products=mysqli_fetch_array($run_query);
$id=$row_products['id'];
$song_name=$row_products['song_name'];
$artist=$row_products['artist'];
$album=$row_products['album'];
$yor=$row_products['yor'];
$duration=$row_products['duration'];
$p_left=$row_products['p_left'];
$keywords=$row_products['keywords'];

?>
<html>
<head>
<title>Songs</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-md-10">
						<form method="POST" action="" class="main-form" enctype="multipart/form-data">
							<table class="table borderless"  align="right" width="90%"   style="position:absolute;left:10%;border:none" >
								<tr class="bg-primary">
									<th style="text-align:center;font-size:30px;">Edit Song Details</th>	
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Song name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="song_name" size="50" value="<?php echo"$song_name";?>" placeholder="Enter Song name" class="entry" required maxlength="20"/></td>
								</tr>	
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><label for="exampleInputImage">Song Image</label></th>
									<td style="position:absolute;left:20%;"><input type="file" name="song_img" id="fileToUpload" required></td>									
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><label for="exampleInputImage">Audio File</label></th>
									<td style="position:absolute;left:20%;"><input type="file" name="audio_file" id="fileToUpload"  required></td>									
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Artist Name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="artist"  value="<?php echo"$artist"?>" placeholder="Artist name" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Album name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="album"  value="<?php echo"$album"?>" placeholder="Album name" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Year of release</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="yor"  value="<?php echo"$yor"?>" placeholder="Year of release" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Song duration</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="duration" value="<?php echo"$duration"?>" placeholder="Song duration(in seconds)" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Padding left</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="p_left" value="<?php echo"$p_left"?>" placeholder="padding left" class="entry" required maxlength="25"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Keywords</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="keyword" value="<?php echo"$keywords"?>" placeholder="Enter keywords" required></td>				
								</tr>
								<tr style="background-color:#ecf0f1;">
									<td style="text-align:center;"><input class="btn btn-primary" type="submit" name="insert" value="Update"><a href="../index.php" class="btn btn-success" style="margin-left:6px;">HOME</a></td>
								</tr>
							</table>		
						</form>
					</div>	
					
</body>
</html>
<?php
	if(isset($_POST['insert']))
	{
		//text variable
		
		$song_name1=$_POST['song_name'];
		$artist_name1=$_POST['artist'];
		$album_name1=$_POST['album'];
		$yor1=$_POST['yor'];
		$duration1=$_POST['duration'];
		$padding_left1=$_POST['p_left'];
		$keyword1=$_POST['keyword'];		
				
		//image variable
		
		$song_img=$_FILES['song_img']['name'];
		
		//temp image name
		
		$temp_name1=$_FILES['song_img']['tmp_name'];
		
		//song variable
		
		$song_audio=$_FILES['audio_file']['name'];
		
		//temp image name
		
		$temp_name2=$_FILES['audio_file']['tmp_name'];
		
		//for uploading into product_images folder
		move_uploaded_file($temp_name1,"../images/$song_img");
		move_uploaded_file($temp_name2,"../song/$song_audio");

		//inserting products
		
		$update_song="update song set song_name='$song_name1',song='$song_audio',images='$song_img',artist=$artist_name1,album=$album_name1,yor=$yor1,duration=$duration1,p_left='$padding_left1',keywords='$keyword1' where id='$get_id'";
		
		
		$query_run=mysqli_query($con,$update_song);
	
		if($query_run)
		{
			echo "<script>alert ('Song updated')</script>";
			echo "<script>window.open('admin.php','_self')</script>";
		}
		else{
			echo "<script>alert ('some error occur')</script>";
		}
	}
	
?>	