@extends('admin.admin_master')
@section('title')
تعديل النبذه
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
           <div class="card-header"> تعديل النبذه </div>
           <div class="card-body">

            <form action="{{ route('update.about',$abouts->id) }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="formGroupExampleInput">العنوان</label>
                  <input type="text" name="title" value="{{ $abouts->title }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('title')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">الوصف القصير</label>
                  <input type="text" name="short_dis" value="{{ $abouts->short_dis }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('short_dis')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">الوصف الكبير</label>
                  <input type="text" name="long_dis" value="{{ $abouts->long_dis }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('long_dis')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
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
