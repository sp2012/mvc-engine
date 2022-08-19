var MVC_ENGINE_display = function()
{
	if (this.readyState == 4)
	{
	var change = this.responseText;
	var match_object = change.match(/<mvc_engine_ajax[^>]*>(.*?)<\/mvc_engine_ajax>/);
	
	match_object = match_object[1];
	
	var match_object = eval("(" + match_object + ')');
	
	for (var key in match_object) {
   var obj = match_object[key];
   for (var prop in obj) {
   
   
 		// important check that this is objects own property 
		// not from prototype prop inherited
		if(obj.hasOwnProperty(prop)){     
	  //Set fields.
	  if(key == "ids_to_set")
	  {
	  

	  
		document.getElementById(prop).value = obj[prop];
	  
      }   
	  
	  //Set inner html.
	  if(key == "inner_html")
	  {
	  
		document.getElementById(prop).innerHTML = obj[prop];
	  
	  }
	  
	  if(key == "data_object")
	  {
	  
		window.MVC_ENGINE_data_object = obj;
	  
	  }
	  
	}
   }
}
	
	
	
	
	
	
		
	}
}
 


function MVC_ENGINE_do_ajax_work(url_to_post, class_name, method, arguments_in_json_object)
{
 
if(typeof window.collect_pairs_ids_values_loaded != 'undefined') //Run AJAX request only after all id-value pairs are collected.
{ 

//Collect all pairs ids-values


 var idArr = [];

collect_all_id_pairs_object = {};

var trs = document.getElementsByTagName("*"); //Get all tags in the Web page.


for(var i=0;i<trs.length;i++)
{
   idArr.push(trs[i].id);
   
   
   
    if(trs[i].id) // Only if it is not null.
	{
	if(typeof document.getElementById(trs[i].id).value == 'undefined')
		{
			
			
			var trs_value = "";
		}
		else
		{
		 var trs_value = document.getElementById(trs[i].id).value;
		}
		
		collect_all_id_pairs_object[trs[i].id] = trs_value;
	}
}





//Run AJAX request.

	var url = url_to_post; 
	var data = "runAjaxClassMethod=runAjaxClassMethod&class_name=" + class_name + "&method=" + method + "&json=" + JSON.stringify(collect_all_id_pairs_object) + "&json_parameters=" + JSON.stringify(arguments_in_json_object);
	var method = 'POST';
	var async = true;
	doAjax(url, method, async, MVC_ENGINE_display, data);
	
 }
	
}

 
		
//JavaScript function for running function with arguments, or method with arguments.
function MVC_ENGINE_callAJAX(url_to_post, class_name, method, arguments_in_json_object)
{



MVC_ENGINE_do_ajax_work(url_to_post, class_name, method, arguments_in_json_object);



}


function collect_pairs_ids_values_ready()
{

 

window.collect_pairs_ids_values_loaded = true;

}

window.onload = collect_pairs_ids_values_ready;
