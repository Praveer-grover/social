<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class First extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users',function($newtable){
			$newtable->increments('id');
			$newtable->string('username');
			$newtable->string('password');
			$newtable->string('email');
			$newtable->string('full_name');			
			$newtable->string('dob');
			$newtable->timestamps();
		});

		Schema::create('friends',function($newtable){
			$newtable->increments('id');
			$newtable->integer('f1');
			$newtable->integer('f2');			
			$newtable->timestamps();
		});

		Schema::create('groups',function($newtable){
			$newtable->increments('id');
			$newtable->integer('uid');
			$newtable->string('name');
			$newtable->text('description');
			$newtable->integer('member_count');			
			$newtable->timestamps();
		});

		Schema::create('user_group_add',function($newtable){
			$newtable->increments('id');
			$newtable->integer('gid');
			$newtable->integer('uid');
			$newtable->timestamps();
		});

		Schema::create('movies',function($newtable){
			$newtable->increments('id');
			$newtable->string('name');
			$newtable->string('genre');
			$newtable->text('link');
			$newtable->integer('watch_count');
			$newtable->timestamps();
		});

		Schema::create('shows',function($newtable){
			$newtable->increments('id');
			$newtable->integer('mid');
			$newtable->integer('uid');
			$newtable->string('start_time');
			$newtable->timestamps();
		});

		Schema::create('show_join',function($table){
			$table->increments('id');
			$table->integer('sid');
			$table->integer('uid');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
		Schema::drop('shows');
		Schema::drop('groups');
		Schema::drop('user_group_add');
		Schema::drop('friends');
		Schema::drop('show_join');
		Schema::drop('movies');

	}

}
