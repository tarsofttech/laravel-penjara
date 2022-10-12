<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Mail;
use App\Mail\TransactionCreatedMail;

class TransactionController extends Controller
{
    public function index()
    {
        // query all transactions from tables transactions : select * from transactions
        $transactions = Transaction::all();

        // query logged in user transactions only
        // $transactions = auth()->user()->transactions;

        // go to views index: resources/views/transactions/index.blade.php
        return view('transactions.index', compact('transactions'));

    }

    public function create()
    {
        // go to views create: resources/views/transactions/create.blade.php
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        // store input from form to table transactions - by using Model - Transaction
        // Method 1 : POPO - Plain Old PHP Object
        $transaction = new Transaction();
        $transaction->title = $request->title;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        // send email to user
        Mail::to('user@user.com')->send(new TransactionCreatedMail($transaction));

        // return to index
        return redirect()->route('transactions:index');
    }

    public function show(Transaction $transaction)
    {
        // return to views
        return view('transactions.show', compact('transaction'));

    }

    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        // return to views
        return view('transactions.edit', compact('transaction'));

    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $transaction->title = $request->title;
        $transaction->amount = $request->amount;
        $transaction->save();

        // return to index
        return redirect()->route('transactions:index');
    }

    public function delete(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return redirect()->route('transactions:index');
    }
}
