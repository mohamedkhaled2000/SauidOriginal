@extends('admin.admin_master')
@section('title')
تعديل خدمة
@endsection
@section('admin')


<div class="py-12">
    <div class="container">
     <div class="row">




     <div class="col-md-8">
      <div class="card">
           <div class="card-header"> تعديل خدمة </div>
           <div class="card-body">

            <form action="{{ route('update.service',$service->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">اسم الخدمة</label>
                    <input type="text" name="name" value="{{ $service->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                  <label for="formGroupExampleInput2">الصورة</label>
                  <input type="file" name="image" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                  @error('image')
                  <span class="text-danger"> {{ $message }}</span>
                 @enderror
                </div>

                <div class="form-group">
                    <img src="{{ asset($service->image) }}" title="{{$service->name}}">
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
