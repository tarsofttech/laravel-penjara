<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        // query all transactions from tables transactions : select * from transactions
        $transactions = Transaction::all();

        // go to views index: resources/views/transactions/index.blade.php
        return view('transactions.index', compact('transactions'));

    }
}
