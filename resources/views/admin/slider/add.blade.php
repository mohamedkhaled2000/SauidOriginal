@extends('admin.admin_master')
@section('title')
اضافة عرض
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

                    <div class="card-header"> اضافة عرض </div>
                    <div class="card-body">
                        <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان العرض</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الوصف</label>
                                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('description')
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

                        <button type="submit" class="btn btn-primary">اضافة</button>
                        </form>

                    </div>
                </div>
            </div>

    </div>
@endsection
