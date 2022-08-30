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
<!-- row -->
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
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                <b>اضافة درس</b>
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الدرس</th>
                            <th>عنوان الدرس</th>
                            <th>المادة</th>
                            <th>رقم الوحدة</th>
                            <th>رابط الكويز</th>
                            <th>المذكرة</th>
                            <th>حل المذكرة</th>
                            <th>الفيديو</th>
                            <th>العمليات</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($lessons as $lesson)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $lesson->Number_lesson }}</td>
                                <td>{{ $lesson->Name_lesson }}</td>
                                <td>{{ $lesson->section->Name_Material }}</td>
                                <td>{{ $lesson->Name_Unit }}</td>
                                <td>{{ $lesson->Testlinke }}</td>
                                <td>مذكرة</td>
                                <td>حل المذكرة</td>
                                <td>الفيديو</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $lesson->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $lesson->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="">
                                <!-- edite_modal_Grade -->
                                <div class="modal fade" id="edit{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    تعديل بيانات الدرس
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('lesson.update', 'test') }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $lesson->id }}">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="">رقم الدرس</label>
                                                            <select type="text" name="Number_lesson" class="form-control"
                                                                onchange="console.log($(this).val())"> >
                                                                <option value="{{ $lesson->Number_lesson }}">
                                                                    {{ $lesson->Number_lesson }}
                                                                </option>
                                                            </select>
                                                        </div>


                                                        <div class="col">
                                                            <label for="">المادة</label>
                                                            <select type="text" name="Section_id" class="form-control">
                                                                <option value="{{ $lesson->section->id }}">{{ $lesson->section->Name_Material }}</option>
                                                                @foreach ($Sections as $Section)
                                                                    <option value="{{ $Section->id }}"> {{ $Section->Name_Material }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col">
                                                            <label for="">الوحدة</label>
                                                            <select type="text" name="Name_Unit" class="form-control">
                                                                <option value="{{ $lesson->Name_Unit }}">
                                                                    {{ $lesson->Name_Unit }}
                                                                </option>
                                                                @foreach ($Units as $Unit)
                                                                    <option value="{{ $Unit->Name }}"> {{ $Unit->Name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <br>

                                                    <div class="col">
                                                        <label for="">عنوان الدرس</label>
                                                        <input type="text" name="Name_lesson" id="" class="form-control"
                                                            value="{{ $lesson->Name_lesson }}">
                                                    </div>
                                                    <br>


                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="">المذكرة</label>
                                                            <input type="file" name="Not" class="form-control">
                                                        </div>

                                                        <div class="col">
                                                            <label for="">حل المذكرة</label>
                                                            <input type="file" name="Not_solve" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>



                                                    <div class="col">
                                                        <label for="">الفيديو التعلمي</label>
                                                        <input type="file" name="video" class="form-control">
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="">رابط الكويز</label>
                                                            <input type="text" name="Testlinke" id="" class="form-control"
                                                                value="{{ $lesson->Testlinke }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br><br>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلق</button>
                                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <div class="">
                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $lesson->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف معلومات درس
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('lesson.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        حذف معلومات الدرس
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $lesson->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">حذف</button>
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
            <!-- breadcrumb -->


            <!-- add_modal_Grade -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                <b>اضافة درس</b>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="">رقم الدرس</label>
                                        <select type="text" name="Number_lesson" class="form-control"
                                            onchange="console.log($(this).val())"> >
                                            <option value="">--رقم الدرس--</option>
                                            @foreach ($Numberlessons as $Numberlesson)
                                                <option value="{{ $Numberlesson->Name }}"> {{ $Numberlesson->Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col">
                                        <label for="">المادة</label>
                                        <select type="text" name="Section_id" class="form-control">
                                            <option value="">--المادة--</option>
                                            @foreach ($Sections as $Section)
                                                <option value="{{ $Section->id }}"> {{ $Section->Name_Material }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="">الوحدة</label>
                                        <select type="text" name="Name_Unit" class="form-control">
                                            <option value="">--الوحدة الدراسية--</option>
                                            @foreach ($Units as $Unit)
                                                <option value="{{ $Unit->Name }}"> {{ $Unit->Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <br>

                                <div class="col">
                                    <label for="">عنوان الدرس</label>
                                    <input type="text" name="Name_lesson" id="" class="form-control">
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <label for="">المذكرة</label>
                                        <input type="file" name="Not" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="">حل المذكرة</label>
                                        <input type="file" name="Not_solve" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                  <div class="col">
                                    <label for="">رابط الكويز</label>
                                    <input type="text" name="Testlinke" id="" class="form-control">
                                  </div>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="">الفيديو التعلمي</label>
                                    <input type="file" name="video" class="form-control">
                                </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-success">تاكيد</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>








        @endsection

        @section('js')

        @endsection
