@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                    <div class="col-xl-12 mb-30">
                            <div class="card-body">
                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"><b>اضافة طالب</b></a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الطالب</th>
                                            <th>البريد الالكتروني</th>
                                            {{-- <th>كلمة المرور</th> --}}
                                            <th>رقم الجوال</th>
                                            <th>المرحلة</th>
                                            <th>الحالة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->Name}}</td>
                                            <td>{{$student->Email}}</td>
                                            {{-- <td>{{$student->Password}}</td> --}}
                                            <td>{{$student->mobile}}</td>
                                            <td>{{$student->Name_grade}}</td>
                                            <td>
                                                @if ($student->Status === 1)
                                                    <label
                                                        class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                @else
                                                    <label
                                                        class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                @endif

                                            </td>
                                            <td>

                                                <a href="#"
                                                    class="btn btn-outline-info btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#edit{{ $student->id }}">{{ trans('Sections_trans.Edit') }}</a>

                                            </td>
                                            </tr>

                                              <!--تعديل قسم جديد -->
                                              <div class="modal fade"
                                              id="edit{{ $student->id }}"
                                              tabindex="-1" role="dialog"
                                              aria-labelledby="exampleModalLabel"
                                              aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title"
                                                              style="font-family: 'Cairo', sans-serif;"
                                                              id="exampleModalLabel">
                                                              {{ trans('Sections_trans.edit_Section') }}
                                                          </h5>
                                                          <button type="button"
                                                              class="close"
                                                              data-dismiss="modal"
                                                              aria-label="Close">
                                                              <span
                                                                  aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">

                                                          <form
                                                              action="{{ route('Students.update', 'test') }}"
                                                              method="POST">
                                                              {{ method_field('patch') }}
                                                              {{ csrf_field() }}
                                                              <div class="col">
                                                                <div class="form-check">

                                                                    @if ($student->Status === 1)
                                                                        <input
                                                                            type="checkbox"
                                                                            checked
                                                                            class="form-check-input"
                                                                            name="Status"
                                                                            id="exampleCheck1">
                                                                    @else
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input"
                                                                            name="Status"
                                                                            id="exampleCheck1">
                                                                    @endif
                                                                    <label
                                                                        class="form-check-label"
                                                                        for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                </div>
                                                            </div>

                                                      <div class="modal-footer">
                                                          <button type="button"
                                                              class="btn btn-secondary"
                                                              data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                          <button type="submit"
                                                              class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                      </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>




                                        @endforeach
                                    </table>
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
