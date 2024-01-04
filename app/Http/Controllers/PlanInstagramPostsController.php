<?php

namespace App\Http\Controllers;

use App\Models\planinstagramposts;
use Illuminate\Http\Request;

class PlanInstagramPostsController extends Controller
{
    public function index()
    {
        $instagram_posts = planinstagramposts::paginate(20);
        if($instagram_posts){
            return response()->json($instagram_posts);
        } else return response()->json('no instagram posts');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'post_date'=>'required',
            'text'=>'required',
            'post_id_from_instagram'=>'required',
            'image_link'=>'required',
            'post_link'=>'required'
        ]);

        planinstagramposts::create($request->all());
        return response()->json('instagram post is created');
    }

    public function destroy($id)
    {
        $instagram_post = planinstagramposts::find($id);
        if($instagram_post){
        $instagram_post->delete();
        return response()->json('instagram post is deleted');
        } else return response()->json('instagram post was not found');
    }
    
}