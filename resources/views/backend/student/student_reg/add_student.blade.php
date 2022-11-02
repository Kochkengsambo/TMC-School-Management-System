@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <h5 class="box-title">{{ __('admin.add_student') }}</h5>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.student_name') }} <span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.father_name') }} <span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.mother_name') }} <span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.gender') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">{{__('admin.select_gender')}}</option>
                                                                <option value="Male">{{ __('admin.male') }}</option>
                                                                <option value="Female">{{ __('admin.female') }}</option>
                                                            </select>
                                                            @error('gender')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.mobile_no') }}<span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.address') }}<span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.religion') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">{{ __('admin.select_religion') }}</option>
                                                                <option value="Buddhism">{{ __('admin.buddhism') }}</option>
                                                                <option value="Jesus Christ">{{ __('admin.jesus_christ') }}</option>
                                                                <option value="Islam">{{ __('admin.islam') }}</option>
                                                            </select>
                                                            @error('religion')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.dob') }}<span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.discount') }}<span class="text-danger">*</span></h6>
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
                                                        <h6>{{ __('admin.year') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="year_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    {{__('admin.select_year')}}</option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year->id }}">
                                                                        {{ $year->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('year_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.class') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="class_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    {{__('admin.select_class')}}</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">
                                                                        {{ $class->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('class_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.group') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="group_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    {{__('admin.select_group')}}</option>
                                                                @foreach ($groups as $group)
                                                                    <option value="{{ $group->id }}">
                                                                        {{ $group->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('group_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h6>{{ __('admin.shift') }}<span class="text-danger">*</span></h6>
                                                        <div class="controls">
                                                            <select name="shift_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    {{ __('admin.select_shift') }}</option>
                                                                @foreach ($shifts as $shift)
                                                                    <option value="{{ $shift->id }}">
                                                                        {{ $shift->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('shift_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>{{ __('admin.pro_img') }}<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img src="{{ url('upload/no_image.jpg') }}" alt=""
                                                                id="showImage"
                                                                style="width: 100px; width:100px; border:1px solid #000000;">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-success mb-5" style="float: right"
                                                    value="{{ __('admin.submit') }}">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
