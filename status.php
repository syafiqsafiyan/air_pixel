<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">

<!-- jQuery library -->
<script src="js/jquery-3.6.0.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>

<center>

<?PHP 

// URL LINK
// http://127.0.0.1:8080/pixeltest_aizat/reset.php?status=ignore

if(isset($_GET['api_key_value']) == 'abc123')
{

	$strJsonFileContents = file_get_contents("php.json");
	$myObj = json_decode($strJsonFileContents , false);

	echo '<hr>';
	echo 'Current Status';
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
	echo '<br>';


	if ($myObj->px_status == 0)
	{
		$NewStatus = 1;
	}
	else
	{
		$NewStatus = 0;
	}

	$posts = array('px_set_point'=> $myObj->px_set_point, 
				   'px_set_back'=> $myObj->px_set_back, 
				   'px_high_temp'=> $myObj->px_high_temp, 
				   'px_status'=> $NewStatus, 
				   'api_key_value'=> $myObj->api_key_value);

	$fp = fopen('php.json', 'w');
	fwrite($fp, json_encode($posts,JSON_NUMERIC_CHECK));
	fclose($fp);



	$curentjson = file_get_contents("php.json");
	$myObjcrr = json_decode($curentjson , false);

	echo '<hr>';
	echo 'New Status';
	echo '<br>';
	echo '<br>';
	echo 'SET BACK TEMPERATURE : '.$myObjcrr->px_set_point;
	echo '<br>';
	echo 'SET POINT TEMPERATURE : '.$myObjcrr->px_set_back;
	echo '<br>';
	echo 'SET HIGH TEMPERATURE : '.$myObjcrr->px_high_temp;
	echo '<br>';
	echo 'STATUS : '.$myObjcrr->px_status;
	echo '<br>';
	echo 'API KEY : '.$myObjcrr->api_key_value;
	echo '<br>';
	echo '<br>';
	echo '<hr>';
}
else
{
	echo 'API TOKENIZER NOT RECOGNIZE';
	echo '<a href="status.php">Back To Main Page</a>';
}

?>


<center>



<a href="index.php">Back To Main Page</a>