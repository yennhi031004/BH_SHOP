<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'product_price' => 'required',
            'product_img' => 'nullable',
        ]);

        $product_id = $validatedData['product_id'];
        $product_name = $validatedData['name'];
        $product_quantity = $validatedData['quantity'];
        $product_price = $validatedData['product_price'];
        $product_img = $validatedData['product_img'];

        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $product_quantity;
        } else {
            $cart[$product_id] = [
                'product_id' => $product_id,
                'name' => $product_name,
                'quantity' => $product_quantity,
                'product_price'=> $product_price,
                'product_img'=> $product_img,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    function destroy(){
        session()->forget('cart');
        return redirect()->route('cart');
    }

    public function remove(Request $request, $productId)
{
    // Lấy giỏ hàng từ session
    $cart = session()->get('cart');

    // Kiểm tra xem sản phẩm cần xóa có tồn tại trong giỏ hàng không
    if (isset($cart[$productId])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($cart[$productId]);

        // Cập nhật giỏ hàng trong session
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    return redirect()->route('cart');
}
}
