<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {

	public function startpage() {

		return view('welcome', ['data' => Product::all()]);

	}

	public function getall() {

		return view('dashboard', ['data' => Product::all()]);

	}
    

    // add new product
    public function addproduct(Request $req) {
    	
    	$validation = $req->validate([
    		'name' 		  => 'required',
    		'img'  		  => 'required|image',
    		'description' => 'required',
    		'price'		  => 'required|numeric|max:99|min:0.01',
    		],[
            'name.required'        => 'Не ввели название',
            'img.required'         => 'Не выбрано изображение',
            'img.image'			   => 'Изображение должно быть с расширением jpg, jpeg, png, bmp, gif, svg, или webp',
            'description.required' => 'Не ввели описание',
            'price.required'       => 'Не ввели цену',
            'price.numeric'        => 'Ввели неправильную цену',
            'price.max'         => 'Максимальная цена: 99 руб.',
            'price.min'       => 'Минимальная цена: 0.01 руб.',
            ]);		

    	$image_path = $req->file('img')->store('upload', 'public');

    	$product = new Product();
    	$product->name 		  = $req->input('name');
    	$product->img 		  = $image_path;
    	$product->description = $req->input('description');
    	$product->price       = $req->input('price');

    	$product->save();

    	return redirect()->route('dashboard');

    }


    public function editproduct($product) {
    	
    	return view('product', ['product' => Product::where('id', $product)->first()]);
    	
    }

    // update product after edit
    public function updateproduct($update, Request $req) {

    	$validation = $req->validate([
    		'name' 		  => 'required',
    		'img'  		  => 'image',
    		'description' => 'required',
    		'price'		  => 'required|numeric|max:99|min:0.01',
    		],[
            'name.required'        => 'Не ввели название',
            'img.image'			   => 'Изображение должно быть с расширением jpg, jpeg, png, bmp, gif, svg, или webp',
            'description.required' => 'Не ввели описание',
            'price.required'       => 'Не ввели цену',
            'price.numeric'        => 'Ввели неправильную цену',
            'price.max'         => 'Максимальная цена: 99 руб.',
            'price.min'       => 'Минимальная цена: 0.01 руб.',
            ]);		
	    	

    	$product = Product::where('id', $update);

    	//new img path
    	if (($req->file('img')) !== NULL) {

    		// delete old picture and save new picture
    		Storage::delete('/public/' . $product->first()->img);
			$image_path = $req->file('img')->store('upload', 'public');    		

    	} else {

    		$image_path = $product->first()->img;

    	}

    	// save product
    	$product->update(['name'=>$req->input('name'),
    					  'img'=>$image_path,
    					  'description'=>$req->input('description'),
    					  'price'=>$req->input('price')
    					]);

    	return redirect()->route('dashboard', ['data' => Product::all()]);

    }


    // delete product
    public function delproduct($id) {
    	
    	$product = Product::where('id', $id)->first();

    	Storage::delete('/public/' . $product->img);
   
    	$product->delete();

    	return redirect()->route('dashboard', ['data' => Product::all()]);

    }
}
