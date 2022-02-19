<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Transformers\OrderTransformer;
use App\Transformers\ResponseBuilder;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Product $product)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $balance = 0;
            if ($user_id) {
                $top = DB::table('balances')
                    ->where('user_id', $user_id)
                    ->latest()
                    ->first();
                if ($top) {
                    $balance = $top->amount;
                } else {
                    $balance = 0;
                }
            } else {
                $balance = 0;
            }
        }

        return view('client.order', compact('product', 'balance'));
    }

    public function store()
    {
        $data = request()->validate([
            'discounted_price' => 'required',
            'id' => 'required',
        ]);

        $user_id = auth()->user()->id;

        $saving = Order::create([
            'amount' => $data['discounted_price'],
            'product_id' => $data['id'],
            'order_qty' => 1,
            'user_id' => $user_id,
        ]);

        if ($saving) {
            $data = $this->get__('item', $saving, new OrderTransformer);
            $response = new ResponseBuilder('success', 'saved', $data, true);
            return $response->to_json();
        }

        $errorMessage = $this->getErrorMessage('creation_failure', 'order');
        $response = new ResponseBuilder('failure', 'creation_failure', false, [$errorMessage]);
        return $response->to_json();
    }

    public function view()
    {
        $user_id = auth()->user()->id;
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->where('user_id', $user_id)
            ->latest('orders.created_at')
            ->select(['orders.*', 'products.*'])
            ->paginate(10);

        return view('client.view', compact('orders'));
    }
}
