<?php

class UserController extends BaseController{

	function login(){
		$user = Input::get('username');
		$pass = Input::get('password');

		if(Auth::attempt(array('username'=>$user,'password'=>$pass)))
		{
			//logged in redirect to the correct page
			return Redirect::to('/');
		}
		return Redirect::to('/');
	}

	function signup(){
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');		
		$user->save();
		//Check the login function
		Auth::login($user);
		return Redirect::to('/');
		//redirect where want to
	}
	
	function get_profile(){
		$user = Auth::user();
		$friends = get_friends();
		$ShowController = new ShowController;
		$shows = $ShowController->get_user_shows();
		return View::make('profile',array('user'=>$user,'friends'=>$friends,'shows'=>$shows));
	}
	function get_other_profile($name){
		$user = User::whereRaw('full_name')->get();
		$user = $user[0];
		return View::make('other_profile',array("user"=>$user));
	}
	function find(){
		$username = Input::get('username');
		$users = User::whereRaw("username = '".$username."'")->get();
		return View::make('search',array('people'=>$users));
	}

	function add_friend(){
		$uid2 = Input::get('uid2');
		$cid1 = 1;
		$cid2 = 1;
		$uid1 = Auth::user()->id; //Get uid1 of the user logged in
		$relation = new Friend;
		$relation->f1 = $uid1;
		$relation->f2 = $uid2;
		$relation->c1 = 1;
		$relation->c2 = 1;
		$relation->save();
		return Redirect::to('/');
	}

	function get_requests(){
		$uid1 = Auth::user()->id; //uid1 of user logged in
		$requests = Friend::whereRaw("(f1='".$uid1."' and c1=0) OR (f2='".$uid1."' and c2=0)")->get();
		$requests_array = array();
		foreach($requests as $request){
			$rid = $request->id;
			if($uid1==$request->f1)
				$otherid = $request->f2;
			else
				$otherid = $request->f1;

			$user = User::find($otherid);
			$req_array = array('rid'=>$rid,'user'=>$user);
			array_push($requests_array, $req_array);
		}
	}

	function confirm_friend(){
		$uid1 = Auth::user()->id;	//current logged in user id
		$uid2 = Input::get('uid2');
		$request = Friend::whereRaw("(f1='".$uid1."' and f2='".$uid2."') OR (f1='".$uid2."' and f2='".$uid1."')")->get();
		foreach ($request as $req) {
			$req->c1 = 1;
			$req->c2 = 1;
			$req->save();
		}
	}

	static function get_friends(){
		$uid1 = Auth::user()->id;	//uid of current logged in user
		$requests = Friend::whereRaw("(f1='".$uid1."' OR f2='".$uid1."')")->get();		
		$confriends = array();
		$pendfriends = array();
		foreach ($requests as $request) {
			
			if($request->c1==1 && $request->c2==1)
			{
				if($uid1==$request->f1)
					$otherid = $request->f2;
				else
					$otherid = $request->f1;
				$user = User::find($otherid);
				array_push($confriends, $user);
			}
			else
			{

				if($uid1==$request->f1)
					$otherid = $request->f2;
				else
					$otherid = $request->f1;
				$user = User::find($otherid);
				array_push($pendfriends, $user);
			}
		}
		$friends = array('confirmed'=>$confriends,'pending'=>$pendfriends);
		return $friends;
	}
}
?>