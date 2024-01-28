<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Product;
use App\Models\Stock;
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
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);


        foreach ($request['products'] as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {

                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = new ProductResource($productWithStock);


                $sum += $productResource['price'];

                $products[] = $productResource->resolve();
            }
            else{
                $requestProduct['we_have'] = $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProducts[] = $requestProduct;
            }

        }

        if ( $notFoundProducts === [] && $products !== [] && $sum !== 0) {

            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'address' => $address,
                'sum' => $sum,
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10,
                'products' => $products,
            ]);

            if ($order) {
                foreach ($products as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }

            return 'success';
        } else{
            return response([
                'success' => false,
                'message' => 'some product not found or does not have in inventory',
                'not_found_product' => $notFoundProducts,
            ]);
        }

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
