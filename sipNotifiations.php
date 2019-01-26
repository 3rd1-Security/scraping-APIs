<?php
	require "simple_html_dom.php";
	
	// Create DOM from URL or file
	$html = file_get_html('https://www.msde.gov.in/notification.html');
	$resp = array();
	$data=array();
	$status=200;
	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('ul.disc li a') as $element){
	       $obj=array("topic"=>$element->plaintext,"link"=>'https://www.msde.gov.in'.$element->href);
	       array_push($data,$obj);
	}
	$resp['status']=$status;
	$resp['data']=$data;
	echo json_encode($resp);
?>