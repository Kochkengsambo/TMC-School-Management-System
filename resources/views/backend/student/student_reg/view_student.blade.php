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
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h5 class="box-title">{{ __('admin.student') }} <strong>{{ __('admin.search') }}</strong></h5>
                            </div>

                            <div class="box-body">

                                <form method="GET" action="{{ route('student.year.class.search') }}">

                                    <div class="row">



                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h6>{{ __('admin.year') }} <span class="text-danger"> </span></h6>
                                                <div class="controls">
                                                    <select name="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">{{ __('admin.select_year') }}
                                                        </option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}"
                                                                {{ @$year_id == $year->id ? 'selected' : '' }}>
                                                                {{ $year->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 4 -->




                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h6>{{ __('admin.class') }} <span class="text-danger"> </span></h6>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">{{ __('admin.select_class') }}
                                                        </option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}"
                                                                {{ @$class_id == $class->id ? 'selected' : '' }}>
                                                                {{ $class->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 4 -->


                                        <div class="col-md-4" style="padding-top: 25px;">

                                            {{-- <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                value="Search"> --}}
                                            <input type="submit" class="btn btn-success mb-5" name="search"
                                                value="{{ __('admin.search') }}">
                                                {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}

                                                {{-- <div class="clearfix">
                                                    <button type="button" class="btn btn-success mb-5" name="search"><i class="fa fa-edit" aria-hidden="true"></i>Default</button>

                                                </div> --}}

                                        </div> <!-- End Col md 4 -->




                                    </div><!--  end row -->

                                </form>


                            </div>
                        </div>
                    </div> <!-- // end first col 12 -->

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('admin.student_list') }}</h3>
                                <a href="{{ route('student.registration.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>{{ __('admin.add_student') }}</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    @if (!@search)
                                        <table id="example1" class="table table-bordered table-striped">
                                            {{-- <thead class="bg-secondary"> --}}
                                            <thead class="bg-secondary">
                                                <tr>
                                                    <th class="text-center" width="10%">{{ __('admin.sl') }}</th>
                                                    <th>{{ __('admin.name') }}</th>
                                                    <th>{{ __('admin.id_no') }}</th>
                                                    <th>{{ __('admin.roll') }}</th>
                                                    <th>{{ __('admin.year') }}</th>
                                                    <th>{{ __('admin.class') }}</th>
                                                    <th>{{ __('admin.img') }}</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>{{ __('admin.code') }}</th>
                                                    @endif
                                                    <th class="text-center" width="20%">{{ __('admin.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">{{ __('admin.sl') }}</th>
                                                    <th>{{ __('admin.name') }}</th>
                                                    <th>{{ __('admin.id_no') }}</th>
                                                    <th>{{ __('admin.roll') }}</th>
                                                    <th>{{ __('admin.year') }}</th>
                                                    <th>{{ __('admin.class') }}</th>
                                                    <th>{{ __('admin.img') }}</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>{{ __('admin.code') }}</th>
                                                    @endif
                                                    <th class="text-center">{{ __('admin.action') }}</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($allData as $key => $value)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td> {{ $value['student']['name'] }}</td>
                                                        <td> {{ $value['student']['id_no'] }}</td>
                                                        <td> {{ $value->roll }} </td>
                                                        <td> {{ $value['student_year']['name'] }}</td>
                                                        <td> {{ $value['student_class']['name'] }}</td>
                                                        <td>
                                                            <img src="{{ !empty($value['student']['image']) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                style="width: 60px; width: 60px;">
                                                        </td>
                                                        <td> {{ $value->year_id }}</td>
                                                        <td class="text-center">
                                                            <a title="Edit"
                                                            href="{{ route('student.registration.edit', $value->student_id) }}"
                                                            class="btn btn-info"> <i class="fa fa-edit"></i> </a>

                                                        <a title="Promotion"
                                                            href="{{ route('student.registration.promotion', $value->student_id) }}"
                                                            class="btn btn-primary"><i class="fa fa-check"></i></a>

                                                        <a target="_blank" title="Details"
                                                            href="{{ route('student.registration.details', $value->student_id) }}"
                                                            class="btn btn-danger"><i class="fa fa-eye"></i></a>


                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    @else
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-secondary">
                                                <tr>
                                                    <th class="text-center" width="10%">{{ __('admin.sl') }}</th>
                                                    <th>{{ __('admin.name') }}</th>
                                                    <th>{{ __('admin.id_no') }}</th>
                                                    <th>{{ __('admin.roll') }}</th>
                                                    <th>{{ __('admin.year') }}</th>
                                                    <th>{{ __('admin.class') }}</th>
                                                    <th>{{ __('admin.img') }}</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>{{ __('admin.code') }}</th>
                                                    @endif
                                                    <th class="text-center" width="20%">{{ __('admin.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">{{ __('admin.sl') }}</th>
                                                    <th>{{ __('admin.name') }}</th>
                                                    <th>{{ __('admin.id_no') }}</th>
                                                    <th>{{ __('admin.roll') }}</th>
                                                    <th>{{ __('admin.year') }}</th>
                                                    <th>{{ __('admin.class') }}</th>
                                                    <th>{{ __('admin.img') }}</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>{{ __('admin.code') }}</th>
                                                    @endif
                                                    <th class="text-center">{{ __('admin.action') }}</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($allData as $key => $value)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td> {{ $value['student']['name'] }}</td>
                                                        <td> {{ $value['student']['id_no'] }}</td>
                                                        <td> {{ $value->roll }} </td>
                                                        <td> {{ $value['student_year']['name'] }}</td>
                                                        <td> {{ $value['student_class']['name'] }}</td>
                                                        <td>
                                                            <img src="{{ !empty($value['student']['image']) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                style="width: 60px; width: 60px;">
                                                        </td>
                                                        <td> {{ $value->year_id }}</td>
                                                        <td>
                                                            <a title="Edit"
                                                                href="{{ route('student.registration.edit', $value->student_id) }}"
                                                                class="btn btn-primary"> <i class="fa fa-edit"></i> </a>

                                                            <a title="Promotion"
                                                                href="{{ route('student.registration.promotion', $value->student_id) }}"
                                                                class="btn btn-info"><i class="fa fa-fw fa-check-square-o"></i></a>

                                                            <a target="_blank" title="Details"
                                                                href="{{ route('student.registration.details', $value->student_id) }}"
                                                                class="btn btn-success"><i class="fa fa-eye"></i></a>

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    @endif
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
