@extends('front.layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3 my-5">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h3>Create Your Contact
                        <span class="float-end">
                            <a href="{{ route('contact') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-arrow-left text-white me-2"></i>Back
                            </a>
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" placeholder="Name : ">
                            <span class="text-danger">@error('name'){{ "*".$message }}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" value="{{ old('phone') }}" name="phone" id="phone" class="form-control">
                            <span class="text-danger">@error('phone'){{ "*".$message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-address-book me-2"></i>Add Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
