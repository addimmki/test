<?php
	$tipe = $_POST['tipe'];
	$barcode = $_POST['barcode'];
	$other_param = $_POST['other_param'];
	$tgl_status = date('Y-m-d H:i:s');
	$no_container="12345";
	

	$target = "images/"; 
	$target = $target . basename( $_FILES['fileKamera']['name']) ;
 
	if(move_uploaded_file($_FILES['fileKamera']['tmp_name'], $target)) 
	{
		echo $tipe." - Barcode : ".$barcode."\r\nFilename : ".basename( $_FILES['fileKamera']['name']). "\r\nhas been uploaded";
	
	
	
		$db="barrier";
		$server="192.168.1.4";
		$username="barrier";
		$password="barrier";
		$koneksi=mysql_connect($server,$username,$password) or die
		("Tidak dapat terhubung ke mysql");
		
		mysql_select_db($db,$koneksi);
		//$sql = "SELECT * FROM hasil group by id order by position_id ASC";	
		//$query = mysql_query($sql);
		//while($row=mysql_fetch_array($query))
		//{
		mysql_query("insert into hasil values('','$barcode','$no_container','$tgl_status','$other_param','$target')");
		//}	
	
	
	
	} 
	else 
	{
		echo "Sorry, there was a problem uploading your file.";
	}
?>