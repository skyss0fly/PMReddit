<?php 
namespace skyss0fly\PMReddit;
// Initialize the curl session 
$curl = curl_init();

// Set the API endpoint and parameters 
$url = "https://www.reddit.com/api/v1/"; 
$params = array();

// Set the curl options 
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_POST, true); 
curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 

// Execute the curl session 
$response = curl_exec($curl); 

// Close the curl session 
curl_close($curl);

// Parse the API response 
$response = json_decode($response, true); 

// Print the response 
print_r($response); 
