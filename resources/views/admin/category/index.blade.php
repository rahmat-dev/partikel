@extends('admin.templates.index')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary float-right">
          <i class="fas fa-sm fa-plus"></i> Tambah
        </a>
      </div>
      <div class="card-body">
        <table class="table table-hover text-capitalize" id="table-category">
          <thead>
            <tr>
              <th>#</th>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<form action="#" class="d-none" method="POST" id="form-delete-category">
  @csrf
  @method('DELETE')
</form>
@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script defer>
  $(document).ready(function() {
    $('#table-category').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('admin.category.data') }}',
      columns: [
        { data: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name' },
        { data: 'action', orderable: false, searchable: false },
      ]
    });

    $('#table-category').on('click', '.delete-category', function(e) {
      e.preventDefault();
      
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Anda akan menghapus data kategori ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
      }).then(result => {
        if (result.value) {
          $('#form-delete-category')
            .attr('action', href)
            .submit();
        }
      });
    });
  });
</script>
@include('admin.templates.notify')
@endpush