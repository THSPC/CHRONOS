<?php
/* AJAX Data Extraction Module */

if (isset($_POST["request"])) {
	// Connect to Database
	$con = mysql_connect('localhost', 'root', '');
	if (!$con) die('Could not connect: ' . mysql_error());	
	mysql_select_db("chronos", $con);

	// Generate Date
	$date = date("Ymd");
    
	// Extract PresetID
	$sql = mysql_query("SELECT * FROM `schedule` WHERE date = $date");
	while($result = mysql_fetch_array($sql))
		$presetID = $result['presetID'];
		
	switch ($_POST['request']) {
		case "day_type":
			if ($presetID == "") echo "N/A";
			else {
    			$sql = mysql_query("SELECT * FROM `schedulepreset` WHERE id = $presetID");
    			while($result = mysql_fetch_array($sql))
    				echo $result['name'];
			}
			break;
			
		case "period":
		    // Fetch Current Time - Check DST
            if (date("I") == 0) $t = date("H:i:s", strtotime('1 hour'));
            else $t = date("H:i:s");
			
			// $t = $_POST['jikan'];
			$t = "07:50:00";
			
            $sql = mysql_query("SELECT * FROM `schedule_list` WHERE presetID = $presetID ORDER BY `schedule_list`.`order` ASC");
            if ($sql) {
                while ($result = mysql_fetch_array($sql))
                    if ($t >= $result['start_time'] && $t < $result['end_time']) echo $result['name'];
            } else echo "N/A";
		    break;
			
		case "ann_check":
		    $sql = mysql_query("SELECT * FROM 'announcement' WHERE init = 0");
		    while($result = mysql_fetch_array($sql))
				echo $result['name'];
		    break;
	}
	
	// Reset the Request Parameter
	unset($_POST['request']);
}
?>