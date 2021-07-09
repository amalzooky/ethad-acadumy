@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.top_header.profile') @stop

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <style>
        @media print{
            .no-print, .no-print *{
                display: none !important;
            }
            .print-m-2{
                margin: 0 !important;
            }
        }

        .btn{
            padding: 10px 17px;
            border-radius: 3px;
            background: #f4b71a;
            border: none;
            font-size: 12px;
            margin: 10px 5px;
        }

        .toolbar{
            width: 100vw;
            left: 0;
            text-align: center;
        }

        .cert-container {
            margin:0px 0 10px 0;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .cert {
            width:800px;
            height:600px;
            padding:15px 20px;
            text-align:center;
            position: relative;
            z-index: -1;
        }


        .cert-bg {
            position: absolute;
            left: 0px;
            top: 0;
            z-index: -1;
            width: 100%;
        }
        .cert-bgwat {
            position: absolute;
            right: 0px;
            top: 0;
            width: 103px;
            z-index: -1;
        } .cert-bgerop {
                      position: absolute;
                      left: 229px;
                      top: 0;
                      width: 85px;
                      z-index: -1;
        } .cert-bg1 {
            position: absolute;
            left: 6px;
            z-index: -1;
            width: 120px;
        }.cert-bg2 {
            position: absolute;
             right: 6px;
            z-index: -1;
            width: 120px;
        }

        .cert-content {
            width:100%;
            height:550px;
            text-align:center;

            font-family: 'Cairo', "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;;

        }



        small {
            font-size: 14px;
            line-height: 12px;
        }

        .bottom-txt {
            padding: 12px 5px;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
        }

        .bottom-txt * {
            white-space: nowrap !important;
        }

        .other-font {
            margin-top: 15px;
            font-family: 'Cairo', "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            margin-left: 175px;

        }
        .cegin{
        font-size: 13px;
        font-weight: 600;
            left: 0;
        }
  .cegin2{
        font-size: 13px;
        font-weight: 600;
        }


        .ml-215 {
            margin-left: 215px;
        }
        .crtif {
            padding: 48px 0 0 0;        }
        .cegneture {
            padding: 58px 0 0 0;
        }
        .cert-bgseg1{
            position: relative;
            left: 185px;
            width: 103px;
            z-index: -1;

        } .cert-bgseg2{
                      position: relative;
            width: 103px;
            z-index: -1;
        }
    </style>

    <div class="toolbar no-print">
{{--        <button onclick="window.print()">Print this page</button>--}}

        <button class="btn btn-info" onclick="window.print()">
            Print Certificate
        </button>
{{--        <button class="btn btn-info" id="downloadPDF">Download PDF</button>--}}
    </div>
    <div class="invoice cert-container print-m-1">
        <div id="content2" class="cert">
            <img

                src="{{asset("front/images/certife.jpeg")}}"
                class="cert-bg"
                alt=""
            />
            <div class="cert-content">

            <table style="width: 100%;" >
                <thead>
                <tr>
                    <th>   <img

                            src="{{asset("front/images/logowat.png")}}"
                            class="cert-bgwat"
                            alt=""
                        />  </th>
                    <th>                         <h1 class="other-font">شهاده حضور</h1>
                    </th>
                    <th>  <img

                            src="{{asset("front/images/erop.png")}}"
                            class="cert-bgerop"
                            alt=""
                        /> </th>
                    <th> <img
                            class=""
style="width: 164px;
    left: 13px;
    position: absolute;
    top: 0;"
                            src="{{asset("front/images/karni.jpeg")}}"
                            alt=""
                        /></th>
                </tr>
                </thead>

                <tbody>
                <tr>

                    <td class="text-left"> <img

                            src="{{asset("front/images/logowat.jpeg")}}"
                            class="cert-bg1"
                            alt=""
                        /></td>
                    <td class="unit" style=" padding-top: 33px;">   <span style="font-size: 30px;">    {{$subjects->name ?? ""}}</span>
                        <br /><br />
                        <span class=""
                         style="font-size: 20px;">تشهد أكاديمية الاتحاد الوطني والاكاديمية الاروبيه </span>

                        <br/>
                        <br/>
                        <span style="font-size: 30px;"><b>حضور السيد/{{auth()->user()->full_name}}</b></span>
                        <br />
                        {{--                <small>(For Soldiers)</small>--}}
                        <br />
                        <br />
                        <small style="margin-top: 10px;"
                        >تحت رعاية الاتحاد الوطني لمكافحة الفساد والارهاب ودعم مؤسسات الدوله</small
                        >
                        {{--                        <div class="bottom-txt">--}}
                        {{--                            <span>G-1 DAPE-ARR-SF</span>--}}
                        {{--                            <span>Completed on: April 3, 2020</span>--}}
                        {{--                        </div>--}}
                    </td>
                    <td></td>
                    <td class="tax">  <img

                            src="{{asset("front/images/logowat.jpeg")}}"
                            class="cert-bg2"
                            alt=""
                        /></td>


                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th style="width: 136px;">   <span class="cegin2">رئيس مجلس الادارة</span>
                        <br>
                        <span class="cegin2">العقيد/ رامي الشماخ</span>  </th>
                    <th > <img

                            src="{{asset("front/images/logowat.png")}}"
                            class="cert-bgseg1"
                            alt=""
                        />      </th>


                    <th> <img

                            src="{{asset("front/images/logowat.png")}}"
                            class="cert-bgseg2"
                            alt=""
                        />      </th>

                    <th style="width: 136px;">   <span class="cegin">رئيس مجلس الادارة</span>
                        <br>
                        <span class="cegin">العقيد/ رامي الشماخ</span>  </th>
                </tr>
                </tfoot>


            </table>

        </div>
    </div>



{{--    <div class="container profile">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-status bg-blue"></div>--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">@lang('global.personal_info')</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row"> <!-- Start Row -->--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.full_name") </strong> : {{auth()->user()->full_name}}</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.email") </strong> : {{auth()->user()->email}}</label>--}}
{{--                            </div>--}}
{{--                        </div> <!-- End Row -->--}}

{{--                        <div class="row"> <!-- Start Row -->--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.mobile_number") </strong> : {{!empty(auth()->user()->mobile_number)? auth()->user()->mobile_number : "-"}}</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.telephone_number") </strong> : {{!empty(auth()->user()->telephone_number)? auth()->user()->telephone_number : "-"}}</label>--}}
{{--                            </div>--}}
{{--                        </div> <!-- End Row -->--}}

{{--                        <div class="row"> <!-- Start Row -->--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.date_of_birth") </strong> : {{!empty(auth()->user()->date_of_birth)? auth()->user()->date_of_birth : "-"}}</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.sex") </strong> : {{!empty(auth()->user()->sex)? auth()->user()->sex : "-"}}</label>--}}
{{--                            </div>--}}
{{--                        </div> <!-- End Row -->--}}

