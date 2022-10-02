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

            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Student</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('store.students.year') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Student Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Father's Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control">
                                                            @error('fname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mname" class="form-control">
                                                            @error('mname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Gender<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                            @error('gender')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Mobile Number<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control">
                                                            @error('mobile')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Address<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Religion<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Religion</option>
                                                                <option value="Buddhism">Buddhism</option>
                                                                <option value="Jesus Christ">Jesus Christ</option>
                                                                <option value="Islam">Islam</option>
                                                            </select>
                                                            @error('religion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Date Of Birth<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control">
                                                            @error('dob')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Discount<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount" class="form-control">
                                                            @error('discount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Year<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Year</option>
                                                                    @foreach ($years as $year)
                                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                            @error('religion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Class<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Class</option>
                                                                    @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                            @error('religion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Group<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Group</option>
                                                                    @foreach ($groups as $group)
                                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                            @error('religion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-success mb-5"
                                                    style="float: right" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
