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
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>
      </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Registered User List</h3>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <table id="data-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td><a href="{{ route('admin.user.view',$user) }}" class="btn btn-sm btn-success">View</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-primary"><h4>No Users Available</h4></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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
</script>
@endpush
