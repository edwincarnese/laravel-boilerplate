@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  @include('partials.breadcrumb', ['title' => 'Users'])
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of users</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#create-modal">
                  <i class="fas fa-plus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('pages.admin.user._create')
@endsection

@section('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    const table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('users.index') }}",
      columns: [
        {
          data: 'full_name', 
          name: 'full_name'
        },
        {
          data: 'username', 
          name: 'username'
        },
        {
          data: 'email', 
          name: 'email'
        },
        {
          data: 'action', 
          name: 'action', 
        },
      ]
    });
  });
</script>
@endsection