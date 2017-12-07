<?php 

class Bootstrap{


	private $controller;
	private $action;
	private $request;

	public function __construct($request){

		$this->request = $request;
		if($this->request['controller'] == ""){
			$this->controller = 'Home';
		}
		else{
			$this->controller = $this->request['controller'];
		}

		if($this->request['action'] == ''){
			$this->action = 'index';
		}
		else{
			$this->action = $this->request['action'];
		}

	}

	public function createController(){

		// Check For Class
		if(class_exists($this->controller)){
			$parrents = class_parents($this->controller);
			// Check For Parents
			if(in_array('Controller', $parrents)){
				// Check For Action
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				}
				else{
					// Method Does not Exist
					echo "<h1>Method ". $this->action ." Does Not Exist</h1>";
					return;
				}
			}
			else{
					// Base Controller Does Not Found
					echo "<h1>Base Controller Does Not Found!</h1>";
					return;
				}
		}
	else{
			// The Controller Does Not Found
			echo "<h1>The Controller ". $this->controller ." Does Not Found!</h1>";
			return;
		}

	}


}