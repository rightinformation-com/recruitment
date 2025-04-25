<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the user's cart.
     */
    public function show(Request $request)
    {
        $cart = $this->getCart($request);

        return response()->json([
            'cart_id' => $cart->id,
            'items_count' => $cart->getTotalItemsCount(),
            'total_price' => $cart->getTotalPrice(),
            'items' => $cart->items()->with('product')->get(),
        ]);
    }

    /**
     * Add a product to the cart.
     */
    public function addItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart($request);
        $product = Product::findOrFail($request->product_id);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cartItem = new CartItem([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
            $cart->items()->save($cartItem);
        }

        return response()->json([
            'message' => 'Product added to cart',
            'cart_item' => $cartItem->load('product'),
        ]);
    }

    /**
     * Remove an item from the cart.
     */
    public function removeItem(Request $request, $itemId)
    {
        $cart = $this->getCart($request);
        $cartItem = $cart->items()->findOrFail($itemId);
        $cartItem->delete();

        return response()->json([
            'message' => 'Item removed from cart',
        ]);
    }

    /**
     * Update the quantity of an item in the cart.
     */
    public function updateItem(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart($request);
        $cartItem = $cart->items()->findOrFail($itemId);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'message' => 'Cart item updated',
            'cart_item' => $cartItem->load('product'),
        ]);
    }

    /**
     * Get or create a cart for the current user.
     */
    private function getCart(Request $request)
    {
        $cartId = $request->session()->get('cart_id');

        if ($cartId) {
            $cart = Cart::find($cartId);
            if ($cart) {
                return $cart;
            }
        }

        // Create a new cart if none exists
        $cart = new Cart();
        $cart->save();

        $request->session()->put('cart_id', $cart->id);

        return $cart;
    }
}
