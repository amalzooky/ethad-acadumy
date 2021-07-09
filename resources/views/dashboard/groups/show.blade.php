@extends('dashboard.layouts.base')

@section('title') {{$group->name}} @stop
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/js/vendors/froala/css/froala_editor.pkgd.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/assets/js/vendors/froala/css/froala_style.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('groups.store.post', $group->id)}}" method="post">
                        @csrf
                        <div class="card-header">
                            <div class="input-group">
                                <textarea type="text" class="form-control " placeholder="بماذا تفكر..." required name="body"></textarea>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                    نشر
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                        <ul class="list-group card-list-group">
                            @foreach ($posts as $post)
                            <li class="list-group-item py-5">
                                <div class="media">
                                <div class="media-object avatar avatar-md mr-4" style="background-image: url('{{asset($post->user->avatar)}}')"></div>
                                <div class="media-body">
                                    <div class="media-heading">
                                    <small class="float-right text-muted">{{dateForhuman($post->created_at)}}</small>
                                    <h5><a href="{{route('groups.user.posts', [$post->user->id, $group->id])}}">{{$post->user->username}}</a></h5>
                                    </div>
                                    <div id="post-body-{{$post->id}}">
                                        <p >{!! $post->body !!}</p>
                                    </div>
                                    <ul class="media-list">
                                    @foreach ($post->comments as $comment)
                                    <li class="media mt-4">
                                        <div class="media-object avatar mr-4" style="background-image: url('{{asset($comment->user->avatar)}}')"></div>
                                        <div class="media-body bg-light p-3 rounded">
                                        <div class="row">
                                            <div class="col"><strong>{{$comment->user->username}}</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div id="comment-body-{{$comment->id}}">
                                                    <p class="mb-1 float-left" >{!!$comment->body !!}</p>
                                                </div>
                                                <small class="float-right text-muted">{{dateForhuman($comment->created_at)}}</small>
                                            </div>
                                        </div>
                                        <div class="rwo mt-3">
                                            <div class="col">
                                                    <button
                                                        class="pull-right comment-like btn {{in_array(auth()->id(), $comment->likes()->pluck('user_id')->toArray()) ? 'btn-primary' : 'btn-outline-primary'}} btn-sm"
                                                        data-id="{{$comment->id}}"
                                                        data-url="{{route('groups.comment.like', $comment->id)}}">
                                                        <span class="likes-count">{{$comment->likes->count()}}</span> 
                                                        <i class="fe fe-thumbs-up" aria-hidden="true"></i>
                                                </button>
            
                                                    @if(auth()->id() === $comment->user_id || auth()->user()->can('managment_groups'))
                                                    <a href="javascript:void(0)" style="margin-right: 5px" data-url="{{route('groups.comment.delete', $comment->id)}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-outline-danger btn-sm btn-delete pull-left"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                                    @endif()
                                                    @if(auth()->id() === $comment->user_id)
                                                    <button class="btn btn-outline-primary  btn-sm btn-edit pull-left comment_{{$comment->id}}" data-postid="{{$post->id}}" data-userid="{{$comment->user_id}}" data-commentbody="{{$comment->body}}" data-commentid="{{$comment->id}}" data-toggle="modal" data-target="#editComment" data-whatever="@mdo"><i class="fe fe-edit" aria-hidden="true"></i></button>
                                                    @endif
                                            </div>
                                        </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    </ul>
                                </div>
                                </div>
                                <form action="{{route('groups.comment', [$post->id, auth()->id()])}}" method="post" class="add-comment-form">
                                    @csrf 
                                    <div class="input-group mt-5">
                                        <textarea type="text" class="form-control body" placeholder="أكتب تعليقك...." required name="body"></textarea>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                            علق
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-5 post-control">
                                    @if($post->user->id === auth()->id() || auth()->user()->can('managment_groups'))
                                    <a href="javascript:void(0)" style="margin-right: 5px" data-url="{{route('groups.post.delete', $post->id)}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-outline-danger btn-sm btn-delete pull-left"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                    @endif
                                    @if(auth()->id() === $post->user->id)
                                    <button class="btn btn-outline-primary btn-sm btn-edit-post pull-left post_{{$post->id}}" data-postid="{{$post->id}}" data-userid="{{$post->user_id}}" data-postbody="{{$post->body}}"  data-toggle="modal" data-target="#editPost" data-whatever="@mdo"><i class="fe fe-edit" aria-hidden="true"></i></button>
                                    @endif
                                    <button 
                                        data-id="{{$post->id}}" 
                                        data-url="{{route('groups.post.like', $post->id)}}" 
                                        class="btn {{in_array(auth()->id(), $post->likes()->pluck('user_id')->toArray()) ? 'btn-primary' : 'btn-outline-primary'}} px-4 btn-sm pull-right toggle-like"><span class="likes-count">{{$post->likes->count()}}</span> <i class="fe fe-thumbs-up" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                </div>
                {{$posts->links()}}
            </div>
            <div class="col-12 order-first">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('{{$group->image}}'); height: 19rem;"></div>
                    <div class="card-body text-center">
                        <h3 class="mb-3">{{$group->name}}</h3>
                        <p class="mb-4">
                        {{$group->description}}
                        </p>
                        <a href="{{route('groups.members', $group->id)}}" class="btn btn-outline-primary btn-sm"><i class="fe fe-users"></i> {{$group->users->count()}}</a> 
                        @can('managment_groups')
                        <div class="row mt-5 text-center">
                            <div class="col">
                                <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">إضافة أعضاء</button>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @can('managment_groups')
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">إضافة أعضاء</h5>
                    </div>
                    <form action="{{route('groups.add.members', $group->id)}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="groups" class="form-label">الأعضاء</label>
                                <select class="form-control custom-select groups" id="users" name="users[]" multiple="multiple" required>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">إضافة</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        @endcan
        <div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form id="update-comment-form" action="{{route('groups.comment.update')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                      <textarea class="form-control" id="comment-text" name="body" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                  <button type="submit" class="btn btn-primary save">تعديل</button>
                </div>
                </form>
              </div>
            </div>
          </div><!-- end editComment modal -->
          <div class="modal fade" id="editPost" style="width:100%" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form id="update-post-form" action="{{route('groups.post.update')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                      <textarea class="form-control post-text" id="post-text" name="body" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                  <button type="submit" class="btn btn-primary save">تعديل</button>
                </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@stop

