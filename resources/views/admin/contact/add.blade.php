@extends('admin.admin_master')
@section('title')
اضافة معلومات الاتصال
@endsection
@section('admin')
    <div class="py-12">
        <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
            <div class="col-md-12">

                    <div class="card-header"> اضافة معلومات الاتصال </div>
                    <div class="card-body">
                        <form action="{{ route('store.contact') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">العنوان</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('address')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الايميل</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('phone')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">اضافة</button>
                        </form>

                    </div>
                </div>
            </div>

    </div>
@endsection
