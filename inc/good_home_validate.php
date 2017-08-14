<?php

$servername = $_SERVER['SERVER_NAME'];

if($servername=='www.highlands.edu') 
	{  
	
	if (!$_SESSION['username'])
		 {
		header("Location: https://www.highlands.edu/site/connect/login.php?url=https://www.highlands.edu/site/misc/assessment_2/index.php");
		exit(0);
		}
		
	 $username=$_SESSION['username'];
	$access_sql = "SELECT * FROM users where user_username='$username' AND inactive='0'";
	$stmt = $dbh->query($access_sql);
	$row_count = $stmt->rowCount();
	 $row_count;
	
	if (@$row_count <= 0) 
		{
		echo "<div class=\"well\"><h2>You are not authorized to access this page. Click <a href=\"https://www.highlands.edu/site/misc/assessment_2/report.php\">here</a> to access Assessment reports.  Contact the <a href=\"mailto:rt@highlands.edu\">Assessment Team</a> to request additional access</h2></div>";
		exit(0);
		}
	
	}
else 
	{ 
	if(@$_GET['username']) 
			{
			$username = $_GET['username'];
			$sql ="select * from users where user_username = '$username'";
			$users = user::find_by_sql($sql);
			foreach($users as $user)
			$user_id = $user->user_id;
			}

	}


?>