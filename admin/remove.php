<?php
	require_once 'config/config.php';
								
		// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION["username"]) || empty($_SESSION["username"]))
	{
		header("location: index2.php");
	exit;
}
$sql1="delete from course where code=:code";
$stmt1=$pdo1->prepare($sql1);
							$stmt1->bindParam(':code',$param_id,PDO::PARAM_STR);
							$param_id=$_GET["id"];
							
					
?>

<!DOCTYPE html>
<html>
<head>
	<title>Finish-course</title>
	<link rel="stylesheet" type="text/css" href="mainpage_style.css">
	<link href="https://fonts.googleapis.com/css?family=Prompt|Work+Sans|Questrial|IBM+Plex+Sans" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="StarRating.css">
  <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body>
	  <div class="navbar1">
      <ul>
        <li><a href="admin.php">Home</a></li>
       
		<li><a href="addcourse.php">Add Course</a>
          
        </li>
		<li><a href="addadmin.php">Add Admin</a>
          
        </li>
       <li><a href="\Course\logout.php">Log out</a></li>
      </ul>
    </div>

    <div class="container">
    	<div class="heading">
		<?php 		
						if($stmt1->execute())
						{
							$sql="delete from user_course where code=:code ";
							$stmt=$pdo1->prepare($sql);
							$stmt->bindParam(':code',$param_id,PDO::PARAM_STR);
							$param_id=$_GET["id"];
							if($stmt->execute())
							{
						?>
        	<h1>Course is DELETED!!!</h1>
			<?php 
						}
						}
						else
						{
							
			?>
			<h1>Oops...There was a problem...Please Try Again!!!</h1>
						<?php }?>
      	</div>
		
      	<div class="mid" id="yo">
      		<a href="admin.php" id="submit" style="margin-top: 30px;">View More Courses...</a>
			</div>
    </div>
	 
</body>
</html>