@extends('admin.layouts.master')
@section('css')
    @toastr_css

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">الدروس التعليمة</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('main_tranc.Grades') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('admin.content')

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="{{ route('lesson.create') }}" class="button x-small" >
                <b>اضافة درس</b>
            </a>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الدرس</th>
                            <th>عنوان الدرس</th>
                            <th>المادة</th>
                            <th>الصف</th>
                            <th>الوحدة</th>
                            <th>رابط الكويز</th>

                            <th>العمليات</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->id }}</td>
                                <td>{{ $lesson->number_lesson }}</td>
                                <td>{{ $lesson->name_lesson }}</td>
                                <td>{{ $lesson->section->name }}</td>
                                <td>{{ $lesson->clasess->name }}</td>
                                <td>{{ $lesson->name_Unit }}</td>
                                <td>{{ $lesson->testlinke }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $lesson->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $lesson->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            @include('admin.pages.lesson.edit')

                            <div class="">
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $lesson->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel"> حذف معلومات درس </h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('lesson.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <h4>هل انت متاكد من عملية الحذف</h4>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $lesson->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach


                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->






@endsection

@section('js')

@endsection
