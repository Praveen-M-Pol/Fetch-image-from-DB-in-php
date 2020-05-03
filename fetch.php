<?php
	$link = mysqli_connect('localhost', 'root', '', 'knockknock');
	if(!$link) echo "Error".mysqli_connect_error();
	else {
		$query = 'select * from fetch_images';
		$result = mysqli_query($link, $query);
		while ($row = mysqli_fetch_array($result)) {
?>
			<img src="<?php echo $row['image_path'] ?>" width="100" height="100" />
<?php 		echo $row['name'].'<br>';
		}
	}

?>
