<?php
class ShowController extends BaseController{

	static function get_shows(){
		$shows = Show::all();
		//return View::make('all_shows',array('shows'=>$shows));
		return $shows;
	}
	function post_method(){
		if(Input::has('create'))
		{
			$movie_name = Input::get('name');
		$movie_link = Input::get('link');
		$movie = new Movie;
		$movie->link = $movie_link;
		$movie->name = $movie_name;
		$movie->save();
		$mid = $movie->id;
		$uid = Auth::user()->id;//uid of the current logged in user
		$show = new Show;
		$show->uid = $uid;
		$show->mid = $mid;
		$show->name = Input::get('sname');
		$show->start_time = "2014-12-09";
		$show->save();
		$sjoin = new Sjoin;
		$sjoin->sid = $show->id;
		$sjoin->uid = $uid;
		$sjoin->save();
		$invites_id = Input::get('usernames');
		$invites_id = explode(',', $invites_id);
		foreach ($invites_id as $invid) {
			//make all of them join the show
			$uid = User::whereRaw("username='".$invid."'")->get();		
			foreach($uid as $ud)
			$uid = $ud->id;
			$sjoin = new Sjoin;
			$sjoin->sid = $show->id;
			$sjoin->uid = $invid;
			$sjoin->save();
		}
		return Redirect::to('/');
		}
		elseif(Input::has('join')){
			join_show();
		}
		elseif(Input::has('delete')) {
			delete_show();
		}
	}
	function create_show(){


	}

	function get_user_shows(){
		$uid = Auth::user()->id;
		$shows = SJoin::whereRaw("uid='".$uid."'")->get();
		return $shows;
	}

	function join_show(){
		$uid =Auth::user()->id;//current logged in user's id
		$sjoin = new Sjoin;
		$sjoin->uid = $uid;
		$sjoin->sid = Input::get('sid');
		$sjoin->save();
	}

	function delete_show(){
		$sid = Input::get('sid');
		$show = Show::find($sid);
		$show->delete();
	}
	

}
?>