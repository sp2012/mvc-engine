<?php

class BaseAJAX
{

public $controls;

/**
* Give class the html id value pairs.
*/
public function __construct()
{

$json_pairs_ids_values = json_decode($_POST['json'], true);

foreach($json_pairs_ids_values as $key => $value)
{

$this->controls[$key] = $value;

}

 


//file_put_contents('test.txt', print_r($json_pairs_ids_values, true));

}



/**
* Get value of item.
* @return value
*/

    function __get($name){
    	 if( isset($this->controls[$name])){

        	return $this->controls[$name];

        }
    }

/**
*Set value to the html control.
* @param string $name
* @param string/number $value
* @return nothing
*/
    function __set($name,$value)    {

       	 $this->controls[$name] = $value;

    }

/**
*Echos AJAX data to the JavaScript in the client.
* @param array with ids to set in the client or an empty array if you don't want to set ids
* @param array with the inner htmls to set or an empty array if you don't want to set inner htmls
* @param a string with the JSON object to echo or an empty array if you don't want to echo a JSON object
* @return echos total json
*/
	public function outputAJAX(array $ids_to_set, array $inner_html, $data_object )
	{

	 
	
	$collect_json .= "<mvc_engine_ajax>" . PHP_EOL;
	
	$collect_json .= "{" . PHP_EOL;
	
	
	if(!empty($ids_to_set))
	{
	
	$collect_json .= '"ids_to_set": {' . PHP_EOL;	
	
		foreach($ids_to_set as $key => $value)
		{
		


			 

				$collect_json_ids .= ' "' . $key . '": ' . '"' . $value . '",';
		
			 

		}
		
		
		$collect_json_ids = substr_replace($collect_json_ids ,"",-1);
		
		$collect_json .= $collect_json_ids . PHP_EOL;
		
		$collect_json .= '},' . PHP_EOL;

			
	
	}
	
	if(!empty($inner_html))
	{
	
		$collect_json .= '"inner_html": {' . PHP_EOL;
		
		foreach($inner_html as $key => $value)
		{

			 
			 

				$collect_json_inner .= ' "' . $key . '": ' . '"' . $value . '",';
		
			 

		}

		$collect_json_inner = substr_replace($collect_json_inner ,"",-1);
		
		$collect_json .= $collect_json_inner . PHP_EOL;
		
		$collect_json .= '},' . PHP_EOL;
		
	}	
		
	if(!empty($data_object))
	{
		
		$collect_json .= '"data_object": ' . $data_object . PHP_EOL;		

	}	
		
		  
		
		$collect_json .= "} " . PHP_EOL;
		
		$collect_json .="</mvc_engine_ajax>" . PHP_EOL;	 
			
	
			
			 
		//PHP_EOL was used to make the string easy to read, but must be removed, so JavaScript can parse it.
		
		$collect_json = str_replace(PHP_EOL, '', $collect_json);
		
		// Echo JSON to javascript. <mvc_engine_ajax> tags are used, because the AJAX request is made to the same page, and using a regex JavaScript
		// cleans the whole html output and keeps only the JSON object.
		
		echo $collect_json;
		 
		
	}

}