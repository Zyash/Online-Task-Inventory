<?php 
include_once("../inc/connection.php");
$obj=new connection();
$obj->connect();

$obj->query="select * from cities where state_id=".$_REQUEST["q"];
$obj->select($obj->query);
echo ("<option value='0'>--select city--</option>");
while($row=mysqli_fetch_assoc($obj->result))
{
	echo "<option value=".$row["city_id"].">".$row["city_name"]."</option>";
}
?>