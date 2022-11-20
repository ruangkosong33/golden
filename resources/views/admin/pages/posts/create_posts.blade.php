@extends('admin.layouts.b_main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Berita</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
      <div class="card card-info">
        <div class="card-header">
         <h3 class="card-title">Tambah Data</h3>
        </div> 
        <!-- /.card-header -->
        <!-- form start -->
        <form action={{route('category.index')}} method="post" class="form-horizontal">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="title_category" class="col-sm-2">Judul Post</label>
              <div class="col-sm-6">
                <input type="text" name="title_post" id="title_post" placeholder="Judul Post" class="form-control">
            <div class="form-group row">
              <label for="kategori" class="col-sm-2">Kategori</label>
              <div class="col-sm-6">
                <input type="text" class="form-contorl" name="kategori" placeholder="Judul Post">
              </div>
            </div>
            <div class="form-group row">
              <label for="body" class="col-sm-2">Body</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="body" id="body" placeholder="Isi Post">
              </div>
            <div class="form-group row">
              <label for="is_active" class="col-sm-2">Status</label>
              <div class="col-sm-6">
                <select name="is_active" class="form-control">
                  <option value="{{}}">{{}}</option>
              </div>
            </div>
          </div>
        </form>         
    </section>
</div>

@endsection