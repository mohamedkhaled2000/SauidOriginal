@extends('admin.admin_master')
@section('title')
تغير كلمة السر
@endsection
@section('admin')
<div class="card card-default">

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="card-header card-header-border-bottom">
        <h2>تغير كلمة السر</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('passwordUpdate') }}" method="post" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">كلمة السر الحالية</label>
                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password..">
                @error('current_password')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">كلمة السر الجديدة</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password..">
                @error('password')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">ناكيد كلمة السر</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password..">
                @error('password_confirmation')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>


@endsection
