@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('')
<!-- breadcrumb -->
@section('PageTitle')
    <b>اضافة مادة</b>
@stop
<!-- breadcrumb -->
@endsection

@section('admin.content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    <b>اضافة مادة</b></a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr class="text-dark">
                            <th>ID</th>
                            <th>اسم المادة</th>
                            <th>Slug</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Sections as $Section)
                            <tr>

                                <td>{{ $Section->id }}</td>
                                <td>{{ $Section->name }}</td>
                                <td>{{ $Section->slug }}

                                <td>
                                    <button disabled type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Section->id }}"
                                        title="{{ trans('Grade_tranc.Edit') }}"><i class="fa fa-edit"></i></button>

                                    <button disabled type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Section->id }}"
                                        title="{{ trans('Grade_tranc.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>

                        @endforeach
                    </tbody>
                </table>
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
