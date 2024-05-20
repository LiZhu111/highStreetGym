<?php 
function getClassDetails($day, $time){
	include('../model/connection.php');

	// Query to select class details
	$sql = "SELECT * FROM class_detail WHERE weekday = '$day' AND time = '$time'";
	$result = $conn->query($sql);

	// Check if a class is found
	if ($result->num_rows > 0) {
		// Fetch the class details
        $row = $result->fetch_assoc();

        // Check if stock are not zero
        if ($row['class_stock'] > 0) {
            // Return an array with class title and trainer's name
            //return array(
            //    'classname' => $row['classname'],
            //    'trainername' => $row['trainername'],
			//	'level' => $row['level'],
			//	'duration' => $row['duration']
            //);
		    return [$row['classname'], $row['trainername'], $row['level'], $row['duration']];
        } else {
            // Classes or stock are zero
            return "";
        }
    } else {
        // No class found at the specified time
        return "";
    }
  }

  function build_timetable(){
	include('../model/connection.php');

	$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$timeOfDay = array('10:00','14:00','16:00','18:00','20:00');

	$calendar = "<table>";
	$calendar .= "<thead>";
	$calendar .= "<tr>";
	$calendar .= "<th></th>";

	foreach($daysOfWeek as $day){
		$calendar .= "<th>$day</th>";
	}
	$calendar .= "</tr>";
	$calendar .= "</thead>";

	$calendar .= "<tbody>";
	foreach($timeOfDay as $time){
		$calendar .= "<tr>";
		$calendar .= "<td class='workout-time'>$time</td>";
		foreach($daysOfWeek as $day){
			$classDetails = getClassDetails($day, $time);
			if (is_array($classDetails)) {
				$calendar .= "<td class='hover-bg ts-item'>";
				$calendar .= "<h3>$classDetails[0]</h3>";
		        $calendar .= "<div>$classDetails[3] mins</div>";
			    $calendar .= "<div>$classDetails[2]</div>";
		        $calendar .= "<div class='trainer-name'>$classDetails[1]</div>";
			    $calendar .= "</div>";
			    $calendar .= "</td>";
			} else {
				$calendar .= "<td></td>";
			};
			
		}
		$calendar .= "</tr>";
	}
	$calendar .= "</tbody>";

    $calendar .= "</table>";

	echo $calendar;
  }

  ?>