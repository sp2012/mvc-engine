<?php



class UserAjax extends BaseAJAX
{

private $var = "var";

private $sup;

public function ajax(/*if you have no arguments in the PHP method, do not pass data in javascript.*/$arg1, $arg2, $arg3, $arg_array, $arg4, $arg5)
{
 


$this->val1 = 'Hi!';

$this->outputAJAX(
/*array()*/

array("sum" => $this->supplementary() . ' ' . $this->var . ' ' .($arg1 + $arg2) . ' ' . $this->val1 . ' ' . 
$this->val2 . ' ' . $arg3 . ' ' . $arg_array[0] . ' ' . $arg_array[1],

"sum2" => "sum!"
)
, 
/*array()*/
array( "inner1" => "<p style=\'border: solid 1;\'>Hi from inner 1." . $arg4 ."</p>",
	   "inner2" => "<p style=\'border: solid 1; border-color: red;\'>Hi from inner 2." . $arg5 . "</p>"

)
,
/*array()*/
'{ "hi": "hello", "hi2": { "name": "george", "surname": "Johnson"} }'

);

}

public function supplementary()
{

$this->sup = 'extra';

return $this->sup;

}

}



