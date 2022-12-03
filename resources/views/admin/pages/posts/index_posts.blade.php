@extends('admin.layouts.b_main')

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post</h1>
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
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Post</th>
                  <th>Slug</th>
                  <th>Deksripsi</th>
                  <th>Kategori</th>
                  <th>Gambar Post</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              <tbody>
                @foreach ($post as $key=>$posts)
                  <tr>
                    <td>{{$post->firstItem() + $key}}</td>
                    <td>{{$posts->title_post}}</td>
                    <td>{{$posts->slug}}</td>
                    <td>{{$posts->body}}</td>
                    <td>{{$posts->category->title_category}}</td>
                    <td><img src="{{asset('storage/img/'. $posts->picture_post)}}" width="100"></td>
                    <td>{{$posts->is_active}}</td>
                    <td>
                      <a href="{{route ('posts.edit', $posts->id)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form method="post" action="{{route ('posts.destroy', $posts->id)}}" class="d-inline">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                      </button>
                      </form>
                      <a href="" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                  </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer clearfix">
            
            Showing
            {{$post->firstItem()}}
            to
            {{$post->lastItem()}}
            of
            {{$post->total()}}
            entries

            <div class="pagination pagination-sm m-0 float-right">
              {{ $post->links() }}  
            </div>
          </div>
        </div>       
    </section>
    <!-- /.col -->
</div>

@endsection