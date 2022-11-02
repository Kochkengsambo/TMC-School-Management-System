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
                        <h5 class="box-title">{{ __('admin.add_fee_amount') }}</h5>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('store.fee.amount') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">

                                                <div class="form-group">
                                                    <h6>{{ __('admin.fee_category') }}<span class="text-danger">*</span></h6>
                                                    <div class="controls">
                                                        <select name="fee_category_id" required=""
                                                            class="form-control">
                                                            <option value="" selected="" disabled="">{{ __('admin.select_fee_category') }}</option>
                                                            @foreach ($fee_categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h6>{{ __('admin.student_class') }}<span class="text-danger">*</span></h6>
                                                            <div class="controls">
                                                                <select name="class_id[]" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        {{ __('admin.select_student_class') }}</option>
                                                                    @foreach ($classes as $class)
                                                                        <option value="{{ $class->id }}">
                                                                            {{ $class->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h6>{{ __('admin.amount') }}<span class="text-danger">*</span></h6>
                                                            <div class="controls">
                                                                <input type="text" name="amount[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-dark addeventmore"><i
                                                                class="fa fa-plus-circle"></i></span>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-success mb-5"
                                                    style="float: left" value="{{ __('admin.submit') }}">
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

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <h6>{{ __('admin.student_class') }}<span class="text-danger">*</span></h6>
                            <div class="controls">
                                <select name="class_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">{{__('admin.select_student_class')}}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach

                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h6>{{ __('admin.amount') }}<span class="text-danger">*</span></h6>
                            <div class="controls">
                                <input type="text" name="amount[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-dark addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event){
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter-=1
            });
        });
    </script>
@endsection
