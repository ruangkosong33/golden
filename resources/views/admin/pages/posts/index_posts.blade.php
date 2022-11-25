@extends('admin.layouts.b_main')

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route ('posts.create')}}"><i class="fas fa-plus"></i></a>
                </li>
              </ul>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body py-0">
            <table class="card-body py-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Post</th>
                        <th>Isi Post</th>
                        <th>Kategori</th>
                        <th>Gambar Post</th>
                        <th>Status</th>
                    </tr>
                </thead>
                  <tbody>
                    @foreach ($post as $posts)
                      <tr>
                        <td>{{$posts->title_post}}</td>
                        <td>{{$posts->slug}}</td>
                        <td>{{$posts->$category_id->title_category}}</td>
                        <td>{{$posts->picture_post}}</td>
                      </tr>
                    @endforeach
                  </tbody>
            </table>
          <div class="card-footer clearfix">
            
            Showing
            {{$post->firstItem()}}
            to
            {{$post->lastItem()}}
            of
            {{$post->total()}}
            entries

            <div class="pagination pagination-sm m-0 float-right">
              {{ $category->links() }}   
            </div>
          </div>
        </div>       
    </section>
    <!-- /.col -->
</div>

@endsection