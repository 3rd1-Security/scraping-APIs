<?php
	require "simple_html_dom.php";
	
	//URL generating
	// echo 'https://www.youtube.com/results?search_query='.$query;
	$html = file_get_html('https://www.entrepreneurmag.co.za/category/advice/success-stories/case-studies/');

	$resp = array();
	$data = array();
	$status = 200;
	$values = array();
	$links = array();
	$headings = array();
	$images = array();
	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('li.left.relative.infinite-post h2') as $element){ 
	       	array_push($headings ,$element->plaintext);
	       }
	foreach($html->find('li.left.relative.infinite-post p') as $element){ 
	       	array_push($values ,$element->plaintext);
	       }
	foreach($html->find('li.left.relative.infinite-post img.mvp-reg-img.lazy.wp-post-image') as $element){ 
	       	array_push($images ,$element->src);
	       }
	foreach($html->find('li.left.relative.infinite-post a') as $element){ 
	       	array_push($links ,$element->href);
	       }
	for($i=0;$i<sizeof($values);$i++) {
		$obj = array("head"=>$headings[$i],"link"=>$links[$i],"text"=>$values[$i],"img"=>$images[$i]);
		array_push($data,$obj);
	}
	$resp['status']=0;
	$resp['data']=$data;
	echo json_encode($resp);
?>