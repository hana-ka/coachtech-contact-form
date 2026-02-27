<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->validated();
        return view('confirm', compact('data'));
    }

    public function store(){
        return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}
