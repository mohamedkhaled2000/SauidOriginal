@extends('admin.admin_master')
@section('title')
تعديل الارشفة   
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
           <div class="card-header"> تعديل الارشفة </div>
           <div class="card-body">

            <form action="{{ route('update.seo',$seos->id) }}" method="post">
                @csrf

                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text" name="meta_title" value="{{$seos->meta_title}}" class="form-control">
                    @error('meta_title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" style="width: 166%">
                    <label>الكاتب</label>
                    <input type="text" name="meta_author" value="{{$seos->meta_author}}" class="form-control">
                    @error('meta_author')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>الكلمة المفتاحية</label>
                    <input type="text" name="meta_keyword" value="{{$seos->meta_keyword}}" class="form-control">
                    @error('meta_keyword')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>وصف الموقع</label>
                    <textarea type="text" name="meta_description" class="form-control">{{$seos->meta_description}}</textarea>
                    @error('meta_description')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>اسكريبت جوجل</label>
                    <textarea type="text" name="google_analytics" class="form-control">{{$seos->google_analytics}}</textarea>
                    @error('google_analytics')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
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
