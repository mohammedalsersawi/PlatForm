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
            <h4 class="mb-0"> الطلاب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">الطلاب</li>
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
            <button  type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                <b>اضافة طالب</b>
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>الرقم التسلسلي</th>
                            <th>الاسم</th>
                            <th>الايمل</th>
                            <th>الهاتف</th>
                            <th>الحالة</th>
                            <th>الطالب</th>
                            <th>العمليات</th>
                            {{-- {{ Auth::guard('admin')->user()->name }} --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    @if ($user->Status === 1)
                                        <label class="badge badge-success"><b>نشط</b></label>
                                    @else
                                        <label class="badge badge-danger"><b>غير نشط</b></label>
                                    @endif
                                </td>
                                <td class="badge badge-warning">طالب</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $user->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $user->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="">
                                <!-- edite_modal_Grade -->
                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">تعديل مرحلة</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('getusers.update', 'test') }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" id="id" name="id"
                                                        value="{{ $user->id }}" class="form-control">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name">اسم الطالب</label>
                                                                <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="email">بريد الطالب</label>
                                                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="password">كلمة السر</label>
                                                                <input type="password" value="{{ $user->password }}" name="password" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="mobile">رقم الطالب</label>
                                                                <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                    @if ($user->Status === 1)
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"
                                                                        aria-label="Checkbox for following text input"
                                                                        checked name="Status">
                                                                </div>
                                                            </div>
                                                            <input type="text" disabled value=" الغاء تفعيل"
                                                                class="form-control"
                                                                aria-label="Text input with checkbox">
                                                        </div>
                                                    @else
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"
                                                                        aria-label="Checkbox for following text input"
                                                                        name="Status">
                                                                </div>
                                                            </div>
                                                            <input type="text" disabled value=" تفعيل"
                                                                class="form-control"
                                                                aria-label="Text input with checkbox">
                                                        </div>
                                                    @endif

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

                                {{-- <div class="">
        <!-- delete_modal_Grade -->
        <div class="modal fade" id="delete{{ $Grad->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                           حذف مرحلة
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Grades.destroy', 'test') }}" method="post">
                            {{ method_field('Delete') }}
                            @csrf
                            {{ trans('Grade_tranc.Warning_Grade') }}
                            <input id="id" type="hidden" name="id" class="form-control"
                                value="{{ $Grad->id }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">اغلق</button>
                                <button type="submit"
                                    class="btn btn-danger">تاكيد</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- add_modal_Grade -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                اضافة طالب
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="name">اسم الطالب</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="email">بريد الطالب</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="password">كلمة السر</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="mobile">رقم الطالب</label>
                                        <input type="text" name="mobile" class="form-control">
                                    </div>
                                </div>
                                <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلق</button>
                            <button  type="submit" class="btn btn-success">تاكيد</button>
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
