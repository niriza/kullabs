<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class UsersController extends Controller
{
	public function index()
	{
		print "Index page"; die;
	}
    public function create()
	{
		if (Auth::check()) {
			dd( Auth::user());
		}
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
