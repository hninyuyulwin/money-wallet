@extends('front.layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="col-md-6 offset-md-3">

            <div class="card my-5">
                <div class="card-header bg-white">
                    <h3>My Contact List
                        <span class="float-end">
                            <a href="{{ route('contact.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus-circle me-2"></i>Create
                            </a>
                        </span>
                    </h3>
                </div>
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
                    @forelse ($contacts as $contact)
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-success">{{ $contact->name }}</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{ $contact->phone }}
                            </div>
                            <div class="col-sm-3 text-secondary">
                                <a href="{{ route('contact.edit',$contact) }}" class="btn btn-sm"><i class="fa fa-pencil-square text-warning fa-2x"></i></a>
                                <a href="{{ route('contact.delete',$contact) }}" class="btn btn-sm delete_confirm"><i class="fa fa-trash text-danger fa-2x"></i></a>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="alert alert-danger text-center">No Contact in your Account!</div>
                    @endforelse
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
