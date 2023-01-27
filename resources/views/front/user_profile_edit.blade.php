@extends('front.layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            @if (Auth::user()->id == $user->id)
            <div class="card my-5">
                <div class="card-header bg-white">
                    <h4>Edit {{ $user->name }} Data
                        <span><a href="{{ route('profile') }}" class="btn btn-xs btn-outline-primary float-end">Back</a></span>
                    </h4>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <form action="{{ route('profile.update',$user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name',$user->name) }}" name="name" id="name" class="form-control">
                            <span class="text-danger">@error('name'){{ "*".$message }}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" value="{{ old('email',$user->email) }}" name="email" id="email" class="form-control">
                            <span class="text-danger">@error('email'){{ "*".$message }}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" value="{{ old('phone',$user->phone) }}" name="phone" id="phone" class="form-control">
                            <span class="text-danger">@error('phone'){{ "*".$message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-address-book me-2"></i>Update</button>
                    </form>
                </div>
            </div>
            @else
            <div class="card-body">
                <div class="alert alert-danger">
                    <h3 class="text-center">You Don't have permission!!</h3>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
