<?php
	class GroupController extends BaseController{

		function getgroups(){
			$groups = Group::all();
			return $groups;
		}
	}
?>