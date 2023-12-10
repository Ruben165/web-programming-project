<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $total = 0;
        foreach ($cart->cartItems as $cartItem) {
            $total += $cartItem->menu->food_price * $cartItem->quantity;
        }
        return view('auth.cart', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    public function addToCart(Request $request)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        CartItem::create([
            'cart_id' => $cart->id,
            'menu_id' => $request->menu_id,
            'quantity' => 1
        ]);
        return redirect()->back()->with('success', 'Item added to cart');
    }

    public function increaseQuantity($cartItemId)
    {
        $cartItem = CartItem::where('id', $cartItemId)->first();
        $cartItem->quantity += 1;
        $cartItem->save();
        return redirect()->back()->with('success', 'Item quantity increased');
    }

    public function decreaseQuantity($cartItemId)
    {
        $cartItem = CartItem::where('id', $cartItemId)->first();
        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
            return redirect()->back()->with('success', 'Item quantity decreased');
        } else {
            return redirect()->back()->withErrors('Item quantity cannot be less than 1');
        }
    }

    public function deleteFromCart($cartItemId)
    {
        CartItem::where('id', $cartItemId)->delete();
        return redirect()->back()->with('success', 'Item deleted from cart');
    }

    public function checkout()
    {
        return view('auth.checkout');
    }
}
