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
                                <h4 class="box-title">Student <strong>Search</strong></h4>
                            </div>

                            <div class="box-body">

                                <form method="GET" action="{{ route('student.year.class.search') }}">

                                    <div class="row">



                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year
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
                                                <h5>Class <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class
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
                                                value="Search">

                                        </div> <!-- End Col md 4 -->




                                    </div><!--  end row -->

                                </form>


                            </div>
                        </div>
                    </div> <!-- // end first col 12 -->

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student List</h3>
                                <a href="{{ route('student.registration.add') }}" style="float: right"
                                    class="btn btn-primary mb-5">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>Add Student</span>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    @if (!@search)
                                        <table id="example1" class="table table-bordered table-striped">
                                            {{-- <thead class="bg-secondary"> --}}
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">SL</th>
                                                    <th>Name</th>
                                                    <th>ID No</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>Code</th>
                                                    @endif
                                                    <th class="text-center" width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">SL</th>
                                                    <th>Name</th>
                                                    <th>ID No</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>Code</th>
                                                    @endif
                                                    <th class="text-center">Action</th>
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
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">SL</th>
                                                    <th>Name</th>
                                                    <th>ID No</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>Code</th>
                                                    @endif
                                                    <th class="text-center" width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">SL</th>
                                                    <th>Name</th>
                                                    <th>ID No</th>
                                                    <th>Roll</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th>Code</th>
                                                    @endif
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($allData as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
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
