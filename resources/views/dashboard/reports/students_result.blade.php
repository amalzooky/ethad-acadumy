@extends('dashboard.layouts.base')

@section('title') النتجية @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">نتيجة البحث من تاريخ {{$f}} إلي تاريخ {{$t}}</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm mt-5">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>إسم الطالب</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $student)
                                    <tr>
                                        
                                        <td>{{++$index}}</td>
                                        <td>{{$student->user->full_name}}</td>
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