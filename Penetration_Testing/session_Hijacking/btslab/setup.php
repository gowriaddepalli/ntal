<?php include($_SERVER['DOCUMENT_ROOT'].'/btslab/header.php'); ?>
<?php

include($_SERVER['DOCUMENT_ROOT'].'/btslab/config.php');
if(isset($_POST['install']))
{
if($_POST['install']==1)
{
	$con=mysql_connect($db_server,$db_user,$db_password) or die("Connection Failure: ".mysql_error()); //mysql connection

//Database creation
	mysql_query("DROP DATABASE IF EXISTS $db_name") or die("Can't drop database".mysql_error());
	mysql_query("CREATE DATABASE $db_name") or die("creating database fails".mysql_error());
	mysql_select_db($db_name,$con);
//User Table creation
	$sql="Create table users(ID int NOT NULL AUTO_INCREMENT, username varchar(30),email varchar(60), password varchar(40), about varchar(50),privilege varchar(20),avatar TEXT,primary key (id))";
	mysql_query($sql) or die("Failed to create Table".mysql_error());
$hashedpassword=sha1("password");
	mysql_query("INSERT into users(username, password, email,About,avatar, privilege) values ('admin','$hashedpassword','admin@localhost','I am the admin of this page','default.jpg','admin')") or die("Not able to insert values".mysql_error());;

//Posts table creation
mysql_query("create table posts(postid int NOT NULL AUTO_INCREMENT, content TEXT,title varchar(100), user varchar(30), primary key (postid))") or die("Failed to create Posts Table".mysql_error());
mysql_query("INSERT into posts(content,title, user) values ('Feel free to ask any questions about BTS Lab','First Post', 'admin')") or die("Failed to insert post".mysql_error());

	echo "<script>alert('The webApp has been installed successfully')</script> ";
	mysql_close();
}
}

?>


<p>
<form action="setup.php" method="post">
<input type="hidden" value="1" name="install"/>
<input type="submit" value="Setup" name="setup"/>
</form>
</p>

<br/>
Note:<br/><b style="color:red">If a database already exits, it will be dropped </b>

<?php include($_SERVER['DOCUMENT_ROOT'].'/btslab/footer.php'); ?>
