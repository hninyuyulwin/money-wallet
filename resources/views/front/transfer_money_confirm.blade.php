@extends('front.layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <div class="card-header bg-white">
                    <h3>Transfer Money to {{ $contact->name }}
                        <span class="float-end">
                            <a href="{{ route('transfer') }}" class="btn btn-sm text-white btn-warning">
                                <i class="fa fa-arrow-left me-2"></i>Back
                            </a>
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        @push('script-alt')
                        <script>
                            toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                            toastr.warning("{{ session('error') }}");
                        </script>
                        @endpush
                    @endif
                    <form action="{{ route('transfer.confirm',$contact->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="currency">Transfer Type</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="">Select Currency Option(*Only MMK to Us Dollar Available)</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="amount">Amount</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" id="amount" class="form-control">
                            <span class="text-danger">@error('amount'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control">

                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

