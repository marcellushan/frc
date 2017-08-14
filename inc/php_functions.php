<?

function pages($team_id, $team_type, $page_type, $user_id, $IO_count) 
	{
	  if($IO_count) 
  		{
	  		$intended_outcome  = ", intended_outcome";
	  		 $IO_and = " AND assessment.team_id = intended_outcome.team_id AND assessment.intended_outcome_id = intended_outcome.intended_outcome_id";
  		 }
		if($team_type==0) 
			{
				switch($page_type) 
					{
						case "initial_edit":
							   $sql = "select * from assessment, users, slo where slo.team_id = '$team_id' AND assessment.user_id=users.user_id 
							   AND assessment.slo_id= slo.slo_id AND submitted =0 AND assessment_period<>2014";
							 $assess_phase = "Initial Draft ";
							break;
						case "initial_view":
							   $sql = "select * from assessment, users, slo where slo.team_id = '$team_id' AND assessment.user_id=users.user_id AND assessment.slo_id= slo.slo_id AND submitted =1 AND assessment_period<>2014";
							 $assess_phase = "Initial Complete";
							 $phase_page = "initial_view";
							break;
						case "final_new":
							   $sql = "select * from assessment, users, slo where slo.team_id = '$team_id' AND assessment.user_id=users.user_id AND assessment.slo_id= slo.slo_id AND submitted =1 AND completed=0 AND (data_summary is NULL OR data_summary ='') AND assessment_period<>2014";
							 $assess_phase = "Initial Complete";
							 $phase_page = "final_new";
							break;
								case "final_edit":
							   $sql = "select * from assessment, users, slo where slo.team_id = '$team_id' AND assessment.user_id=users.user_id AND assessment.slo_id= slo.slo_id AND submitted =1 AND completed=0 AND data_summary<>'' AND assessment_period<>2014";
							 $assess_phase = "Final Draft";
							 $phase_page = "final_edit";
							break;
						case "final_view":
							   $sql = "select * from assessment, users, slo where slo.team_id = '$team_id' AND assessment.user_id=users.user_id AND assessment.slo_id= slo.slo_id AND submitted =1 AND completed=1 AND assessment_period<>2014";
							 $assess_phase = "Final Complete";
							 $phase_page = "final_view";
							break;
					}
				}
		else 
			{
				switch($page_type) 
						{
							case "initial_edit":
								 $sql = "select * from assessment, users" . @$intended_outcome . " where assessment.team_id = '$team_id' AND 
								 assessment.user_id=users.user_id AND submitted =0 AND assessment_period<>2014 " . @$IO_and;
								 $assess_phase = "Initial Draft ";
								break;
							case "initial_view":
								 $sql = "select * from assessment, users " . @$intended_outcome . " where assessment.team_id = '$team_id' AND 
								 assessment.user_id=users.user_id AND submitted =1 AND assessment_period<>2014 " . @$IO_and;
								 $assess_phase = "Initial Complete";
								 $phase_page = "initial_view";
								break;
							case "final_new":
								 $sql = "select * from assessment, users " . @$intended_outcome . " where assessment.team_id = '$team_id' AND 
								 assessment.user_id=users.user_id AND submitted =1 AND completed=0 AND (data_summary is NULL OR data_summary ='') AND assessment_period<>2014 " . @$IO_and;
								 $assess_phase = "Initial Complete";
								 $phase_page = "final_new";
								break;
									case "final_edit":
								 $sql = "select * from assessment, users" . @$intended_outcome . " where assessment.team_id = '$team_id' AND 
								 assessment.user_id=users.user_id AND submitted =1 AND completed=0 AND data_summary<>'' AND assessment_period<>2014 " . @$IO_and;
								 $assess_phase = "Final Edit";
								 $phase_page = "final_edit";
								break;
							case "final_view":
								 $sql = "select * from assessment, users " . @$intended_outcome . " where assessment.team_id = '$team_id' AND 
								 assessment.user_id=users.user_id AND submitted =1 AND completed=1 AND assessment_period<>2014 " . @$IO_and;
								 $assess_phase = "Final Complete";
								 $phase_page = "final_view";
								break;	
						}
			}
	
			  		// Check for any reassessment records returned 
  		$assess_count=0;
  	$assessments = assessment::find_by_sql($sql);
  	foreach($assessments as $assessment) 
  		{
				++$assess_count;  		
  		}
  	 $assess_count;
  	if($assess_count < '1') 
  		{   
  		    echo "<br>";
    		echo "There are no " . $assess_phase . " assessments";
    		echo "<br>";

 		}
 		
 		else 
 		{	
//Show assessment by type,  if they exist
 			echo "<h3 style='color: #004990;'>" .  $assess_phase . "</h3>";	
 			?>
 			<table>
 				<tr>
 					<td width='900'><h3>Details</h3></td><td><h3>Created By:</h3></td>
 				</tr>
 			<?
  	foreach($assessments as $assessment) 
				{ 	?>
				 				<tr>
					<td><a href='<? echo $page_type ?>.php?id=<? echo $assessment->assessment_id ?>&user_id=<? echo $user_id ?>'><? echo $team_type==0 ? $assessment->slo_text : ($assessment->intended_outcome_id?$assessment->intended_outcome_text:$assessment->expected_outcome);  ?></a></td><td><? echo $assessment->full_name() ?></td>
												</tr><?
					
				}
				?>

				</table>
				<?
		 } 
}	


function send_mail($assessment_id,$user_name, $team_name, $team_type,$servername,$phase) 
{
	
	$to = "assessment-admin@highlands.edu";
		$to = "mhannah@highlands.edu";
$subject = "A GHC Assessment has been submitted by " . $user_name;

$message = "
<html>
<head>
<title>A GHC Assessment has been submitted by " . $user_name . "</title>
</head>
<body>
<h2>A GHC Assessment has been submitted by " . $user_name . "</h2>
<table border='1'>
<tr>
<th width='200'>User</th>
<th width='200'>Team</th>
</tr>
<tr>
<td>" . $user_name . "</td>
<td>" . $team_name . "</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <assessment-admin@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
	}


function locked_mail($assessment_id,$user_name, $email_text, $team_name, $team_type, $team_id, $servername) 
{
	
//$to = $user_name . "@highlands.edu";
$to = "assessment-admin@highlands.edu";
$subject = "There is a problem with a GHC assessment that you submitted";

$message = "
<html>
<head>
<title>There is a problem with a GHC assessment that you submitted </title>
</head>
<body>
<h1>There is a problem with a GHC assessment that you submitted</h1>
<p>
<h2>Issue:</h2>
<h3>" . $email_text . "</h3>
<a href='http://" .$servername . "/assessment_2/Submitted.php?id=" . $assessment_id ."'>Click Here to view Assessment</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <assessment-admin@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
	}
	
	
	function user_mail($user_name, $email_text, $servername) 
{
	
//$to = $user_name . "@highlands.edu , mhannah@highlands.edu";
$to = "mhannah@highlands.edu";
//$to = "assessment-admin@highlands.edu";
$subject = "There is a problem with a GHC assessment that you submitted";

$message = "
<html>
<head>
<title>There is a problem with a GHC assessment that you submitted </title>
</head>
<body>
<h1>There is a problem with a GHC assessment that you submitted</h1>
<p>
<h2>Issue:</h2>
<h3>" . $email_text . "</h3>
<a href='http://" .$servername . "/assessment?username=" . $user_name . "'>Click Here return to Assessment</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <assessment-admin@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
echo $user_name;
mail($to,$subject,$message,$headers);
	}
?>
