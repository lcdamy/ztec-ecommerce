<?php

namespace App\Http\Controllers;

use App\Product;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::join('currencies', 'products.currency_id', '=', 'currencies.id')
            ->latest()
            ->select(['currencies.code', 'products.*'])
            ->paginate(10);

        return view('admin.index', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            'description' => '',
            'image' => 'required|image',
        ]);

        $imagepath = request('image')->store('upload', 'public');

        $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000, 1000); // this library is used to crop the image.
        $image->save();

        $discout = 0;

        if ($data['price'] <= 100) { //zero discout
            $discout = 0;
        } else if ($data['price'] > 100 && $data['price'] < 112) { //No discout
            $discout = 0;
        } else if ($data['price'] >= 12 && $data['price'] <= 115) { //0.25% discout
            $discout = ($data['price'] * 0.25) / 100;
        } else if ($data['price'] > 115 && $data['price'] < 120) { //No discout
            $discout = 0;
        } else { //50% discout
            $discout = ($data['price'] * 50) / 100;
        }

        $discouted_price = $data['price'] - $discout;

        Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'discounted_price' => $discouted_price,
            'description' => $data['description'],
            'image' => $imagepath,
        ]);

        return redirect('/dashboard');
    }
}
