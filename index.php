<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">

<!-- jQuery library -->
<script src="js/jquery-3.6.0.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>

<center>
<div class="container-fluid">
	<form name="testpixel" method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
	<div class="form-group">
	  <label>Set-Back Temperature</label><br>
	  <input type="int" name="px_set_point" value=""><br>

	  <label>Set-Point Temperature</label><br>
	  <input type="int" name="px_set_back" value=""><br>

	  <label>Set High-Temperature</label><br>
	  <input type="int" name="px_high_temp" value=""><br>

	  <label>API Tokenizer</label><br>
	  <input type="text" name="api_key_value" value="abc123"><br>

	  <label>API Tokenizer</label><br>
	  <input type="int" name="px_status" value=""><br>

	  <br>
	  <button type="submit" name="button" class="btn btn-primary">Submit</button>
	 </div>
	</form>
</div>
</center>


<center>
<?php

$myObj = new stdClass();

if (isset($_POST['button']))
{
	$px_set_point = $_POST['px_set_point'];
	$px_set_back = $_POST['px_set_back'];
	$px_high_temp = $_POST['px_high_temp'];
	$api_key_value = $_POST['api_key_value'];
	$px_status = $_POST['px_status'];

	$myObj->px_set_point = $px_set_point;
	$myObj->px_set_back = $px_set_back;
	$myObj->px_high_temp = $px_high_temp;
	$myObj->px_status = $px_status;
	$myObj->api_key_value = $api_key_value;


	$posts = array('px_set_point'=> $px_set_point, 
				   'px_set_back'=> $px_set_back, 
				   'px_high_temp'=> $px_high_temp, 
				   'px_status'=> $px_status, 
				   'api_key_value'=> $api_key_value);

	$fp = fopen('php.json', 'w');
	fwrite($fp, json_encode($posts,JSON_NUMERIC_CHECK));
	fclose($fp);


}
?>

<hr>

<p>Read File I/O Stream = php.json</p>
<?PHP 
$strJsonFileContents = file_get_contents("php.json");
var_dump($strJsonFileContents); // show contents

$myObj = json_decode($strJsonFileContents , false);
echo '<br>';
echo '<br>';
echo 'SET BACK TEMPERATURE : '.$myObj->px_set_point;
echo '<br>';
echo 'SET POINT TEMPERATURE : '.$myObj->px_set_back;
echo '<br>';
echo 'SET HIGH TEMPERATURE : '.$myObj->px_high_temp;
echo '<br>';
echo 'STATUS : '.$myObj->px_status;
echo '<br>';
echo 'API KEY : '.$myObj->api_key_value;
echo '<br>';



?>

<hr>	
USE THIS URL TO RESET : 
<br>
<hr>
http://127.0.0.1:8080/pixeltest_aizat/status.php?px_status=0&api_key_value=abc123
<hr>

<form name="testpixel" method="post" action="index.php">
<button type="submit" name="new" class="btn btn-primary">Check Status</button>
</form>
</center>
