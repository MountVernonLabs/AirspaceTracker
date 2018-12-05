<?php

	// Config values
	// Center GPS coordinate
	$lat = "38.70777778";    
	$long = "-77.08638889";	
	// Radius to monitor (in km)
	$radius = "0.8046720"; // this is .5 miles from the center
	$min_alt = "1500";  // minimim allowed altitude (in ft)
	
	date_default_timezone_set('America/New_York');
	
	// Testing values
	// $radius = "450"; // uncomment this line if you want to temporarily expand your radius (useful to debug)
	
	// Grab flight data
	$data = file_get_contents("https://public-api.adsbexchange.com/VirtualRadar/AircraftList.json?lat=".$lat."&lng=".$long."&fDstU=".$radius);
	$json = json_decode($data, TRUE);
	
	foreach ($json["acList"] as $flight){
		// Filter flights flying below approved mininum altitude
		if ($flight["Alt"] < $min_alt) {
			
			// Compile important data for reporting violations
			$entry["tail_number"] = $flight["Reg"];
			$entry["call_sign"] = $flight["Call"];
			$entry["altitude"] = $flight["Alt"];
			$entry["lat"] = $flight["Lat"];
			$entry["long"] = $flight["Long"];
			$entry["date_time"] = str_replace(",","",Date("r"));
			$entry["operator"] = str_replace(",","",$flight["Op"]);
			$entry["aircraft"] = str_replace(",","",$flight["Mdl"]);
			
			// Append data to log file
			$log = file_put_contents('log.csv', implode(",",$entry).PHP_EOL , FILE_APPEND | LOCK_EX);
			echo "".$flight["Call"]." operated by ".$flight["Op"]." is flying over at ".$flight["Alt"]."ft!\n";
		}
	}
?>