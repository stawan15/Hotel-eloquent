<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return response()->json([
            'status' => 'success',
            'data' => $orderDetails
        ]);
    }

    public function create()
    {
        return view('order-details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        OrderDetail::create($request->all());

        return redirect()->route('order-details.index');
    }

    public function show(OrderDetail $orderDetail)
    {
        return view('order-details.show', compact('orderDetail'));
    }

    public function edit(OrderDetail $orderDetail)
    {
        return view('order-details.edit', compact('orderDetail'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderDetail->update($request->all());

        return redirect()->route('order-details.index');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('order-details.index');
    }
}
