@extends('dashboard.layouts.base')

@section('title') مواعيد المحظرات @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title"> مواعيد المحظرات</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>الماده</td>
                                    <td>الاحد</td>
                                    <td>الاثنين</td>
                                    <td>الثلاثاء</td>
                                    <td>الاربعاء</td>
                                    <td>الخميس</td>
                                    <td>الجمعه</td>
                                    <td>السبت</td>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($subjects as $index=>$subject)
                                <tr>
                                    <th class="text-center">{{++$index}}</th>
                                    <td class="text-center">{{$subject->name}} / {{$subject->major->name ?? ''}} / {{$subject->semester}} </td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->sunday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->monday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->tuesday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->wednesday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->thursday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->friday:'-' }}</td>
                                    <td class="text-center">{{isset($subject->subjectDate) ? $subject->subjectDate->saturday:'-' }}</td>
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