@section('js')
<script src="{{asset('dashboard/assets/js/vendors/froala/js/froala_editor.pkgd.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendors/froala/js/plugins/image.min.js')}}"></script>
<script> 
    $(function() {
 
        $('.group-textarea').froalaEditor({

            language: 'ar',
            width: 1050,
            toolbarButtons: ['insertImage', 'insertVideo'],
            quickInsertTags: [],
            imageUploadURL: '{{route("groups.upload.image")}}',
            requestHeaders: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }).on('froalaEditor.image.removed', function(e, editor, $img){
            $.ajax({
                method: 'POST',
                headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '{{route("latestnews.remove.image")}}',
                data: {
                    src: $img.attr('src')
                }
            }).done(function(data){
                console.log ('Image was deleted');
            }).fail(function(err){
                console.log ('Image delete problem: ' + JSON.stringify(err));
            })
        });

        $('.post-text,#comment-text').froalaEditor({
            language: 'ar',
            toolbarButtons: ['insertImage', 'insertVideo'],
            quickInsertTags: [],
            imageUploadURL: '{{route("groups.upload.image")}}',
            requestHeaders: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }).on('froalaEditor.image.removed', function(e, editor, $img){
            $.ajax({
                method: 'POST',
                headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '{{route("latestnews.remove.image")}}',
                data: {
                    src: $img.attr('src')
                }
            }).done(function(data){
                console.log ('Image was deleted');
            }).fail(function(err){
                console.log ('Image delete problem: ' + JSON.stringify(err));
            })
        });
    });
    $(".fr-wrapper div:first-child").css({ display: "none" });
    setTimeout(()=>{
        $(".fr-wrapper div:first-child").css({ display: "none" });
    },1000)
</script>
@endsection
