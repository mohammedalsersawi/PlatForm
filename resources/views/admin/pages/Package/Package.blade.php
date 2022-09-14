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
            <h4 class="mb-0"> الحزم</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">الحزم</li>
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
                <b>اضافة حزمة</b>
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الطالب</th>
                            <th>الرقم التسلسي</th>
                            <th>المادة</th>
                            <th>الصف</th>
                            <th>الحالة</th>
                            <th>العمليات</th>

                            {{-- {{ Auth::guard('admin')->user()->name }} --}}


                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Package as $item)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user_id}}</td>
                                <td>{{ $item->sections->name }}</td>
                                <td>{{ $item->classes->name }}</td>
                                <td>
                                    @if ($item->Status === 1)
                                        <label class="badge badge-success"><b>نشط</b></label>
                                    @else
                                        <label class="badge badge-danger"><b>غير نشط</b></label>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $item->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $item->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>


                            @include('admin.pages.Package.edit')



                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('Package.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                <h4><b><i>هل انت متاكد من حذف الحزمة</i></b></h4>
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $item->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">اغلق</button>
                                                    <button type="submit" class="btn btn-danger">تاكيد</button>
                                                </div>
                                            </form>
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
                <form action="{{ route('Package.store') }}" method="POST">
                    @csrf
                    <div class="row">
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
                            <label for="">المادة</label>
                            <select type="text" name="section_id" class="form-control">
                                <option value="">--المادة--</option>
                                @foreach ($Sections as $Section)
                                    <option value="{{ $Section->id }}"> {{ $Section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">المادة</label>
                            <select type="text" name="user_id" class="form-control">
                                <option value="">--اسم الطالب--</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلق</button>
                <button type="submit" class="btn btn-success">تاكيد</button>
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
