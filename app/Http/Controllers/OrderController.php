<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Product;
use App\Models\UserAddress;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return auth()->user()->orders;
    }

    public function store(StoreorderRequest $request)
    {

        $sum = 0;

        $products = [];
        $address = UserAddress::find($request->address_id);


        foreach ($request['products'] as $product) {
            $prod = Product::with('stocks')->findOrFail($product['product_id']);
//                dd($prod->stocks()->find($product['stock_id']));

            if (
                $prod->stocks()->find($product['stock_id']) &&
                $prod->stocks()->find($product['stock_id'])->quantity <= $product['quantity']
            ) {

                $p = $prod->withStock(9);
                dd($p);
                return new ProductResource($p);
//                dd(Product::find($product['product_id'])->withStock($product['stock_id']));
//                $productWithStock = $prod->withStock($product['stock_id']);
//                dd($productWithStock);
            }

        }

        auth()->user()->orders()->create([
            'comment' => $request->comment,
            'delivery_method_id' => $request->delivery_method_id,
            'payment_type_id' => $request->payment_type_id,
            'address' => $address,
            'sum' => $sum,
            'products' => $products,
        ]);

        return 'success';
    }

    public function show(order $order)
    {
        return new OrderResource($order);
    }

    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    public function destroy(order $order)
    {
        //
    }
}
