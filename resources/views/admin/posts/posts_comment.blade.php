@extends('admin.admin_master')
@section('title')
    كل التعليقات
@endsection
@section('admin')
<div class="py-12">
    <div class="container">
     <div class="row">
        <br><br><br>
        <div class="col-md-12">
         <div class="card">

            <div class="card-header d-block"> كل التعليقات </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الايميل</th>
                            <th scope="col">الموقع</th>
                            <th scope="col">التعليق</th>
                            <th scope="col">المنشور</th>
                            <th scope="col">زمن التعليق</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=0; ?>
                            @foreach ($comments as $comment)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td> {{ $comment->name }} </td>
                                <td> {{ $comment->email }} </td>
                                <td> {{ $comment->website }}</td>
                                <td> {{ Str::limit($comment->comment,20) }}</td>
                                <td> {{ $comment->posts->title ?? '' }}</td>
                                <td>
                                    @if($comment->created_at ==  NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-danger" href="{{ route('delete.comment', $comment->id) }}">Delete</a>
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
