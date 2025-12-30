<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDevisRequest;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.devis')->with('seoPage', 'devis');
    }



    public function store(StoreDevisRequest $request)
    {

        $data = Devis::create([
            'name'  =>$request->name,
            'number'  =>$request->number,
            'profil'  =>$request->profil,
            'email'  =>$request->email,
            'message'  =>$request->message,

        ]);

        Mail::to('bilebossombra@gmail.com')->send(new TestMail());
        return redirect()->route('pages.devis')->with('success', 'Votre demande a été bien prise en compte ! Notre service client vous contactera.');
    }

}
