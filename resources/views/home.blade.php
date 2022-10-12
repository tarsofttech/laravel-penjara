@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <br>
                    @if(auth()->user()->role == 'admin')
                        Your are admin
                    @elseif(auth()->user()->role == 'user')
                        Your are user
                    @endif

                    @can('isAdmin')
                        Your have admin power
                    @endcan

                    @can('isUser')
                        You have user power
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
