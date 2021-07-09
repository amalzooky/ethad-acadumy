@extends('dashboard.layouts.base')

@section('title') تقرير المدارس @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">عدد المدارس : {{$schools->count()}}</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('reports.schools.result')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div class="form-group">
                                    <label for="schools" class="form-label">البحث عن مدرسة</label>
                                    <div class="input-icon">  

                                        <select required name="schools"  id="schools" class="schools-select2-search form-control"></select>
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
                                        
                                        <th>المدرسة</th>
                                        <td>عدد الطلاب</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{$school->name}}</td>
                                            <td>{{$school->students->count()}}</td>
                                            
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