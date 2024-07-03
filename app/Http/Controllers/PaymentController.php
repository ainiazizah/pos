<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function showReceipt($customer_idx)
    {
        $id_user = auth()->user()->id;
        // $transactions = Transaction::select("*")
        // ->where("customer_idx", $customer_idx)
        // ->get();

        $transactions = DB::table('transactions')
            ->select([
                'transactions.id',
                'products.name_product',
                'products.price_product',
                'carts.qty',
                'transactions.total_price',
                'transactions.created_at',
                'transactions.updated_at',
            ])
            ->join('carts', 'carts.id_transaction', '=', 'transactions.id')
            ->join('products', 'products.id', '=', 'carts.id_product')
            ->where('customer_idx', $customer_idx)
            ->get();

        // Pastikan transaksi ditemukan sebelum melanjutkan
        if (!$transactions) {
            return abort(404);
        }
        return view('receipt', compact('transactions'));
    }
}
