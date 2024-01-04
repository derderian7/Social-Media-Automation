<?php

namespace App\Http\Controllers;

use App\Models\instagramPage;
use Illuminate\Http\Request;

class InstagramPageController extends Controller
{
    public function index()
    {
        $instagram_pages= instagramPage::paginate(20);
        if($instagram_pages){
        return response()->json($instagram_pages,200);
        }else return response()->json('no instagram pages');
    }

    public function show($id)
    {
        $instagram_page= instagramPage::findOrFail($id);
        return response()->json($instagram_page);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'page_name'=>'required|unique:instagram_pages,page_name',
            'id_from_instagram'=>'required|unique:instagram_pages,id_from_instagram'
        ]);
        instagramPage::create($request->all());
        return response()->json('instagram page is added');
    }

    public function update(Request $request,$id)
    {
        $instagram_page=instagramPage::findOrFail($id);
        $this->validate($request,[
            'page_name'=>'required',
            'id_from_instagram'=>'required'
        ]);
        $instagram_page->page_name=$request->page_name;
        $instagram_page->id_from_instagram= $request->id_from_instagram;
        $instagram_page->update();
        return response()->json('instagram page is updated');
    }

    public function destroy($id)
    {
        $instagram_page=instagramPage::findOrFail($id);
        $instagram_page->delete();
        return response()->json('instagram page is deleted');
    }
}
