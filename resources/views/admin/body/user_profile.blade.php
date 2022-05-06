@extends('admin.admin_master')
@section('title')
الملف الشخصى
@endsection
@section('admin')
<div class="card card-default">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="card-header card-header-border-bottom">
        <h2>الملف الشخصى</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('update_profile') }}" method="post" class="form-pill" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if ($user['profile_photo_path'] == null)
                <img class="rounded" src="{{ Auth::user()->profile_photo_url }}" title="{{Auth::user()->name}}" style="width:120px;height:120px;">
                @else
                <img class="rounded-circle" src="{{ asset($user['profile_photo_path']) }}" title="{{Auth::user()->name}}" style="width:120px;height:120px;">
                @endif
                <input type="file" name="profile_photo_path" class="form-control"  id="current_password" placeholder="Name.." value="{{ $user['name'] }}">
                @error('profile_photo_path')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" name="old_image" value="{{ $user['profile_photo_path'] }}">
                <label for="exampleFormControlInput3">الاسم</label>
                <input type="text" name="name" class="form-control" id="current_password" placeholder="Name.." value="{{ $user['name'] }}">
                @error('name')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">الايميل</label>
                <input type="text" name="email" class="form-control" id="password" placeholder="Email.." value="{{ $user['email'] }}">
                @error('email')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">تحديث</button>
            </div>
        </form>
    </div>
</div>


@endsection
