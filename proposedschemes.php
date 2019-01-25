<?php
	 require "simple_html_dom.php";

//   Create DOM from URL or file
	 $html = file_get_html('https://www.msde.gov.in/proposed-scheme.html');
	 foreach($html->find('article.content-block p') as $element){
	 		$heading="";
	 		$text=$element->plaintext;
	 		foreach($element->find('strong') as $h){
	 			$heading=$heading." ".$h->plaintext;
	 		} 
	 		if($heading!=""){
	 			echo $heading.'<br>'; 
		 	   	$text=substr_replace($text,"",0,strlen($heading));
		       	echo $text.'<br>';
	 		}
	 }
?>
