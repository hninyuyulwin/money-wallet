@extends('back.layouts.master')
@section('user','active')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.user') }}">Users</a></li>
                <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
        </div>
      </div>
    </div>
</div>

<div class="content">
  <div class="container">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>User Details View</h4>
            </div>
            <div class="card-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="Admin" class="rounded-circle" width="100">
                        <div class="mt-3">
                          <h4>{{ $user->name }}</h4>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('admin.user.delete',$user) }}" class="btn btn-outline-danger delete_confirm">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0 text-success text-bold">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{ $user->name }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0 text-success text-bold">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->email }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0 text-success text-bold">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->phone }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0 text-success text-bold">Wallet</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if ($user->wallet)
                                {{ number_format($user->wallet->amount) ." ". $user->wallet->currency->name }}
                            @else
                                {{ "0" }}
                            @endif
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0 text-success text-bold">Contacts</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select name="" class="form-control">
                                @forelse ($user->contact as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name. " --- " . $contact->phone }}</option>
                                @empty
                                <option value="">No Contact Available</option>
                                @endforelse
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
@push('script-alt')
<script>
    $('.delete_confirm').click(function(event) {
        event.preventDefault();
        var url =  $(this).attr('href');
        swal({
            title: 'Are you sure to delete?',
            text : 'This will delete permently.',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = url;
        }else {
            swal("Cancelled", "You Cancled to delete :)","error");
        }
        });
    });
</script>
@endpush
