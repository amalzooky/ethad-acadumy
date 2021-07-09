@extends('dashboard.layouts.base')

@section('title') أخبار الطلاب @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">أخبار الطلاب</h3>
                    <div class="card-options">
                        <a href="{{ route('student-news.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.latestnews.create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover" id="news_table">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>@lang('dashboard.latestnews.image')</td>
                                    <td>@lang('dashboard.latestnews.title')</td>
                                    <td>التخصص</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang("global.updated_at")</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection

@section('js')
<script>
    $('#news_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dashboard/student-news/datatable',
        columns: [
            {'data': 'id'},
            {'data': 'image', 'orderable': false, 'searchable': false},
            {'data': 'title'},
            {'data': 'major_id', 'name': "major.name"},
            {'data': 'created_at', 'name': 'created_at'},
            {'data': 'updated_at', 'name': 'updated_at'},
            {'data': 'is_active', 'name': 'is_active'},
            {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false},
        ],

        "fnInitComplete": function(oSettings, json) {
            $(".activation").change(function(event) {
                let id = $(this).data("id");
                let url = $(this).data("url");
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    data: { id: id },
                    success: function(data) {
                        iziToast.success({
                            message: data.success,
                            position: "topRight"
                        });
                    }
                });
            });
        }
    });
</script>
@stop