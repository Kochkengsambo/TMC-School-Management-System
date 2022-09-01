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
                                <h3 class="box-title">Student Shift List</h3>
                                <a href="{{ route('student.shift.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>Add Student Shift</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="5%">SL</th>
                                                <th>Name</th>
                                                <th class="text-center" width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th>Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($allData as $key => $shift)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $shift->name }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('student.shift.edit', $shift->id) }}"
                                                            class="btn btn-info mb-5"><i
                                                                class="mdi mdi-account-edit"></i></a>
                                                        <a href="{{ route('student.shift.delete', $shift->id) }}"
                                                            class="btn btn-danger mb-5" id="delete"><i
                                                                class="mdi mdi-account-remove"></i></a>


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
