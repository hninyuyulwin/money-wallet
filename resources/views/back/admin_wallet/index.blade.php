@extends('back.layouts.master')
@section('wallet','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">User Wallet Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.wallet') }}">Home</a></li>
                <li class="breadcrumb-item active">Wallet</li>
            </ol>
        </div>
      </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>User Wallet</h3>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <table id="data-table" class="table table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Currency</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wallets as $wallet)
                            <tr>
                                <td>{{ $wallet->id }}</td>
                                <td>{{ $wallet->user->name }}</td>
                                <td>{{ $wallet->currency->name }}</td>
                                <td>{{ number_format($wallet->amount) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-primary"><h4>No Currency Available</h4></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-felx justify-content-center my-3">
                        {{ $wallets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-alt')
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    });

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
