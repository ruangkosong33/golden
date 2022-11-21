@extends('admin.layouts.b_main')

@section('content')
    
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <section class="content">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Kategori</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{route('category.store')}}">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="title_category" class="col-sm-2 col-form-label">Nama Kategori</label>
              <div class="col-sm-6">
                <input type="text" class="form-control @error('title_category') is-invalid @enderror" id="title_category" placeholder="Judul Kategori" name="title_category">

                @error('title_category')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
                
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{route('category.index')}}" button type="submit" class="btn btn-default">Kembali</button></a>
          </div>
        </form>
      </div>        
    </section>
    <!-- End Content -->
  </div>

  @endsection