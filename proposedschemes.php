<?php
	 require "simple_html_dom.php";

	 $html = file_get_html('https://www.msde.gov.in/proposed-scheme.html');
	 $resp = array();
	 $data=array();
	 $status=200;
	 foreach($html->find('article.content-block p') as $element){
	 		$heading="";
	 		$text=$element->plaintext;
	 		foreach($element->find('strong') as $h){
	 			$heading=$heading." ".$h->plaintext;
	 		} 
	 		if($heading!=""){
		 	   	$text=substr_replace($text,"",0,strlen($heading));
	 			$obj=array("head"=>$heading,"text"=>$text); 
		       	array_push($data,$obj);
	 		}
	 }
	 $resp["status"]=$status;
	 $resp["data"]=$data;
	 echo json_encode($resp);		
?>
