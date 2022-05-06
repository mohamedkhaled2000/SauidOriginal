@extends('admin.admin_master')
@section('title')
تعديل العرض
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
           <div class="card-header"> تعديل العرض </div>
           <div class="card-body">

            <form action="{{ route('update.slider',$sliders->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                  <label for="formGroupExampleInput">عنوان العرض</label>
                  <input type="text" name="title" value="{{ $sliders->title }}" class="form-control" id="formGroupExampleInput" >
                  @error('title')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">الوصف</label>
                  <input type="text" name="description" value="{{ $sliders->description }}" class="form-control" id="formGroupExampleInput" >
                  @error('description')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">الصورة</label>
                  <input type="file" name="image" value="{{ $sliders->image }}" class="form-control" id="formGroupExampleInput2" >
                  @error('image')
                  <span class="text-danger"> {{ $message }}</span>
                 @enderror
                </div>

                <div class="form-group">
                    <img src="{{ asset($sliders->image) }}" alt="{{$sliders->title}}" style="width:400px; height:200px;" title="{{$sliders->title}}">
                </div>

                <button type="submit" class="btn btn-primary">تحديث</button>

              </form>

       </div>

    </div>
  </div>



    </div>
  </div>

    </div>

@endsection
