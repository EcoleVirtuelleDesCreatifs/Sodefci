<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function index()
        {
            return view('pages.contact')->with('seoPage', 'contact');
        }



        public function store(StoreContactRequest $request)
        {

            $data = Contact::create([
                'name'  =>$request->name,
                'number'  =>$request->number,
                'email'  =>$request->email,
                'message'  =>$request->message,

            ]);

            return redirect()->route('pages.contact')->with('success', 'Votre demande a été bien prise en compte ! Notre service client vous contactera.');
        }

    }
