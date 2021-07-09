@extends('dashboard.layouts.base')

@section('title') النتجية @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    @if(count($result))
                    <h3 class="card-title">نتيجة الطالب :{{$student_name->student->user->full_name}}</h3>
                    @endif
                  </div>
                  <div class="card-body">
                    @if(count($result))
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>المحاضرة</td>
                                    <td>wiziq</td>
                                    <td>webiner</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $index => $item)
                              
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$item->virtualClassroom->title}}</td>
                                        <td>{{$item->wiziq_counter}}</td>
                                        <td>{{$item->webinar_counter}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h1 class="text-center">لا يوجد نتيجة</h1>
                    @endif
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection