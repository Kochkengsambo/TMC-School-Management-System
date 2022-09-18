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
                                <h3 class="box-title">Student Group List</h3>
                                <a href="{{ route('student.group.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>Add Student Group</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="bg-secondary">
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
                                            @foreach ($allData as $key => $group)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $group->name }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('student.group.edit', $group->id) }}"
                                                            class="btn btn-primary mb-5"><i
                                                                class="mdi mdi-account-edit"></i>Edit</a>
                                                        <a href="{{ route('student.group.delete', $group->id) }}"
                                                            class="btn btn-danger mb-5" id="delete"><i
                                                                class="mdi mdi-account-remove"></i>Delete</a>


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
