<?php

	include "../connection.php";



	// ------------- Check if file is not empty ------------
	if(!empty($_FILES)) {
	 try
	  {
		$order_id=@$_REQUEST['id'];
		$service=@$_REQUEST['type'];

		$allowed 				=			 array('png', 'jpg');

		$fileName 				=			$_FILES['file']['name'];

		$source_path 			=			$_FILES['file']['tmp_name'];

		$fileExtension			=			pathinfo($fileName, PATHINFO_EXTENSION);
    // $order_id=5;

		
		$directory='../raw_images/order_'.$order_id;
    if($name=mkdir($directory,true))
		{
			// echo '<script>console.log("true")<script>';
		}
		else {
			// echo '<script>console.log("false")<script>';
		}
		if($service == 1)
		{
		mkdir($directory.'/standard_photos');
		$root_dir=$directory.'/standard_photos';
	  }
		else if($service == 2)
		{
		mkdir($directory.'/floor_plans');
		$root_dir=$directory.'/floor_plans';
   	}
		else if($service == 3)
		{
		mkdir($directory.'/Drone_photos');
			$root_dir=$directory.'/Drone_photos';
	  }
		else {
			mkdir($directory.'/HDR_photos');
				$root_dir=$directory.'/HDR_photos';
		}
		
		$targetFile				=			time()."-".time()."-".strtolower(str_replace(" ","-",$fileName));
	  $target_path =$root_dir."/".$targetFile;
	  
	  
	 
		if(move_uploaded_file($source_path, $target_path)) {
			$sql 			=			"INSERT INTO `img_upload`( `img`, `order_id`, `raw_images`, `finished_images`,`service_id`, `updated_on`) VALUES ('$targetFile',$order_id,1,0,$service,now())";
			$result 		=			mysqli_query($con, $sql);
			mysqli_query($con,"INSERT INTO `image_naming`(`order_id`, `image_name`) VALUES ($order_id,'$targetFile')");
			if($result) {
				echo "File uploaded successfully";
			}
			}
			
		}
		catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
	}
?>
