<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Order;

use App\Jobs\PayOrderJob;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('user.products.index', compact('products'));
    }

    public function buy(Request $request, $id)
    {
        $product = Product::find($id);

        $order = Order::create([
            'quantity' => $request->quantity,
            'product_id' => $product->id,
            'price_unity' => $product->price,
            'user_id' => auth('user')->user()->id
        ]);

        PayOrderJob::dispatch($order)->delay(now()->addMinutes(1));

        return redirect()->route('user.orders.index')->with('success', 'Pedido criado com sucesso');
    }
}
