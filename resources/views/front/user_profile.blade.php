@extends('front.layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            @foreach ($users as $user)

            <div class="card my-5">
              <div class="card-header bg-white">
                <h4>Welcome {{ $user->name }}
                    <span><a href="{{ route('home') }}" class="btn btn-xs btn-outline-primary float-end">Back</a></span>
                </h4>

              </div>
              <div class="card-body">
                <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="User" class="rounded-circle" width="100">
                          <div class="mt-3">
                            <h4>{{ $user->name }}</h4>
                          </div>
                          <div class="mt-3">
                            <a href="{{ route('profile.delete',$user->id) }}" class="btn btn-outline-danger show_confirm">Delete Account</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
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
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->phone }}
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Wallet</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($user->wallet)
                                        {{ number_format($user->wallet->amount) ." ". $user->wallet->currency->name }}
                                    @else
                                        {{ "0 MMK" }}
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Using Currency</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!empty($user->wallet->currency))
                                        {{ $user->wallet->currency->name }}
                                    @else
                                        {{ "0 MMK" }}
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-primary">Contacts</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="" class="form-control">
                                    @forelse ($user->contact as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->name. " --- " . $contact->phone }}</option>
                                    @empty
                                    <option value="">You don't have any contact</option>
                                    @endforelse
                                </select>
                            </div>
                            </div>



                        </div>
                        <hr>
                        <div class="mb-3 ms-3">
                            <a href="{{ route('profile.edit',$user) }}" class="btn btn-success">Edit Profile</a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
@push('script-alt')
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
        });
    });

</script>
@endpush
