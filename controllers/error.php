<?php

 	Class errors extends controllers{

 		public function __construct()
 		{
 			parent:: __construct();
 		}

 		public function notFound()
 		{
 			$this->views->getView($this,"error");
 		}
 	}/// End Class Home

 	$notFound = new Errors();
 	$notFound->notFound();
?>