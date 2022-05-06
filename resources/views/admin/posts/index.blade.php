@extends('admin.admin_master')
@section('title')
كل المقالات 
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <a href="{{ route('add.post') }}"> <button class="btn btn-info">اضافة مقالة</button>  </a>
        <br><br><br>
        <div class="col-md-12">
         <div class="card">

            <div class="card-header d-block"> كل المقالات </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">الوصف القصير</th>
                            <th scope="col">المحتوى</th>
                            <th scope="col">النوع</th>
                            <th scope="col">الصفحة التابعة</th>
                            <th scope="col">الحالة</th>
                            <th scope="col">زمن الانشاء</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $post->title }} </td>
                                <td>
                                    <img src="{{ asset($post->image) }}" style="height: 40px; width: 70px;">
                                </td>
                                <td> {{ $post->short_title }} </td>
                                <td> {!! Str::limit($post->content,10) !!} </td>
                                <td> {{ $post->type == 1 ? 'مقالة' : 'صفحة' }} </td>
                                <td> {{ $post->page_id != null ? $post->page->title : 'لا يوجد صفحة تابعة لها' }} </td>
                                <td>
                                    @if ($post->val_status == 1)
                                        <span class="badge bg-success">{{ $post->status }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $post->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->created_at ==  NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('edit.post', $post->id) }}"><i class="fa fa-edit" title="تعديل"></i></a>
                                    <a type="button" id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.post', $post->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>
                {{ $posts->links('vendor.pagination.default') }}
        </div>
     </div>
</div>



@endsection
