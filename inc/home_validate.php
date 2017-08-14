<?php
session_start();
$servername = $_SERVER['SERVER_NAME'];
if($_GET['username'])
	{
		$_SESSION['username'] = $_GET['username'];
	}
if($servername=='forms.highlands.edu') 
	{  
	
	if (!$_SESSION['username'])
		 {
		header("Location: https://www.highlands.edu/site/connect/login.php?url=https://www.highlands.edu/site/misc/assessment_2/holder.php");
		exit(0);
		}
		
	 $username=$_SESSION['username'];
	$sql = "SELECT * FROM user where user_username='$username' AND inactive='0'";
	$users = user::find_by_sql($sql);
        echo $row_count = count($users);
	
	if (@$row_count <= 0) 
		{
		echo "<div class=\"well\"><h2>You are not authorized to access this page. Click <a href=\"https://www.highlands.edu/site/misc/assessment_2/report.php\">here</a> to access Assessment reports.  Contact the <a href=\"mailto:rt@highlands.edu\">Assessment Team</a> to request additional access</h2></div>";
		exit(0);
		}
	
	}


	if(@$_GET['username']) 
			{
			$username = $_GET['username'];
			$sql ="select * from user where user_username = '$username'";
			$users = user::find_by_sql($sql);
			foreach($users as $user)
			$user_id = $user->user_id;
			}

	


?>
