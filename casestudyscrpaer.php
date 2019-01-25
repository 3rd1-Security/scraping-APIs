<?php
	require "simple_html_dom.php";
	
	//URL generating
	// echo 'https://www.youtube.com/results?search_query='.$query;
	$html = file_get_html('https://www.entrepreneurmag.co.za/category/advice/success-stories/case-studies/');

	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('li.left.relative.infinite-post h2') as $element){ 
	       	echo $element->plaintext .'<br>';
	       }
	foreach($html->find('li.left.relative.infinite-post p') as $element){ 
	       	echo $element->plaintext .'<br>';
	       }
	foreach($html->find('li.left.relative.infinite-post img.mvp-reg-img.lazy.wp-post-image') as $element){ 
	       	echo $element->src .'<br>';
	       }
	foreach($html->find('li.left.relative.infinite-post a') as $element){ 
	       	echo $element->href .'<br>';
	       }
?>