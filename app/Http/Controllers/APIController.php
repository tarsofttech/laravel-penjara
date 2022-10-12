<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class APIController extends Controller
{
    public function index()
    {
        // query all transaction from table transactions
        $transactions = Transaction::with('user')->get();

        $total_amount = $transactions->sum('amount');
        $total_transactions = $transactions->count();

        // return response in json
        return response()->json([
            'total_transactions' => $total_transactions,
            'total_amount' => 'RM '.$total_amount,
            'data' => $transactions
        ]);
    }
}
