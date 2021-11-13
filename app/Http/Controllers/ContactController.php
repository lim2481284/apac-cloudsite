<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

	//Submit contact form
	public function submit(Request $request)
	{
		//Create record
		Feedback::create($request->all());
		return redirect('/')->with('success', "Your message is delivered. We will get back to you as soon as possible and Thank you for your interest");
	}
}
