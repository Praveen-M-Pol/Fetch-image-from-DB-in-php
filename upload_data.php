<?php
	$link = mysqli_connect('localhost', 'root', '', 'knockknock');
	if(!$link) echo "Error".mysqli_connect_error();
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	if (file_exists($target_file)) {
		echo "file already exists";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
   		echo "Sorry, your image was not uploaded.";
	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	$fileToUpload = 'images/'.$_FILES["fileToUpload"]["name"];
        	$query = mysqli_query($link, "insert into fetch_images (name, image_path) values ('e', '$fileToUpload')");
			if(!$query) echo "Error".mysqli_error($link);
			else echo "Image uploaded successfully";
    	} else {
        	echo "Sorry, there was an error uploading your image.";
    	}
	}



?>