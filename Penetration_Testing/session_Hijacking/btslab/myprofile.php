<?php 
include($_SERVER['DOCUMENT_ROOT'].'/btslab/lib/loginverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/btslab/header.php'); 

if(isset($_GET['id']))
{
$id=$_GET['id'];
include('mysqlconnection.php');
echo "<br/><br/>";
echo "----------------------</br>";
echo "My Profile:</br>";
echo "----------------------</br>";
$result=mysql_query("select * from users where id='$id'") or die(mysql_error());
if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
echo "UserName : ".$row['username']."<br>";
echo "Email : ".$row['email']."<br>";
echo "About : ".$row['about']."<br>";
}
}
echo "<img src='/btslab/vulnerability/avatar/".$_SESSION['avatar']."' alt='[No Profile Avatar]'/> - <a href='/btslab/vulnerability/Change-Profile-Picture.php'>Change Avatar</a><br/>";
?>
</br></br>
<a href="/btslab/vulnerability/csrf/changeinfo.php"> Change Description about you</a></br></br>
<a href="/btslab/vulnerability/csrf/change-email.php">Change Email ID</a>

<?php include($_SERVER['DOCUMENT_ROOT'].'/btslab/footer.php');  ?>
