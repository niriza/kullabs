<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
	public function index()
	{
		print "Index page"; die;
	}
    public function create()
	{
		$data = array();
	    return view('users.create');
	}

	public function store(Request $request)
	{
		dd($request->all());
	}

	public function show()
	{
		
	}
}
