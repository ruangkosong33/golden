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
                    <a class="nav-link active" href="{{route ('category.create')}}"><i class="fas fa-plus"></i></a>
                </li>
              </ul>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Slug</th>      
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($category as $key=>$categorys)
                <tr>
                  <td>{{$category->firstItem() + $key}}</td>
                  <td>{{$categorys->title_category}}</td>
                  <td>{{$categorys->slug}}</td>
                  <td>
                      <a href="{{route ('category.edit', $categorys->id)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form method="post" action="{{route ('category.destroy', $categorys->id)}}" class="d-inline">
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
            {{$category->firstItem()}}
            to
            {{$category->lastItem()}}
            of
            {{$category->total()}}
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