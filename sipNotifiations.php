<?php
	require "simple_html_dom.php";
	
	// Create DOM from URL or file
	$html = file_get_html('https://www.msde.gov.in/notification.html');

	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('ul.disc li a') as $element){ 
	       echo $element->plaintext .'<br>';
	       echo $element->href .'<br>';
	}
?>