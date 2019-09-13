<?php

	$response['success'] = false;
	$response['error'] = false;

	include_once( 'ip.php' );
	include_once( 'class.TheatreManageRatings.php' );
	$init = new TheatreManageRatings;
	if($_POST)
	{
		$theatre_id = $_POST['idBox'];
		$rate = $_POST['rate'];
	}
	$ip_address = GetUserIP();
	$existingData = $init->TheatregetItems($theatre_id);
	
	foreach($existingData as $data)
	{
		$old_total_rating = $data['total_ratings'];
		$total_rates = $data['num_of_ratings'];
	}
	$current_rating = $old_total_rating + $rate;
	$new_total_rates = $total_rates + 1;
	$new_rating = $current_rating / $new_total_rates;
	
	$insert = $init->insertRatings($theatre_id,$new_rating,$current_rating,$new_total_rates,$ip_address);
	
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