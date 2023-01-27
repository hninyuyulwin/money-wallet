@extends('front.layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 offset-md-3">
                @if ($history['user_id'] != auth()->user()->id)
                <div class="alert alert-warning">
                    <h3 class="text-center">!! You don't have permission to view !!</h3>
                </div>
                @else
                <div class="card">
                    <div class="card-header">
                        <h3>{{ auth()->user()->name }} Transcations Details
                            <span class="float-end">
                                <a href="{{ route('history') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-arrow-left text-white me-2"></i>Back
                                </a>
                            </span>
                        </h3>
                    </div>
                    <div class="card-body" id="data-table">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="card-part pb-3">
                                    <div class="d-flex flex-column align-items-center my-3">
                                        <img src="{{ asset('images/mark.webp') }}" width="150" class="rounded-circle">
                                        <h3>Transfer Success</h3>
                                        <h4>{{ number_format($history->amount)." ". $history->transfer_type }}</h4>
                                    </div>
                                    <hr>
                                    <p>Transcations Time
                                        <span class="float-end">{{ date_format($history->created_at,"d-M-Y H:i:s") }}</span>
                                    </p>
                                    <p>Transcations ID
                                        <span class="float-end">{{ $history->transition_id }}</span>
                                    </p>
                                    <p>Transcations Type
                                        <span class="float-end">{{ Str::title($history->type) }}</span>
                                    </p>
                                    <p>Transfer To
                                        <span class="float-end">{{ $history->contact->name }}</span>
                                    </p>
                                    <p>Amount
                                        <span class="float-end">{{ number_format($history->amount)." ". $history->transfer_type }}</span>
                                    </p>
                                    <p>Description
                                        @if ($history->description)
                                            <span class="float-end">{{ $history->description }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
