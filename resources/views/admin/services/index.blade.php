@extends('admin.admin_master')
@section('title')
كل الخدمات
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <a href="{{ route('add.service') }}"> <button class="btn btn-info">اضافة خدمة</button>  </a>
        <br><br><br>
        <div class="col-md-12">
         <div class="card">

            <div class="card-header d-block"> كل الخدمات </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الخدمة</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $service->name }} </td>
                                <td>
                                    <img src="{{ asset($service->image) }}" style="height: 40px; width: 70px;">
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('edit.service', $service->id) }}"><i class="fa fa-edit" title="تعديل"></i></a>
                                    <a type="button" id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.service', $service->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

        </div>
     </div>
</div>



@endsection
