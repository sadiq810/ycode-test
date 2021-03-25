<?php

namespace App\Http\Controllers;

use App\Models\People;

class PeopleController extends Controller
{

	public function index()
	{
		return view('people');
	}
}
