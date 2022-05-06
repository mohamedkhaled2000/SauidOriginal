@extends('admin.admin_master')
@section('title')
تعديل مقالة
@endsection
@section('admin')


<div class="py-12">
    <div class="container">
     <div class="row">




     <div class="col-md-8">
      <div class="card">
           <div class="card-header"> تعديل مقالة </div>
           <div class="card-body">

            <form action="{{ route('update.post',$posts->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="old_image" value="{{ $posts->image }}">
                    <label for="exampleInputEmail1">العنوان</label>
                    <input type="text" name="title" value="{{ $posts->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الوصف القصير</label>
                    <input type="text" name="short_title" value="{{ $posts->short_title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('short_title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="width:166%">
                    <label for="exampleInputEmail1">المحتوى</label>
                    {{-- <textarea name="contacts" id="editor">
                        &lt;p&gt; {!! $posts->contacts !!} &lt;/p&gt;
                    </textarea> --}}
                    <textarea id="e" name="content">{!! $posts->content !!}</textarea>

                   @error('content')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">النوع المقالة</label>
                    <select class="form-control" name="type" id="exampleFormControlSelect3">
                        <option value="1" {{$posts->type == 1 ? 'selected' : ''}}>مقالة</option>
                        <option value="2" {{$posts->type == 2 ? 'selected' : ''}}>صفحة فرعية</option>
                    </select>
                    @error('type')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pages">اختر الصفحة التابعة لها</label>
                    <select class="form-control" name="page_id" id="pages">
                        @foreach ($pages as $page)
                            <option value="{{$page->id}}" {{$page->id == $posts->page_id ? 'selected' : ''}}>{{$page->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect3">الحالة</label>
                    <select class="form-control" name="status"  id="exampleFormControlSelect3">
                        <option value="1" {{$posts->val_status == 1 ? 'selected' : ''}}>نشر</option>
                        <option value="2" {{$posts->val_status == 2 ? 'selected' : ''}}>تعليق</option>
                    </select>
                    @error('status')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">الصورة</label>
                  <input type="file" name="image" value="{{ $posts->image }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                  @error('image')
                  <span class="text-danger"> {{ $message }}</span>
                 @enderror
                </div>

                <div class="form-group">
                    <img src="{{ asset($posts->image) }}" style="width:400px; height:200px;" >
                </div>

                <button type="submit" class="btn btn-primary">تحديث</button>

              </form>

       </div>

    </div>
  </div>



    </div>
  </div>

    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
            ClassicEditor
                .create( document.querySelector( '#e' ),{
                    ckfinder:{
                        uploadUrl:"{{ route('post.images.store').'?_token='.csrf_token() }}"
                    }
                } )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $("select[name='type']").on('change',function(){
            var type = $(this).val();
            $("select[name='page_id']").empty();

            if(type){
                $.ajax({
                    url: "/" + type,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        var d = $("select[name='page_id']").empty();
                        $.each(data,function(key,value){
                            $("select[name='page_id']").append('<option value="'+value.id+'">'+value.title+'</option>');
                        });
                    }
                });
            }else{
                alert('danger');
            }
        });
    });
    </script>
@endsection
