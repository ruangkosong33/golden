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
        <form action={{route('category.index')}} method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="title_post" class="col-sm-2">Judul Post</label>
              <div class="col-sm-6">
                <input type="text" name="title_post" id="title_post" class="form-control @error('title_post') is-invalid @enderror" placeholder="Judul Post">
                
                @error('title_post')
                <span class="invalid-feedback">{{$meesage}}</span>
                @enderror
                  
              </div>
            </div>

            <div class="form-group row">
              <label for="body" class="col-sm-2">Deskripsi</label>
              <div class="col-sm-6">
                <input type="text" class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Deskripsi" id="body">
                
                @error('body')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror

              </div>
            </div>

            <div class="form-group row">
              <label for="picture_post" class="col-sm-2">Gambar Post</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" id="picture_post" placeholder="picture_post" name="picture_post">
              </div>
            </div>

            <div class="form-group row">
              <label for="categorys_id" class="col-sm2">
                <select name="categorys_id" class="form-control">
                  <option value={{$categorys_id}}>/option>
                </select>
            </div>

            <div class="form-group row">
              <label for="is_active" class="col-sm-2">Status</label>
              <div class="col-sm-6">
                <select name="title_post" class="form-control">
                  <option value="1"{{$posts->is_active == '1' ? 'selected' : ''}}>Publish</option>
                  <option value="0"{{$posts->is_active == '0' ? 'selected' : ''}}>Draft</option>
                </select>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-default">Simpan</button>
            <a href={{route('posts.index')}} class="btn btn-danger" button type="submit">Kembali</a></button>
        </form>
      </div>
      </section>
</div>

@endsection