@extends('admin.admin_master')

@section('title')
اضافة مقالة
@endsection
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="col-md-12">

                    <div class="card-header"> اضافة مقالة </div>
                    <div class="card-body">
                        <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">العنوان</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الوصف القصير</label>
                                <input type="text" name="short_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('short_title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">المحتوى</label>
                                {{-- <textarea name="contacts" id="editor">
                                    &lt;p&gt;This is some sample content.&lt;/p&gt;
                                </textarea> --}}
                                <div id="toolbar-container"></div>
                                <textarea id="e" name="content"></textarea>

                                @error('content')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">النوع المقالة</label>
                                <select class="form-control" name="type" id="exampleFormControlSelect3">
                                    <option value="1">مقالة</option>
                                    <option value="2">صفحة فرعية</option>
                                </select>
                                @error('type')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pages">اختر الصفحة التابعة لها</label>
                                <select class="form-control" name="page_id" id="pages">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">الحالة</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect3">
                                    <option value="1">نشر</option>
                                    <option value="2">تعليق</option>
                                </select>
                                @error('status')
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
                            $("select[name='page_id']").empty();
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

