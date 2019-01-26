<?php
	Require "simple_html_dom.php";
	//Create DOM from URL or file
	$html = file_get_html('http://vikaspedia.in/social-welfare/skill-development/schemes-for-skill-development');
	$resp = array();
	$data = array();
	$status = 200;
	$values = array();
	$links = array();
	$headings = array();
	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('dt span.summary a') as $element){ 
	       array_push($headings	,$element->plaintext);
	       array_push($links ,$element->href);
	}
	foreach($html->find('dd span.description') as $element){ 
	        array_push($values ,$element->plaintext);
	}
	for($i=0;$i<sizeof($values);$i++) {
		$obj = array("head"=>$headings[$i],"link"=>$links[$i],"text"=>$values[$i]); 
		array_push($data,$obj);
	}
	$resp['status']=200;
	$resp['data']=$data;
	echo json_encode($resp);
?>