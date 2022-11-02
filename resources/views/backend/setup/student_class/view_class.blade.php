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
                                <h5 class="box-title">{{ __('admin.student_class_list') }}</h5>
                                <a href="{{ route('student.class.add') }}" style="float: right" class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i> {{ __('admin.add_student_class') }}</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-center" width="10%">{{ __('admin.sl') }}</th>
                                                <th>{{ __('admin.name') }}</th>
                                                <th class="text-center" width="20%">{{ __('admin.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">{{ __('admin.sl') }}</th>
                                                <th>{{ __('admin.name') }}</th>
                                                <th class="text-center">{{ __('admin.action') }}</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($allData as $key => $student)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('student.class.edit', $student->id) }}"
                                                            class="btn btn-primary mb-5">
                                                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="{{ route('student.class.delete', $student->id) }}"
                                                            class="btn btn-danger mb-5" id="delete">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i></a>


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
