<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view

        $id_user = auth()->user()->id;
        $transactions = Transaction::select("*")
            ->where([
                ["id_user", "=", $id_user],
                ["verified", "=", false],
            ])
            ->orderBy("transactions.created_at", "asc")
            ->get();
        $no = 1;
        return view('transaction.create')->with('transactions', $transactions)->with('no', $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // DB::statement('SET @customer_idx = IFNULL(@customer_idx, 0);');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_user)
    {
        // DB::statement('SET @customer_idx = IFNULL(@customer_idx, 0);');

        // $customer_idxs = DB::select(DB::raw('select (@customer_idx := ifnull(@customer_idx, 0) + 1) as customer_idx'));

        $last = Transaction::select('customer_idx')
                ->orderBy('customer_idx', 'desc')
                ->limit(0)
                ->first();

        $customer_idx = 1;
        if (!empty($last)) $customer_idx = $last->customer_idx + 1;

        // $customer_idx = $customer_idxs[0]->customer_idx + 1;

        // Carts::select(['products.price_product'])
        // ->join('products', 'products.id', '=', 'carts.id_product')

        $carts = DB::select('SELECT IFNULL(SUM(`carts`.`qty`*`products`.`price_product`), 0) AS `total` FROM `carts`
        INNER JOIN `products` ON `products`.`id` = `carts`.`id_product`
        WHERE `carts`.`id_user` = ? AND `carts`.`id_transaction` IS NULL
        GROUP BY `carts`.`id_transaction` LIMIT 1;', [$id_user]);

        $total = $carts[0]->total;

        $transaction = Transaction::create([
            // 'name_product' => $items->name_product,
            // 'qty' => $items->qty,
            'total_price' => $total,
            'verified' => false,
            'customer_idx' => $customer_idx,
            'id_user' => $id_user
        ]);

        // get carts yg mau melakukan tahap payment 'checkout'
        // $data = Cart::select("*")
        //     ->join("products", "products.id", "=", "carts.id_product")
        //     ->where("carts.id_user", $id_user)
        //     ->orderBy("carts.created_at", "desc")
        //     ->get();

        DB::update('update carts set id_transaction=? where id_transaction is null', [
            $transaction->id
        ]);

        return redirect("/transaction");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
