@extends('front.layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3 my-5">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Money to Your Wallet
                        <span class="float-end">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-success">
                                <i class="fa fa-arrow-left text-white me-2"></i>Back
                            </a>
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <form action="{{ route('addAmount') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="amount">Enter your amount</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" id="amount" class="form-control" placeholder="Tyep amount : ">
                            <span class="text-danger">@error('amount'){{ "*".$message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-outline-warning btn-sm"><i class="fa fa-money me-2"></i>Add Money</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
