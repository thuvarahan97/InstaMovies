<?php
	class MovieManageRatings{
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
		
		function MoviegetItems($movie_id = null){
			if(isset($movie_id)){
				$query = $this->link->query("SELECT * FROM tbl_movies WHERE movie_id = '$movie_id'");
			}
			else
			{
				$query = $this->link->query("SELECT * FROM tbl_movies");
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
		
		function insertRatings($movie_id,$avg_ratings,$total_ratings,$num_of_ratings,$user_ip_addresses){
			$query = $this->link->query("UPDATE tbl_movies
			SET avg_ratings = '$avg_ratings',
			total_ratings = '$total_ratings',
			num_of_ratings = '$num_of_ratings',
			user_ip_addresses = CONCAT(user_ip_addresses,',$user_ip_addresses') WHERE movie_id = '$movie_id'");

			$rowCount = $query->rowCount();
			return $rowCount;
		}
	}
?>