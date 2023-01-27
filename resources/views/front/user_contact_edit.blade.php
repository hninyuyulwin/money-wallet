@extends('front.layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3 my-5">
            <div class="card">
                @if (Auth::user()->id == $contact->user_id)
                    <div class="card-header bg-secondary text-white">
                        <h3>Edit Your Contact
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
                        <form action="{{ route('contact.update',$contact) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{ old('name',$contact->name) }}" name="name" id="name" class="form-control">
                                <span class="text-danger">@error('name'){{ "*".$message }}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" value="{{ old('phone',$contact->phone) }}" name="phone" id="phone" class="form-control">
                                <span class="text-danger">@error('phone'){{ "*".$message }}@enderror</span>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-address-book me-2"></i>Update</button>
                        </form>
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
</div>
@endsection
