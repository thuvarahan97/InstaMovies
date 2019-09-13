<?php

	$response['success'] = false;
	$response['error'] = false;

	include_once( 'ip.php' );
	include_once( 'class.MovieManageRatings.php' );
	$init = new MovieManageRatings;
	if($_POST)
	{
		$movie_id = $_POST['idBox'];
		$rate = $_POST['rate'];
	}
	$user_ip_addresses = GetUserIP();
	$existingData = $init->MoviegetItems($movie_id);
	
	foreach($existingData as $data)
	{
		$old_total_rating = $data['total_ratings'];
		$num_of_ratings = $data['num_of_ratings'];
	}
	$current_rating = $old_total_rating + $rate;
	$new_total_rates = $num_of_ratings + 1;
	$new_rating = $current_rating / $new_total_rates;
	
	$insert = $init->insertRatings($movie_id,$new_rating,$current_rating,$new_total_rates,$user_ip_addresses);
	
	if($insert == 1)
	{
		$response['success'] = 'Success';
	}
	else
	{
		$response['error'] = 'Error';
	}
	echo json_encode($response);
?>