<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Mail\TestMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index(){
        // Scanner toutes les images du dossier produits
        $productsPath = public_path('assets/images/produits');
        $allFiles = File::files($productsPath);

        // Filtrer uniquement les images (jpg, jpeg, png)
        $productImages = collect($allFiles)
            ->filter(function($file) {
                return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png']);
            })
            ->map(function($file) {
                return $file->getFilename();
            })
            ->sort()
            ->values()
            ->toArray();

        return view('pages.products', compact('productImages'))->with('seoPage', 'product');
    }


    public function store(StoreProductRequest $request)
    {

        $data = Product::create([
            'nameProduit'  =>$request->nameProduit,
            'numberProduit'  =>$request->numberProduit,
            'emailProduit'  =>$request->emailProduit,
            'quantite'  =>$request->quantite,
            'produit'  =>$request->produit,

        ]);

        Mail::to('bilebossombra@gmail.com')->send(new TestMail());
        return redirect()->route('pages.product')->with('success', 'Votre demande a été bien prise en compte ! Notre service client vous contactera.');
    }

}
