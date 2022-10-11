@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Show') }}</div>

                <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $transaction->title }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" value="{{ $transaction->amount }}" readonly>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('transactions:index') }}" class="btn btn-link">Back to Transaction Index</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
``