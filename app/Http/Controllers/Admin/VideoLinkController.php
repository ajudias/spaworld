<?php

namespace App\Http\Controllers\Admin;

use App\VideoLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class VideoLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links=videoLink::orderBy('order','desc')->get();
        return view('admin.video.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.video.index'));
        }

        return view('admin.video.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.video.index'));
        }
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255','url'],
        ]);

        try {
            $link = VideoLink::create([
                'title' => $request->title,
                'link' => $request->link,
                'order' => $request->order
            ]);
            
            if($link) {
                session()->flash("Success",$link->title. " has bas been added");
                return redirect()->route('admin.video.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the link");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.video.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoLink  $videoLink
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoLink $video)
    {
         if(Gate::denies('edit-data')) {
            return redirect(route('admin.video.index'));
        }
        return view('admin.video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoLink  $videoLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoLink $video)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.video.index'));
        }
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255','url'],
        ]);
        try {
            $video->title=$request->title;
            $video->link=$request->link;
            $video->order=$request->order;
            
            if($video->save()) {
                session()->flash("Success",$video->title. " has bas been updated");
                return redirect()->route('admin.video.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the link");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoLink  $videoLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoLink $video)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.video.index'));
        }

        $video->delete();

        return redirect()->route('admin.video.index');
    }
}
