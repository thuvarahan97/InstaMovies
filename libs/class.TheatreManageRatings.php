<?php
	class TheatreManageRatings{
		protected $link;
		protected $db_host = 'localhost';
		protected $db_name = 'instamovies';
		protected $db_user = 'root';
		protected $db_pass = '';

		function __construct(){
			try{
				$this->link = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
				return $this->link;
			}
			catch(PDOException $e)
			{
				return $e->getMessage;
			}
		}
		
		function TheatregetItems($theatre_id = null){
			if(isset($theatre_id)){
				$query = $this->link->query("SELECT * FROM tbl_theatres WHERE theatre_id = '$theatre_id'");
			}
			else
			{
				$query = $this->link->query("SELECT * FROM tbl_theatres");
			}
			$rowCount = $query->rowCount();
			if($rowCount >= 1)
			{
				$result = $query->fetchAll();
			}
			else
			{
				$result = 0;
			}
			return $result;
		}
		
		function insertRatings($theatre_id,$avg_ratings,$total_ratings,$num_of_ratings,$user_ip_addresses){
			$query = $this->link->query("UPDATE tbl_theatres
			SET avg_ratings = '$avg_ratings',
			total_ratings = '$total_ratings',
			num_of_ratings = '$num_of_ratings',
			user_ip_addresses = CONCAT(user_ip_addresses,',$user_ip_addresses') WHERE theatre_id = '$theatre_id'");

			$rowCount = $query->rowCount();
			return $rowCount;
		}
	}
?>