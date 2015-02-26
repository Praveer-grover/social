<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
	if(Auth::check())
	{
		$user = Auth::user();
		$shows = ShowController::get_shows();
		$friends = UserController::get_friends();
		$GroupController = new GroupController;
		//$groups = $GroupController->getgroups();
		return View::make('profile',array('user'=>$user,'friends'=>$friends,'shows'=>$shows,'groups'=>''));
	}
	//Send all the current shows running
	return View::make('hello');
});

Route::get('signup',function(){
	return View::make('signup');
});

Route::get('find',function(){
	$users = User::all();
	$user = Auth::user()->id;
	return View::make('search',array('people'=>$users,'user'=>$user));
});

Route::post('add-friend','UserController@add_friend');

Route::post('signup','UserController@signup');

Route::post('login','UserController@login');

Route::post('find','UserController@find');

//Get all the groups show form for create or join, filters for group searching
//Route::get('groups','GroupController@getgroups');

//Create or join a group, add filters to group search
//Route::post('groups','GroupController@post_method');

Route::get('movies','MoviesController@getlist');

Route::get('profile','UserController@get_profile');

Route::get('viewprofile/{name}','UserController@get_other_profile');

Route::get('shows','ShowController@get_shows');
 
//Create, join or delete a show
Route::post('shows','ShowController@post_method');

Route::get("show/{sid}",function($sid){
	//Begin the show with id sid
	//Match the show time with current time, checked if joined or not, then finally load the link of the movie with mid
	$show = Show::find($sid);
	$showtime = $show->start_time;
	$currtime = date("Y-m-d h:i:sa");
	$uid = Auth::user()->id;
	$sjoins = Sjoin::whereRaw("sid = '".$sid."'")->get();
	$join_flag = 0;
	foreach ($sjoins as $sjoin) {
		$uid2 = $sjoin->uid;
		if($uid2 == $uid)
			$join_flag = 1;
	}	
	//if( $join_flag==1 || $currtime==$showtime )
	//{
		$mid = $show->mid;
		$movie = Movie::find($mid);
		$name = $movie->name;
		$link = $movie->link;
		//$link = explode('v=', $link);
		//$link=$link[1];
		//Start the movie
		//echo $link;
		$users = Sjoin::whereRaw("sid='".$sid."'")->get();
		$users_array=array();
		foreach($users as $user){
			$userid = $user->id;
			$user12 = User::find($userid);
			array_push($users_array,$user12);
		}
		return View::make('movie',array('link'=>$link,'users'=>$users_array,'sid'=>$sid,'name'=>$name));
	//}
	//else
	//	return Redirect::to('/');
});

Route::post('chat',function(){
	$uid = Auth::user()->id;
	$sid = Input::get('sid');
	$message = Input::get('message');
	$chat = new Message;
	$chat->uid = $uid;
	$chat->sid = $sid;
	$chat->message = $message;
	$chat->save();
});

Route::post('getchat',function(){
	$sid = Input::get('sid');
	$chat = Message::whereRaw("sid='".$sid."'")->get();
	if(!empty($chat))
	{	
		$chats_array = array();
		foreach($chat as $chat1)
		{
			$uid = $chat1->uid;
			$message = $chat1->message;
			$username = User::find($uid)->username;
			array_push($chats_array,array('user'=>$username,'message'=>$message,'id'=>$chat1->id));
			//$sent = $chat1->sent;
			/*if(!$sent)
			{
				
				$chat12 = Message::find($chat1->id);
				$chat12->sent = 1;
				$chat12->save();
			}
			else
			{

			}*/
		}
		echo json_encode($chats_array);
	}
});

Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('/');
});
//W9y78tJKs7rMXuwq