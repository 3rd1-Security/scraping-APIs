<?php
	require "simple_html_dom.php";
	
	// Create DOM from URL or file
	$query = $_POST['query'];
	$i = 0;
	for($i=0;$i<strlen($query);$i++)
	{

		if($query[$i] == ' ')
		{
			$query[$i] = '+';	
		}
	}
	$resp = array();
	$data = array();
	$status = 200;
	//URL generating
	// echo 'https://www.youtube.com/results?search_query='.$query;
	$html = file_get_html('https://www.youtube.com/results?search_query='.$query);

	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('h3 a') as $element){ 
	       if($element->title!="")
	       {
	       	$obj = array("title"=>$element->title,"link"=>"https://www.youtube.com".$element->href);
	       	array_push($data,$obj);
	       }
	}
	$resp['status'] = $status;
	$resp['data'] = $data;
	echo json_encode($resp);	
?>