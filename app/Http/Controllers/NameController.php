<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NameController extends Controller
{
    /**
	 * Display a listing of the resource
	 *
	 * @return Response
	 */
	public function index()
	{
	  	return array(
	      1 => "John",
	      2 => "Mary",
	      3 => "Steven"
	    );
	}

	/**
	 * Store a newly created resource in storage
	 *
	 * @return Response
	 */
	public function store()
	{
	  //
	}
}
