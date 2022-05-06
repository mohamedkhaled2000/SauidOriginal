@extends('admin.admin_master')
@section('title')
تعديل معلومات الاتصال
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
           <div class="card-header"> تعديل معلومات الاتصال </div>
           <div class="card-body">

            <form action="{{ route('update.contact',$contacts->id) }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="formGroupExampleInput">العنوان</label>
                  <input type="text" name="address" value="{{ $contacts->address }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('address')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">الايميل</label>
                  <input type="email" name="email" value="{{ $contacts->email }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('email')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">رقم الهاتف</label>
                  <input type="text" name="phone" value="{{ $contacts->phone }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  @error('phone')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput">لينك الفيس بوك</label>
                            <input type="text" name="facebook" value="{{ $contacts->facebook }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">

                          </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput">لينك اليوتيوب</label>
                            <input type="text" name="youtube" value="{{ $contacts->youtube }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                          </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput">لينك الانستجرام</label>
                            <input type="text" name="instagram" value="{{ $contacts->instagram }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">

                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput">لينك تويتر</label>
                            <input type="text" name="twitter" value="{{ $contacts->twitter }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                          </div>
                    </div>
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
