<?php 
class connection
{
	var $con,$db,$query,$result;
	function connect()
	{
		$this->con=mysqli_connect("localhost","root","","workflow");
		//$this->db=mysqli_select_db($this->con,"workflow");
	}
	
	function insert_update_delete($str)
	{
		$this->query=$str;
		mysqli_query($this->con,$this->query);
	}
	
	function select($str)
	{
		$this->query=$str;
		$this->result=mysqli_query($this->con,$this->query);
	}
}
?>
