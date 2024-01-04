<?php

namespace App\Http\Controllers;

use App\Models\planfacebookposts;
use Illuminate\Http\Request;

class PlanFacebookPostsController extends Controller
{
    public function index()
    {
        $facebook_posts = planfacebookposts::paginate(20);
        if($facebook_posts){
            return response()->json($facebook_posts);
        } else return response()->json('no facebook posts');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'post_date'=>'required',
            'text'=>'required',
            'post_id_from_facebook'=>'required',
            'image_link'=>'required',
            'post_link'=>'required'
        ]);

        planfacebookposts::create($request->all());
        return response()->json('facebook post is created');
    }

    public function destroy($id)
    {
        $facebook_post = planfacebookposts::find($id);
        if($facebook_post){
        $facebook_post->delete();
        return response()->json('facebook post is deleted');
        } else return response()->json('facebook post was not found');
    }
}
