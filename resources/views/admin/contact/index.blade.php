@extends('admin.admin_master')
@section('title')
كل معلومات الاتصال
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <a href="{{ route('add.contact') }}"> <button class="btn btn-info">اضافة معلومات الاتصال</button>  </a>
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

            <div class="card-header d-block"> كل معلومات الاتصال </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الايميل</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">الفيس بوك</th>
                            <th scope="col">اليوتيوب</th>
                            <th scope="col">تويتر</th>
                            <th scope="col">انستجرام</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $contact->address }} </td>
                                <td> {{ $contact->email }} </td>
                                <td> {{ $contact->phone }}</td>
                                <td> {{ $contact->facebook }}</td>
                                <td> {{ $contact->youtube }}</td>
                                <td> {{ $contact->twitter }}</td>
                                <td> {{ $contact->instagram }}</td>
                                <td>
                                    @if($contact->created_at ==  NULL)
                                    <span class="text-danger"> لا يوجد وقت الانشاء</span>
                                    @else
                                {{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('edit.contact', $contact->id) }}"><i class="fa fa-edit" title="تعديل"></i></a>
                                    <a type="button" id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.contact', $contact->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
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
