<?php

namespace App\Http\Controllers\Dashboard\Groups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class GroupController extends Controller
{
    public function index()
    {
        $groups = DB::table('groups')->select('id','name', 'description', 'created_at')->get();
        return view('dashboard.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('dashboard.groups.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:groups',
            'description' => 'required',
//            'image' => 'required|url'
        ]);

        $attributeNames =  [
            'name' => __('dashboard.groups.name'),
            'description' => __('dashboard.groups.description'),
//            'image' => __('dashboard.groups.image')
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
//            'image' => $request->image,
        ];

        $group = \Groups::create(auth()->id(), $data);

        session()->flash('success', __('dashboard.statuses.group_created'));

        return response()->json(["redir"=>route('groups.index')]);
    }

    public function edit($id)
    {
        $group = DB::table('groups')->where('id', '=', $id)->first();

        return view('dashboard.groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:groups,name,' . $id,
            'description' => 'required',
//            'image' => 'required|url'
        ]);

        $attributeNames =  [
            'name' => __('dashboard.groups.name'),
            'description' => __('dashboard.groups.description'),
//            'image' => __('dashboard.groups.image')
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        DB::table('groups')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
//                'image' => $request->image,
        ]);

        session()->flash('success', __('dashboard.statuses.group_updated'));

        return response()->json(["redir"=>route('groups.index')]);
    }

    public function myGroups()
    {
        $user = \Groups::getUser(auth()->id());
        $groups = $user->groups;
        return view('dashboard.groups.my_groups', compact('groups'));
    }


    public function showGroup($id)
    {

        $group = \Groups::group($id);

        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);
        $posts = $group->posts()->orderBy('created_at', 'desc')->paginate(10);
        $usersIDS = [];
        foreach($group->users as $user){
            $usersIDS[] = $user->id;
        }
        $users = User::all()->except($usersIDS);
        return view('dashboard.groups.show', compact('group', 'posts', 'users'));
    }

    public function members($id)
    {
        $group = \Groups::group($id);
        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);
        return view('dashboard.groups.members', compact('group'));
    }

    public function deleteMember($group, $user)
    {
        $group = \Groups::group($group);
        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);
        $group->leave($user);
        session()->flash('success', __('dashboard.statuses.group_delete_member'));

    }

    public function addMembers(Request $request, $group)
    {

        $group = \Groups::group($group);
        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);
        $group->addMembers($request->users);
        session()->flash('success', __('dashboard.statuses.group_add_members'));
        return back();
    }

    public function storePost(Request $request, $id)
    {
        $group = \Groups::group($id);
        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);

        $data = [
            'title'      => '',
            'user_id'    => auth()->id(),
            'body'       => $request->body,
            'type'       => '',
            'extra_info' => '',
        ];

        $post = \Groups::createPost($data);
        $group->attachPost($post->id);
        session()->flash('success', __('dashboard.statuses.group_add_post'));
        return back();
    }

    public function showUserPosts($userId, $groupID)
    {
        $group = \Groups::group($groupID);
        if(!in_array(auth()->id(), $group->users->pluck('id')->toArray()) ) return abort(404);
        $posts = $group->posts()->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(20);

        return view('dashboard.groups.user_posts', compact('posts'));
    }

    public function postLike($id)
    {
        $post = \Groups::post($id);
        $post->toggleLike(auth()->id());
        return response()->json([
            'success' => 'success',
            'likes' => $post->likes()->count(),

        ]);
    }

    public function commentLike($id)
    {
        $comment = \Groups::comment($id);
        $comment->toggleLike(auth()->id());
        return response()->json([
            'success' => 'success',
            'likes' => $comment->likes()->count(),

        ]);
    }

    public function comment(Request $request, $postID, $userID)
    {
        $data = [
            'post_id' => $postID,
            'user_id' => $userID,
            'body'    => $request->body,
        ];

        $comment = \Groups::addComment($data);

        return response()->json([
            'success' => 'success',
        ]);
    }

    public function deleteComment($commentID)
    {
        $comment = \Groups::comment($commentID);
        $comment->delete();

        session()->flash('success', __('dashboard.statuses.group_delete_comment'));
    }

    public function deletePost($postID)
    {
        $post = \Groups::post($postID);
        if($post->comments->count()){
            foreach ($post->comments as $comment) {
                $comment->delete();
            }
        }
        $post->delete();

        session()->flash('success', __('dashboard.statuses.group_delete_post'));
    }

    public function updateComment()
    {
        $data = [
            'post_id' => request()->postID,
            'user_id' => request()->userID,
            'body'    => request()->body,
        ];

        $comment = \Groups::comment(request()->commentID);
        $comment->update($data);

        return response()->json([
            'success' => 'success',
            'body' => $comment->body
        ]);


    }

    public function updatePost()
    {
        $data = [
            'user_id'    => request()->userID,
            'body'       => request()->body,
        ];

        $post = \Groups::post(request()->postID);
        $post->update($data);

        return response()->json([
            'success' => 'success',
            'body' => $post->body
        ]);

    }

    public function uploadImage()
    {
        $response = \FroalaEditor\Image::upload('/storage/uploads/groups/');
        echo stripslashes(json_encode($response));
    }

    public function removeImage()
    {
        $response = \FroalaEditor\Image::delete(request()->src);
        echo stripslashes(json_encode($response));
    }

    public function deleteGroup($id)
    {
        $group = \Groups::group($id);
        foreach ($group->posts as $post) {
            foreach ($post->comments as $comment) {
                $comment->delete();
            }

            $group->detachPost($post->id);
            $post->delete();
        }

        $group->delete();
        session()->flash('success', 'تم حذف المجموعة بنجاح');
    }
}
