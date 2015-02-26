<?php

	class MoviesController extends BaseController{

		function getlist(){
			$movies = Movie::all();

			//Show all the movies in a list format with option to create a show along with them.
			return View::make('movies',array("movies"=>$movies));
		}
		
	}

?>