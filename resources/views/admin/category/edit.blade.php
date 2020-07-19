@extends('admin.templates.index')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('admin.category.index') }}" class="btn btn-danger btn-sm">
          <i class="fas fa-arrow-left"></i> <b>&nbsp;Batal</b>
        </a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.category.update', $category) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              placeholder="Masukkan kategori" value="{{ old('name') ?? $category->name }}">

            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection