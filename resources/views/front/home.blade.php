@extends('front.layouts.app')

@section('content')
<div class="banner">
    <p class="banner-text">Money Wallet Project</p>
</div>
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card main-visual">
                <div class="card-header bg-white">
                    <h3 class="text-center">Welcome {{ empty(Auth::user()->name) ? "User" : Auth::user()->name }}</h3>
                    <p class="text-center">Just quick tap to transfer money.</p>
                </div>
                @if (Session::has('message'))
                    @push('script-alt')
                    <script>
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.success("{{ session('message') }}");
                    </script>
                    @endpush
                @endif
                <div class="card-body">
                    <a href="{{ route('contact') }}" class="btn btn-outline-success"><i class="fa fa-address-book-o me-2"></i>Contacts</a>
                    <a href="{{ route('add-money') }}" class="btn btn-outline-primary float-end"><i class="fa fa-money me-2"></i>Add Money</a>
                </div>
            </div>
            <div class="card mt-3">
                <a href="{{ route('transfer') }}">
                    <div class="card-body">
                        <div class="card-part">
                            <p><i class="fa fa-share me-2"></i>Transfer Money<i class="fa fa-chevron-right float-end"></i></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mt-3">
                <a href="{{ route('history') }}">
                    <div class="card-body">
                        <div class="card-part">
                            <p><i class="fa fa-history me-2"></i>Transcations<i class="fa fa-chevron-right float-end"></i></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mt-3">
                <a href="{{ route('profile') }}">
                    <div class="card-body">
                        <div class="card-part">
                            <p><i class="fa fa-user me-2"></i>Profile<i class="fa fa-chevron-right float-end"></i></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
