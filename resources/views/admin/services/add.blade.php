@extends('admin.admin_master')

@section('title')
اضافة خدمة
@endsection
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="col-md-12">

                    <div class="card-header"> اضافة خدمة </div>
                    <div class="card-body">
                        <form action="{{ route('store.service') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم الخدمة</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
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

