@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">
        .img_one {
            padding: 2px;
            margin-bottom: 10px;
            box-shadow: 1px 1px 5px #888888;
        }

        .no_margin_bottom {
            margin-bottom: 5px !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-3">
                    </div>

                    <div class="col-6">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title"><strong>Site Profile</strong></h4>
                            </div>

                            <div class="box-body">

                                {{-- <form method="post" action="#"> --}}
                                <form method="post" action="{{ route('siteprofile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        {{-- Site Name --}}
                                        <div class="form-group col-md-12">
                                            <h5>Site Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="site_name" class="form-control"
                                                    value="{{ $siteprofile->site_name }}">
                                                @error('site_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        {{-- Phone Number --}}
                                        <div class="form-group col-md-12">
                                            <h5>Phone Number <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ $siteprofile->phone }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        {{-- Email Address --}}
                                        <div class="form-group col-md-12">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $siteprofile->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        {{-- Address --}}
                                        <div class="form-group col-md-12">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control"
                                                    value="{{ $siteprofile->address }}">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        @php
                                            $logo = '';
                                            $icon = '';
                                            if ($siteprofile) {
                                                if (file_exists($siteprofile->logo)) {
                                                    $logo = asset($siteprofile->logo);
                                                } else {
                                                    $logo = asset('upload/no_image.jpg');
                                                }
                                                if (file_exists($siteprofile->icon)) {
                                                    $icon = asset($siteprofile->icon);
                                                } else {
                                                    $icon = asset('upload/no_image.jpg');
                                                }
                                            } else {
                                                $logo = asset('upload/no_image.jpg');
                                                $icon = asset('upload/no_image.jpg');
                                            }
                                        @endphp

                                        {{-- Logo --}}
                                        <div class="form-group col-md-12">
                                            <h5>Logo <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="file" name="logo" class="form-control" id="logo">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="controls">
                                                {{-- <img id="showLogo" src="{{ url('upload/no_image.jpg') }}"
                                                    style="width: 100px; width: 100px; border: 1px solid #000000;"> --}}

                                                    <img class="img_one" id="img_logo" src="{{ $logo }}" alt="" style="border-radius: 5px;max-height: 100px;">

                                            </div>
                                        </div>
                                        {{-- Icon --}}
                                        <div class="form-group col-md-12">
                                            <h5>Icon <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="file" name="icon" class="form-control" id="icon">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="controls">
                                                {{-- <img id="showIcon" src="{{ url('upload/no_image.jpg') }}"
                                                    style="width: 100px; width: 100px; border: 1px solid #000000;"> --}}

                                                <img class="img_one" id="img_logo" src="{{ $icon }}" alt="" style="border-radius: 5px;max-height: 100px;">

                                            </div>
                                        </div>
                                    </div><!--  end row -->

                                    <div class="pull-right" style="padding-top: 25px;">

                                        <input type="submit" class="btn btn-info btn-dark mb-5" name="search"
                                            value="Save">

                                        {{-- <button type="submit" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save
                                        </button> --}}

                                    </div> <!-- End Col md 4 -->

                                </form>


                            </div>
                        </div>
                    </div> <!-- // end first col 12 -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <script type="text/javascript">
        // Logo Script
        $(document).ready(function() {
            $('#logo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showLogo').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        // Icon Script
        $(document).ready(function() {
            $('#icon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showIcon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
