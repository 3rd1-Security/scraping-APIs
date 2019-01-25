<?php
	
	//Create DOM from URL or file
	$html = file_get_html('http://vikaspedia.in/social-welfare/skill-development/schemes-for-skill-development');

	// Scrape all links and info for notication for and sent a JSON reply
	foreach($html->find('dt span.summary a') as $element){ 
	       echo $element->plaintext .'<br>';
	       echo $element->href .'<br>';
	}
	foreach($html->find('dd span.description') as $element){ 
	       echo $element->plaintext .'<br>';
	}
?>