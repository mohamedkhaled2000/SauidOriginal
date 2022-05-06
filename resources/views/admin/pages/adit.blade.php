@extends('admin.admin_master')
@section('title')
تعديل الصفحة
@endsection
@section('admin')


<div class="py-12">
    <div class="container">
     <div class="row">




     <div class="col-md-8">
      <div class="card">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
           <div class="card-header"> تعديل الصفحة </div>
           <div class="card-body">

            <form action="{{ route('update.page',$page->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">العنوان</label>
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" style="width: 166%">
                    <label for="exampleInputEmail1">المحتوى</label>
                    <textarea id="summernote" name="content">{{$page->content}}</textarea>
                    @error('content')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">الصورة</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('image')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الحالة</label>
                    <select class="form-control" name="status">
                        <option value="0">تعليق</option>
                        <option value="1">نشر</option>
                    </select>
                </div>


            <button type="submit" class="btn btn-primary">تعديل</button>
            </form>

       </div>

    </div>
  </div>



    </div>
  </div>

    </div>

@endsection
