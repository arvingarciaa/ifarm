<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function addNews(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $news = new News;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->date_published = $request->date_published;
        $news->description = $request->description;
        $news->link = $request->link;
        if($request->hasFile('image')){
            if($news->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$news->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $news->thumbnail = $imageName;
        }
        $news->save();

        return redirect()->back()->with('success','News Added.'); 
    }
    
    public function editNews(Request $request, $news_id){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $news = News::find($news_id);
        $news->title = $request->title;
        $news->author = $request->author;
        $news->date_published = $request->date_published;
        $news->description = $request->description;
        $news->link = $request->link;
        if($request->hasFile('image')){
            if($news->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$news->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $news->thumbnail = $imageName;
        }
        $news->save();

        return redirect()->back()->with('success','News Updated.'); 
    }

    public function deleteNews($news_id, Request $request){
        $news = News::find($news_id);
        if($news->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$news->thumbnail;
            if(file_exists($image_path)){
                    unlink($image_path);
                }
        }
        $news->delete();

        return redirect()->back()->with('success','News Deleted.'); 
    }
}
