<?php 

/**
  * 
  */
 class database
 {

 	public $host = 'localhost';
 	public $user = 'blog';
 	public $password ='root';
 	public $name = 'phpblog';

 	public $link;

 	

 	
 	public function __construct()
 	{
 		$this->connect();
 	}

 	private function connect() 
 	{
 		$this->link = new mysqli($this->host,$this->user,$this->password,$this->name);
 		
 		
 	}

 	public function select($query) 
 	{
 		
 		$result = $this->link->query($query);
 		if($result->num_rows>0) 
 		{
 			return $result;
 		}
 		else return false;
 	}
 	

 	public function insert($query) 
 	{
 		$insert = $this->link->query($query);
 		if ($insert) 
 		{header('location:index.php');
 		}
 		else  {echo 'post not inserted';}
 	}
 	public function update($query) 
 	{
 		$update = $this->link->query($query);
 		if($update) 
 		{
 			header('location:index.php?msg=Updated');
 		}
 		else {echo 'not updated';}
 	}
 	public function delete($query) 
 	{
 		$delete = $this->link->query($query);
 		if ($delete) 
 		{
 			header('location:index.php?msg=deleted...');
 		}
 		else echo 'not deleted';
 	}
 } 


 ?>