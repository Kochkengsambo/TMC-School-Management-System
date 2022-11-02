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
                                <h5 class="box-title">{{ __('admin.assign_sub_details') }}</h5>
                                <a href="{{ route('assign.subject.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>{{ __('admin.add_assign_sub') }}</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <h6><strong>{{ __('admin.assign_subject') }} : </strong>{{ $detailsData['0']['student_class']['name'] }}</h6>

                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-success">
                                            <tr>
                                                <th class="text-center" width="5%">{{ __('admin.sl') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.subject') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.full_mark') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.pass_mark') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.subjective_mark') }}</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center" width="5%">{{ __('admin.sl') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.subject') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.full_mark') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.pass_mark') }}</th>
                                                <th class="text-center" width="15%">{{ __('admin.subjective_mark') }}</th>
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
