@extends('admin.admin_master')
@section('title')
كل الرسائل
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
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

            <div class="card-header d-block"> كل الرسائل </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الايميل</th>
                            <th scope="col">الموضوع</th>
                            <th scope="col">الرسالة</th>
                            <th scope="col">زمن الارسال</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($forms as $form)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $form->name }} </td>
                                <td> {{ $form->email }} </td>
                                <td> {{Str::limit($form->subject,20) }}</td>
                                <td> {{ Str::limit($form->message,20) }}</td>
                                <td>
                                    @if($form->created_at ==  NULL)
                                    <span class="text-danger"> لا يوجد وقت الانشاء</span>
                                    @else
                                {{ Carbon\Carbon::parse($form->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.form', $form->id) }}"><i class="fa fa-trash" title="حذف"></i></a>
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
