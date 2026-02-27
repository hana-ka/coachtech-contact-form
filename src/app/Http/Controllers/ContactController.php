<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function back(Request $request)
    {
        return redirect()
            ->route('contacts.index')
            ->withInput($request->all());
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->validated();

        $category = Category::find($data['category_id']);

        if ($category) {
            $data['category_content'] = $category->content;
        }

        return view('confirm', compact('data'));
    }

    public function store(Request $request){
        Contact::create([
        'category_id' => $request->category_id,
        'first_name'  => $request->first_name,
        'last_name'   => $request->last_name,
        'gender'      => $request->gender,
        'email'       => $request->email,
        'tel'         => $request->tel1 . $request->tel2 . $request->tel3,
        'address'     => $request->address,
        'building'    => $request->building,
        'detail'      => $request->detail,
        ]);

        return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}
