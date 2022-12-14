@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i
                                            class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h5 class="box-title">{{ __('admin.student_fee_amount_list') }}</h5>
                                <a href="{{ route('fee.amount.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>{{ __('admin.add_fee_amount') }}</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        {{-- <table id="example1" class="table table-bordered"> --}}
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-center" width="10%">{{ __('admin.sl') }}</th>
                                                <th>{{ __('admin.fee_category') }}</th>
                                                <th class="text-center" width="20%">{{ __('admin.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">{{ __('admin.sl') }}</th>
                                                <th>{{ __('admin.fee_category') }}</th>
                                                <th class="text-center">{{ __('admin.action') }}</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($allData as $key => $amount)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $amount['fee_category']['name']}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('fee.amount.edit',$amount->fee_category_id) }}"
                                                            class="btn btn-primary mb-5">
                                                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="{{ route('fee.amount.details',$amount->fee_category_id) }}"
                                                            class="btn btn-success mb-5">
                                                            <i class="fa fa-eye" aria-hidden="true"></i></a>


                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
