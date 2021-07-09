@extends('dashboard.layouts.base')

@section('title') تقرير مشاهدة التسجيلات @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">تقرير مشاهدة التسجيلات</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('reports.watching.result')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div class="form-group">
                                    <label for="student" class="form-label">البحث عن طالب</label>
                                    <div class="input-icon">  
                                        <select required name="student"  id="student" class="students-select2-search form-control"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 align-self-center">
                                <button type="submit" class="btn btn-primary btn-block">بحث</button>
                            </div>
                        </div>

                        
                    </form>
                    <div class="table-responsive-sm mt-5">
                            <table class="table table-bordered table-striped hover datatable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>إسم الطالب</th>
                                        <td>المحاضرة</td>
                                        <td>wiziq</td>
                                        <td>webiner</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($watchingRecorded as $index => $item)
                                  
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$item->student->user->full_name}}</td>
                                            <td>{{$item->virtualClassroom->title}}</td>
                                            <td>{{$item->wiziq_counter}}-مرات</td>
                                            <td>{{$item->webinar_counter}}-مرات</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection