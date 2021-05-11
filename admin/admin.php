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

<style>
th,td,h1{
	text-align:center;
}
table{
	border:1px solid black;
}


</style>
</head>
<body>
<h1>All Songs</h1>
<hr>
<table class="table table-bordered">
<thead>
	<tr class="bg-primary">
		<th>Id</th>
		<th>Song Image</th>
		<th>Song Name</th>
		<th>Song File</th>
		<th>Artists</th>																		
		<th>Album</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
</thead>
<?php
						$get_data="select * from song";
						$run_query=mysqli_query($con,$get_data);
						$count=mysqli_num_rows($run_query);
						if($count>0)
						{
							while($row_products=mysqli_fetch_array($run_query))
							{	
								$id=$row_products['id'];
								$song_image=$row_products['images'];
								$song_name=$row_products['song_name'];
								$artist=$row_products['artist'];
								$album=$row_products['album'];
								$song=$row_products['song'];
									$query="select artist_name from artist where artist_id='$artist'";
									$run_q=mysqli_query($con,$query);
									$data=mysqli_fetch_assoc($run_q);
									$artist_name=$data['artist_name'];
									
									$query1="select album_name from album where album_id='$album'";
									$run_q1=mysqli_query($con,$query1);
									$data1=mysqli_fetch_assoc($run_q1);
									$album_name=$data1['album_name'];
								echo "
								<tr style='background-color:#ecf0f1;'>
									<td style='padding-top:50;'>$id</td>
									<td><img src='../images/$song_image' height='100px' width='100px'></td>
									<td style='padding-top:50;'>$song_name</td>
									<td style='padding-top:50;'>$song</td>
									<td style='padding-top:50;'>$artist_name</td>
									<td style='padding-top:50;'>$album_name</td>
									<td style='padding-top:50;'><a href='edit.php?id=$id'>Edit</a></td>
									<td style='padding-top:50;'><a href='admin.php?delete=$id'>Delete</a></td>
								</tr>
								";
							}
						}
						
?>
</table>
<div class="row">
<a href="add_song.php"><button class="btn btn-primary" style="margin-left:600px;">ADD SONG</button></a>
<a href="../index.php"><button class="btn btn-success" style="margin-left:6px;">HOME</button></a>
</div>
<br><br>
</body>
</html>
<?php
if(isset($_GET['delete'])){
	$pro_id=$_GET['delete'];
	$query="delete from song where id='$pro_id'";
	$run=mysqli_query($con,$query);
	echo "<script>alert ('Song deleted')</script>";
	echo "<script>window.open('admin.php','_self')</script>";
}

?>