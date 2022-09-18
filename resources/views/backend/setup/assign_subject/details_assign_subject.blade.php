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
                                <h3 class="box-title">Assign Subject Details</h3>
                                <a href="{{ route('assign.subject.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>Add Assign Subject</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <h4><strong>Assign Subject : </strong>{{ $detailsData['0']['student_class']['name'] }}</h4>

                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-success">
                                            <tr>
                                                <th class="text-center" width="5%">SL</th>
                                                <th class="text-center" width="15%">Subject</th>
                                                <th class="text-center" width="15%">Full Mark</th>
                                                <th class="text-center" width="15%">Pass Mark</th>
                                                <th class="text-center" width="15%">Subjective Mark</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center" width="5%">SL</th>
                                                <th class="text-center" width="15%">Subject</th>
                                                <th class="text-center" width="15%">Full Mark</th>
                                                <th class="text-center" width="15%">Pass Mark</th>
                                                <th class="text-center" width="15%">Subjective Mark</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($detailsData as $key => $details)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $details['school_subject']['name'] }}</td>
                                                    <td class="text-center">{{ $details->full_mark }}</td>
                                                    <td class="text-center">{{ $details->pass_mark }}</td>
                                                    <td class="text-center">{{ $details->subjective_mark }}</td>
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
