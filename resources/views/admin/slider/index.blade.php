@extends('admin.admin_master')
@section('title')
كل العروض
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <a href="{{ route('add.slider') }}"> <button class="btn btn-info">اضافة عرض</button>  </a>
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

            <div class="card-header d-block"> كل العروض </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الوصف</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">زمن الانشاء</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $slider->title }} </td>
                                <td> {{ $slider->description }} </td>
                                <td>
                                    <img src="{{ asset($slider->image) }}" style="height: 40px; width: 70px;" alt="{{$slider->title}}" title="{{$slider->title}}">
                                </td>
                                <td>
                                    @if($slider->created_at ==  NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('edit.slider', $slider->id) }}"><i class="fa fa-edit" title="تعديل"></i></a>
                                    <a type="button" class="btn btn-danger btn-sm" id="delete" href="{{ route('delete.slider', $slider->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $sliders->links() }}
                </div>
            </div>
     </div>
</div>



@endsection
