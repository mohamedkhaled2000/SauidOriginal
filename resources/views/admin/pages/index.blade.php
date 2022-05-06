@extends('admin.admin_master')
@section('title')
كل الصفحات
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <a href="{{ route('add.page') }}"> <button class="btn btn-info">اضافة صفحة جديدة</button>  </a>
        <br><br><br>
        <div class="col-md-12">
         <div class="card">

            @if(session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('deleted') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

            <div class="card-header d-block"> كل الصفحات </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">المحتوى</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">زمن الانشاء</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($pages as $page)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $page->title }} </td>
                                <td> {!! Str::limit($page->content,100) !!} </td>
                                <td> <img src="{{ asset($page->image) }}" alt="{{$page->title}}" title="{{$page->title}}" width="70px"> </td>
                                <td>
                                    @if($page->created_at ==  NULL)
                                    <span class="text-danger"> لا يوجد وقت الانشاء</span>
                                    @else
                                    {{ Carbon\Carbon::parse($page->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('edit.page', $page->id) }}"><i class="fa fa-edit" title="تعديل"></i></a>
                                    <a type="button" class="btn btn-danger btn-sm" id="delete" href="{{ route('delete.page', $page->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{-- {{ $abouts->links() }} --}}
                </div>
            </div>
     </div>
</div>



@endsection
