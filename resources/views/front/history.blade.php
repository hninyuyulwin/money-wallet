@extends('front.layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ auth()->user()->name }} Transcations List
                            <span class="float-end">
                                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-arrow-left text-white me-2"></i>Back
                                </a>
                            </span>
                        </h3>
                    </div>
                    <div class="card-body" id="data-table">
                        <form action="{{ route('history-search') }}" method="POST" class="my-3">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="from">From</label>
                                    <input type="date" name="from" id="from" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <label for="to">To</label>
                                    <input type="date" name="to" id="to" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-warning mt-4 mb-0">Search</button>
                                </div>
                            </div>
                        </form>
                        @forelse ($histories as $history)
                        <div class="card mt-3">
                            <a href="{{ route('history-details',$history) }}">
                                <div class="card-body">
                                    <div class="card-part pb-3">
                                        <p>{{ $history->type }}
                                            <span class="float-end">{{ number_format($history->amount)." ". $history->transfer_type }}</span>
                                        </p>
                                        <span>{{ $history->created_at }}</span>
                                        <hr>
                                        <a href="{{ route('history-details',$history) }}" class="btn btn-sm btn-outline-success">Details</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="alert alert-danger">No History Yet!</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
