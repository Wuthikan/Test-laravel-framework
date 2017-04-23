<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HelloController extends Controller {

	public function index()
	{
		return view('hello.index' ,[
			'title'=> 'titll 5',
			'subtitle' => 'an intiasd 66'
			]);
	}



}
