@extends('admin.layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('admin.page-header')
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
<div class="row">
    <div class="col-md-12 mb-30">
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
            <a type="button" class="button x-small" href="{{ route('lesson.index') }}">
                <b>كل الدروس</b>
            </a>
            <br><br>
             <div class="card-body">
                <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <label for="">رقم الدرس</label>
                        <select type="text" name="number_lesson" class="form-control"
                            onchange="console.log($(this).val())">
                            <option value="">--رقم الدرس--</option>
                            @foreach ($numberlessons as $numberlesson)
                                <option value="{{ $numberlesson->id }}"> {{ $numberlesson->number }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col">
                        <label for="">المادة</label>
                        <select type="text" name="section_id" class="form-control">
                            <option value="">--المادة--</option>
                            @foreach ($Sections as $Section)
                                <option value="{{ $Section->id }}"> {{ $Section->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="">الوحدة</label>
                        <select type="text" name="name_Unit" class="form-control">
                            <option value="">--الوحدة الدراسية--</option>

                            @foreach ($Units as $Unit)
                                <option value="{{ $Unit->name }}"> {{ $Unit->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="">الصف</label>
                        <select type="text" name="clases_id" class="form-control">
                            <option value="">--الصف--</option>
                            @foreach ($clasess as $clases)
                                <option value="{{ $clases->id }}"> {{ $clases->name }} </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="">عنوان الدرس</label>
                        <input type="text" name="name_lesson" id="" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="">رابط الكويز</label>
                        <input type="text" name="testlinke" id="" class="form-control">
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col">
                        <label for="">المذكرة</label>
                        <input type="file" id="not" name="not" class="form-control">
                    </div>

                    <div class="col">
                        <label for="">حل المذكرة</label>
                        <input type="file" name="not_solve" class="form-control">
                    </div>

                <div class="col">
                    <label for="">الفيديو التعلمي</label>
                    <input type="file" name="video" class="form-control">
                </div>

                </div>



              <div class="row">
                <button type="submit" class="btn btn-success">تاكيد</button>
              </div>





            </form>


                </div>




            </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render


@endsection
