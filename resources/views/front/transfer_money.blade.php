@extends('front.layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <div class="card-header bg-white">
                    <h3>Transfer Money Easily</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('transfer.checkNum') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="phone"><h4>Choose numbers from your contact list</h4></label>
                            <select name="phone" id="phone" class="form-control">
                                <option value="">Select Number from your contact list</option>
                                @forelse ($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->phone }}</option>
                                @empty
                                <option value="">Your contact list is empty</option>
                                @endforelse
                            </select>
                            <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-success">Continue to Transfer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

