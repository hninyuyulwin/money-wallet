@extends('back.layouts.master')
@section('currency','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Currency Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Currencies</li>
            </ol>
        </div>
      </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Create Currencies
                        <span class="float-right"><a href="{{ route('admin.currency') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-arrow-left mr-2"></i>Back</a>
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    <form action="{{ route('admin.currency.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Currency Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" placeholder="Enter Currrency">
                        <span class="text-danger">@error('name'){{ "*".$message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" value="1" name="amount" id="amount" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
