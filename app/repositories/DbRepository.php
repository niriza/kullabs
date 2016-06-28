<?php
namespace repositories;
 
use User;
 
class DbRepository implements RepositoryInterface {
	
	public function selectAll()
	{
		return User::all();
	}
	
	public function find($id)
	{
		return User::find($id);
	}
}