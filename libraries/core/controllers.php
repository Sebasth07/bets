<?php


	Class controllers
	{
		 public function __construct()
		 {
		 	$this->views = new views();
		 	$this->loadModel();
		 }

		

		 public function loadModel()
		 {
		 	//HomeModel
		 	$model = get_class($this)."model";
		 	$routClass = "models/".$model.".php";
		 	if (file_exists($routClass)) {
		 		require_once($routClass);
		 		$this->model = new $model();
		 	}
		 }

	}// End class

?>

