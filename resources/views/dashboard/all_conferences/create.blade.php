@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.latestnews.create') @stop

@section('content')
<style>
    #sel_subj{
        display:block  !important;
        width:100%

    }
</style>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">انشاء المؤتمر</h3>
                        <div class="card-options">
                            <a href="{{ route('allconference.index') }}"><button class="btn btn-info pull-left">المؤتمرات <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{route('allconference.store')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">أسم المؤتمر</label>
                                        <input type="text" class="form-control" id="name" name="name_confer" placeholder="اسم المؤتمر"  required autofocus>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="active_date" class="form-label">التاريخ </label>
                                        <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-calendar"></i>
                                    </span>
                                            <input   type="text" class="date-picker form-control" id="" name="date_confer" placeholder="التاريخ" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-body">

                                    <h4 class="form-section"><i class="ft-home"></i> اضافه دكتور</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group col-12 mb-2 contact-repeater">
                                                        <label for="projectinput2"> اسم الدكتور </label>
                                                        <div data-repeater-list="subject">
                                                            <div class="input-group mb-1"
                                                                 data-repeater-item="subject">


                                                                <select name="doctors_id" class="form-control" id="sel_doc" style="width: 30%;">
                                                                    <option value="">اختر التخصص</option>
                                                                    @if(!empty($alldocs) && count($alldocs) > 0)
                                                                        @foreach($alldocs as $alldoc)
                                                                            <option value="{{$alldoc->id}}">{{$alldoc->doct_name}}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled>ليس هناك تخصصات</option>
                                                                    @endif
                                                                </select>
                                                                <select name="job_doc" id="sel_job"  style='display:block !important;' class="form-control">
                                                                    <option value="">اختر الماده</option>
                                                                </select>
                                                                <input class="form-control" style="width: 30%;" type="text" name="" placeholder=" أسم الدكتور">

                                                                <span class="input-group-append" id="button-addon2">
                                                                    <button class="btn btn-danger" type="button" data-repeater-delete=""><i class="ft-x"></i></button>
                                                                        </span>
                                                                <hr size="8" width="90%" color="#000">

                                                            </div>
                                                        </div>
                                                        <button type="button" data-repeater-create=""
                                                                class="btn btn-primary">
                                                            <i class="ft-plus"></i> أضافة ماده
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                        </form>


                    </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-----------------subject-------------------------------------->


    <script>
        $(document).ready(function(){

            $('#sel_doc').change(function(){
                $('#sel_job').empty();

                var id = $( "#sel_doc" ).val();
                console.log(id);
                $.ajax({
                    url: 'divdoc/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        var len = 0;
                        if(response['sub'] != null){
                            len = response['sub'].length;
                        }
                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){
                                // var id = response['data'][i].id;
                                var id = response['sub'][i].id; // subject id
                                var name = (response['sub'][i].name) ; // subject name
                                var option = "<option value='"+id+"'>"+doct_job+"</option>";
                                $("#sel_job").append(option);
                                //  $('#sub').append(sub);
                            }
                        }
                    }
                }); //end ajax
            });//end on change
        });
    </script>

@endsection
