<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transformers\OrderTransformer;
use App\Transformers\ProductTransformer;
use App\Transformers\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function vieworders()
    {
        return view('admin.orders');
    }

    public function viewproducts()
    {
        return view('admin.products');
    }

    public function viewcreate()
    {
        return view('admin.create');
    }

    public function orders()
    {
        try {
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->latest()
                ->select(['users.email', 'products.image', 'products.name', 'orders.*'])
                ->paginate(10);
            return $orders;
            if ($orders) {
                $data = $this->get__('collection', $orders, new OrderTransformer);
                $response = new ResponseBuilder('success', 'saved', $data, true);
                return $response->to_json();
            }

            $errorMessage = $this->getErrorMessage('creation_failure', 'order');
            $response = new ResponseBuilder('failure', 'creation_failure', false, [$errorMessage]);
            return $response->to_json();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function products()
    {
        $products = Product::join('currencies', 'products.currency_id', '=', 'currencies.id')
            ->latest()
            ->select(['currencies.code', 'products.*'])
            ->paginate(10);
        if ($products) {
            $data = $this->get__('collection', $products, new ProductTransformer);
            $response = new ResponseBuilder('success', 'saved', $data, true);
            return $response->to_json();
        }

        $errorMessage = $this->getErrorMessage('creation_failure', 'order');
        $response = new ResponseBuilder('failure', 'creation_failure', false, [$errorMessage]);
        return $response->to_json();
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

        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'discounted_price' => $discouted_price,
            'description' => $data['description'],
            'image' => $imagepath,
        ]);

        if ($product) {
            $data = $this->get__('item', $product, new ProductTransformer);
            $response = new ResponseBuilder('success', 'saved', $data, true);
            return $response->to_json();
        }

        $errorMessage = $this->getErrorMessage('creation_failure', 'order');
        $response = new ResponseBuilder('failure', 'creation_failure', false, [$errorMessage]);
        return $response->to_json();
    }
}
