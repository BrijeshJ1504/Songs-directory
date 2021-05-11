<?php
include('../dbconfig/config.php');
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
									<th style="text-align:center;font-size:30px;">Insert Song Details</th>	
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Song name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="song_name" size="50" value="" placeholder="Enter Song name" class="entry" required maxlength="20"/></td>
								</tr>	
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><label for="exampleInputImage">Song Image</label></th>
									<td style="position:absolute;left:20%;"><input type="file" name="song_img" id="fileToUpload"  required></td>									
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><label for="exampleInputImage">Audio File</label></th>
									<td style="position:absolute;left:20%;"><input type="file" name="audio_file" id="fileToUpload"  required></td>									
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Artist Name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="artist"  value="" placeholder="Artist name" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Album name</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="album"  value="" placeholder="Album name" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Year of release</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="yor"  value="" placeholder="Year of release" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Song duration</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="duration" value="" placeholder="Song duration(in seconds)" class="entry" required maxlength="20"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Padding left</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="p_left" value="" placeholder="padding left" class="entry" required maxlength="25"/></td>
								</tr>
								<tr style="background-color:#ecf0f1;">
									<th><span>Keywords</span></th>
									<td style="position:absolute;left:20%;"><input type="text" name="keyword" placeholder="Song keyword" required></td>				
								</tr>
								<tr style="background-color:#ecf0f1;">
									<td style="text-align:center;"><input class="btn btn-success" type="submit" name="insert" value="Add song"></td>
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
		
		$song_name=$_POST['song_name'];
		$artist_name=$_POST['artist'];
		$album_name=$_POST['album'];
		$yor=$_POST['yor'];
		$duration=$_POST['duration'];
		$padding_left=$_POST['p_left'];
		$keyword=$_POST['keyword'];		
		
		//inser artist
		
		$insert_artist="insert into artist(artist_name) value('$artist_name'))";				
		$query_run1=mysqli_query($con,$insert_artist);
		
		$query="select artist_id from artist where artist_name='$artist_name'";
		$run_q=mysqli_query($con,$query);
		$data=mysqli_fetch_assoc($run_q);
		$artist_id=$data['artist_id'];
		
		//inser album
		
		$insert_album="insert into album(album_name) value('$album_name')";				
		$query_run2=mysqli_query($con,$insert_album);
		
		$query1="select album_id from album where album_name='$album_name'";
		$run_q1=mysqli_query($con,$query1);
		$data1=mysqli_fetch_assoc($run_q1);
		$album_id=$data1['album_id'];
		
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
		
		$insert_song="insert into song(song_name,song,images,artist,album,yor,duration,p_left,keywords)
		value('$song_name','$song_audio','$song_img',$artist_id,$album_id,$yor,$duration,'$padding_left','$keyword')";
		
		
		$query_run=mysqli_query($con,$insert_song);
	
		if($query_run)
		{
			echo "<script>alert ('Song inserted')</script>";
			echo "<script>window.open('admin.php','_self')</script>";
		}
		else{
			echo "<script>alert ('some error occur')</script>";
		}
	}
	
?>	