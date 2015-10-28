<?php

class Example
{
	public function action()
	{
		echo "Hello!";
	}

	public function run($action){
		if(method_exists($this, $action)){
			$this->$action();
		}else{
			echo "Error!";
		}
	}
}
?>