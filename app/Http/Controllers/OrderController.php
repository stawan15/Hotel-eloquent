<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            'status' => 'success',
            'data' => $orders
        ]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
