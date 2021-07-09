@extends('dashboard.layouts.base')

@section('title') تقرير الطلاب @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">تقرير الطلاب</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('reports.students.search')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="from" class="form-label">من تاريخ</label>
                                    <input type="date" class="form-control" required name="from" id="from">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="schools" class="form-label">إلي تاريخ</label>
                                    <input type="date" class="form-control" required name="to" id="to">
                                </div>
                            </div>
                            <div class="col-12 col-md-2 align-self-center">
                                <button type="submit" class="btn btn-primary btn-block">بحث</button>
                            </div>
                        </div>

                        
                    </form>

                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection