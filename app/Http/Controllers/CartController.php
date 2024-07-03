<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $id_user = auth()->user()->id;
        $carts = DB::select('SELECT `carts`.`id`,`carts`.`qty`,`carts`.`total`,`products`.`name_product`,`products`.`price_product`  FROM `carts`
        INNER JOIN `products` ON `products`.`id` = `carts`.`id_product`
        WHERE `carts`.`id_user` = ? AND `carts`.`id_transaction` IS NULL', [$id_user]);
        
        
        $no = 1;
        return view('cart.create', compact('product', 'carts', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_product = $request->id_product;
        $qty = $request->qty;
        $price = $request->price_product;
        $total = $qty * $price;
        $id_user = auth()->user()->id;
        
        
        $checkData = DB::select('SELECT count(*) AS aggregate FROM `carts` 
        WHERE `id_product` = ? AND `id_transaction` IS NULL AND `id_user` = ?', [
            $id_product,
            $id_user,
        ]);


        $data = DB::select('SELECT * FROM `carts` 
        WHERE `id_product` = ? AND `id_transaction` IS NULL AND `id_user` = ?', [
            $id_product,
            $id_user,
        ]);

        if ($checkData[0]->aggregate == 0) {
            DB::insert('insert into carts(id_product,qty,total,id_user) values(?,?,?,?)', [$id_product, $qty, $total, $id_user]);

        } else {
            DB::update('update carts set qty=' . $data[0]->qty + $qty . ' ,total=' . $data[0]->total + $total . ' where id_product=' . $id_product . ' and ' . ' id_user =' . $id_user);

        }
        return redirect('/cart/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cart)
    {
        $cart = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.id_product')
            ->select('*')
            ->where('id', $id_cart)
            ->get();
        //dd($cart[0]->id_cart);
        return view('cart.edit', compact('cart'));

        // $data['products'] = Product::all();
        // $data['cart'] = Cart::find($id_cart);

        // return view('cart.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update($id_cart, Request $request)
    {
        $cart = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.id_product')
            ->select('*')
            ->where('id', $id_cart)
            ->get();
        //dd($find,$cart[0]->price_product); // ' or 1 // '
        DB::update('update carts set qty=' . $request->qty . ',total=' . $request->qty * $cart[0]->price_product . ' where id = ?', [$id_cart]);
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cart)
    {
        Cart::destroy($id_cart);
        return redirect('/cart');
    }
}
