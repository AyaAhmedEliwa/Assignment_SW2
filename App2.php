<?php

function currency_converter($amount , $from, $to)
{
	$result = file_get_contents('http://www.google.com/ig/calculator?h1=en&q='.$amount.$from.'=?'.$to);
	$expl = explode('"', $result );
	
	print_r($expl);
	/*if($expl[1] =='' || expl[3]==''){
		return false;
	}
	else 
	{
		return array(
		$expl[1],
		$expl[3]
		);
	}*/
	currency_converter(100, 'usd', 'gbp');
}
?>