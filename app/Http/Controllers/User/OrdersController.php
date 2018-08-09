<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('user.orders.index', compact('orders'));
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        $order->status = 'canceled';
        $order->save();

        return redirect()->route('user.orders.index')->with('success', 'Pedido cancelado com sucesso!');
    }
}