{{--                        <div class="row"> <!-- Start Row -->--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <label><strong>@lang("global.facebook_url") </strong> : {{!empty(auth()->user()->facebook_url)? auth()->user()->facebook_url : "-"}}</label>--}}
{{--                            </div>--}}
{{--                        </div> <!-- End Row -->--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="card">--}}
{{--                    <div class="card-status bg-blue"></div>--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">@lang('global.reset_password')</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form class="ajax" method="POST" action="{{route("profile.reset_password")}}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="oldPassword" class="form-label">@lang('global.old_password')</label>--}}
{{--                                <div class="input-icon">--}}
{{--                          <span class="input-icon-addon">--}}
{{--                            <i class="fe fe-git-branch"></i>--}}
{{--                          </span>--}}
{{--                                    <input type="password" class="form-control" id="oldPassword" autocomplete="off" name="oldPassword" placeholder="@lang('global.old_password')"   required >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="newPassword" class="form-label">@lang('global.new_password')</label>--}}
{{--                                <div class="input-icon">--}}
{{--                          <span class="input-icon-addon">--}}
{{--                            <i class="fe fe-git-branch"></i>--}}
{{--                          </span>--}}
{{--                                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="@lang('global.new_password')"  required >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.reset_password')</button>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-12 col-md-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-status bg-blue"></div>--}}
{{--                    <div class="avatar-profile">--}}
{{--                        <img src="{{asset(auth()->user()->avatar)}}">--}}
{{--                        <small class=" d-block mt-3">@if(\Lang::has("dashboard.roles.".auth()->user()->roles[0]->name)) {{__('dashboard.roles.'.auth()->user()->roles[0]->name)}} @else {{auth()->user()->role[0]->name}} @endif</small>--}}
{{--                    </div>--}}
{{--                    <div class="avatar-profile-info">--}}
{{--                        <div class="card-body">--}}
{{--                            <p><strong>@lang("global.logins"): </strong> <span>{{auth()->user()->logins}}</span>  </p>--}}
{{--                            <p> <strong>@lang("global.last_login"): </strong> <span>{{(\Carbon\Carbon::parse(auth()->user()->last_login))}}</span> </p>--}}
{{--                            <p><strong>@lang("global.last_ip"): </strong> <span>{{auth()->user()->last_ip}}</span></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <script>
        $("#downloadPDF").click(function () {
        // $("#content2").addClass('ml-215'); // JS solution for smaller screen but better to add media queries to tackle the issue
        getScreenshotOfElement(
        $("div#content2").get(0),
        0,
        0,
        $("#content2").width() + 45,  // added 45 because the container's (content2) width is smaller than the image, if it's not added then the content from right side will get cut off
        $("#content2").height() + 30, // same issue as above. if the container width / height is changed (currently they are fixed) then these values might need to be changed as well.
        function (data) {
        var pdf = new jsPDF("l", "pt", [
        $("#content2").width(),
        $("#content2").height(),
        ]);

        pdf.addImage(
        "data:image/png;base64," + data,
        "PNG",
        0,
        0,
        $("#content2").width(),
        $("#content2").height()
        );
        pdf.save("azimuth-certificte.pdf");
        }
        );
        });

        // this function is the configuration of the html2cavas library (https://html2canvas.hertzen.com/)
        // $("#content2").removeClass('ml-215'); is the only custom line here, the rest comes from the library.
        function getScreenshotOfElement(element, posX, posY, width, height, callback) {
        html2canvas(element, {
        onrendered: function (canvas) {
        // $("#content2").removeClass('ml-215');  // uncomment this if resorting to ml-125 to resolve the issue
        var context = canvas.getContext("2d");
        var imageData = context.getImageData(posX, posY, width, height).data;
        var outputCanvas = document.createElement("canvas");
        var outputContext = outputCanvas.getContext("2d");
        outputCanvas.width = width;
        outputCanvas.height = height;

        var idata = outputContext.createImageData(width, height);
        idata.data.set(imageData);
        outputContext.putImageData(idata, 0, 0);
        callback(outputCanvas.toDataURL().replace("data:image/png;base64,", ""));
        },
        width: width,
        height: height,
        useCORS: true,
        taintTest: false,
        allowTaint: false,
        });
        }


        </script>
@stop
