@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h5 class="box-title">{{ __('admin.student') }} <strong>{{ __('admin.reg_fee') }}</strong>
                                </h5>
                            </div>

                            <div class="box-body">

                                {{-- <form method="post" action="{{ route('roll.generate.store') }}">
                                    @csrf --}}
                                <div class="row">



                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h6>Year <span class="text-danger"> </span></h6>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">
                                                        {{ __('admin.select_year') }}
                                                    </option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->




                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h6>{{ __('admin.class') }} <span class="text-danger"> </span></h6>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">
                                                        {{ __('admin.select_class') }}
                                                    </option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->


                                    <div class="col-md-4" style="padding-top: 25px;">

                                        <a id="search" class="btn btn-success" name="search">
                                            {{ __('admin.search') }}</a>

                                    </div> <!-- End Col md 4 -->
                                </div><!--  end row -->


                                <!--  ////////////////// Registration Fee table /////////////  -->


                                {{-- <div class="row d-none" id="roll-generate">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('admin.id_no') }}</th>
                                                        <th>{{ __('admin.student_name') }} </th>
                                                        <th>{{ __('admin.father_name') }} </th>
                                                        <th>{{ __('admin.gender') }}</th>
                                                        <th>{{ __('admin.roll') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="roll-generate-tr">

                                                </tbody>

                                            </table>

                                        </div>

                                    </div> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="DocumentResults">

                                            <script id="document-template" type="text/x-handlebars-template">

                                        <table class="table table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                           @{{{thsource}}}
                                            </tr>
                                         </thead>
                                         <tbody>
                                             @{{#each this}}
                                             <tr>
                                                 @{{{tdsource}}}
                                             </tr>
                                             @{{/each}}
                                         </tbody>
                                        </table>
                                       </script>



                                        </div>
                                    </div>

                                </div>

                                {{-- <input type="submit" class="btn btn-primary" value="{{ __('admin.roll_generator') }}"> --}}


                                {{-- </form> --}}


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>


    <script type="text/javascript">
        $(document).on('click','#search',function(){
          var year_id = $('#year_id').val();
          var class_id = $('#class_id').val();
           $.ajax({
            url: "{{ route('student.registration.fee.classwise.get')}}",
            type: "get",
            data: {'year_id':year_id,'class_id':class_id},
            beforeSend: function() {
            },
            success: function (data) {
              var source = $("#document-template").html();
              var template = Handlebars.compile(source);
              var html = template(data);
              $('#DocumentResults').html(html);
              $('[data-toggle="tooltip"]').tooltip();
            }
          });
        });

      </script>
@endsection
