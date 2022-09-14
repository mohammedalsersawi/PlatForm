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
            <h4 class="mb-0">المراحل الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">بلايلابيلابي</li>
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
                <b>اضافة مرحلة</b>
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المرحلة</th>
                            <th>slug</th>
                            <th>العمليات</th>

                            {{-- {{ Auth::guard('admin')->user()->name }} --}}


                        </tr>
                    </thead>
                    <tbody>
                        <?php $ii = 0; ?>
                        @foreach ($Grads as $Grad)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $ii }}</td>
                                <td>{{ $Grad->name }}</td>
                                <td>{{ $Grad->slug }}</td>
                                <td>
                                    <button disabled type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Grad->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button disabled type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Grad->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>


                            <!-- edite_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Grad->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل مرحلة
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Grades.update', 'test') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">اسم الحقل:</label>
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control" value="{{ $Grad->Name }}">
                                                        <input type="hidden" id="id" name="id"
                                                            value="{{ $Grad->id }}" class="form-control">
                                                    </div>
                                                </div>


                                                <br><br>
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

                                <div class="">
                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $Grad->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('Grades.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('Grade_tranc.Warning_Grade') }}
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $Grad->id }}">
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

                                </div>
                        @endforeach


                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>
<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    اضافة مرحلة
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Grades.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2"><b>اسم المرحلة</b>
                                :</label>
                            <input id="Name" type="text" disabled name="Name" class="form-control">
                        </div>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلق</button>
                <button disabled type="submit" class="btn btn-success">تاكيد</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
