<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\AllComment;
use App\Models\Page;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function userPost()
    {
        $posts = posts::latest()->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addpost()
    {
        return view('admin.posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request->validated();
        $path = 'images/Posts/'.Str::random(20).'.webp';
        Image::make($request->file('image'))->resize(1024, 768)->save(public_path($path));

        posts::insert([
                'title' => $request->title,
                'title_slug' => strtolower(str_replace(' ' , '-',$request->title)),
                'page_id' => $request->page_id,
                'image' => $path,
                'short_title' => $request->short_title,
                'content' => $request->content,
                'val_status' => $request->status,
                'type' => $request->type,
                'status' => $request->status == 1 ? 'نشر' : 'معلق',
                'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'تم الاضافة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('user.post')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = posts::find($id);
        $pages = Page::all();
        return view('admin.posts.adit',compact('posts','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $request->validated();

        $old_images = $request->old_image;
        $post_image = $request->file('image');
        $post = posts::find($id);


        $post->title = $request->title;
        $post->title_slug = strtolower(str_replace(' ' , '-',$request->title));
        $post->page_id = $request->page_id;
        $post->short_title = $request->short_title;
        $post->content = $request->content;
        $post->val_status = $request->status;
        $post->type = $request->type;
        $post->status = $request->status == 1 ? 'نشر' : 'تعليق';
        $post->updated_at = Carbon::now();


       if($post_image){

            $path = 'images/Posts/'.Str::random(20).'.webp';
            Image::make($request->file('image'))->resize(1024, 768)->save(public_path($path));

            unlink($old_images);

            $post->image = $path;
            $post->save();

            $notification = array(
                'message' => 'تم التحديث بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('user.post')->with( $notification);
        }else{
            $post->save();

            $notification = array(
                'message' => 'تم التحديث بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('user.post')->with( $notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = posts::find($id);
        $old_images = $images->image;
        unlink($old_images);

        posts::find($id)->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function AllPosts(){
        $posts = posts::where('type',1)->where('val_status',1)->latest()->paginate(5);
        return view('pages.blog',compact('posts'));
    }

    public function postContact($slug){
        $posts = Page::where('title_slug',$slug)->get();
        $comments = AllComment::all();
        return view('pages.blog_details',compact('posts','comments'));
    }

    public function getPost($slug){
        $posts = posts::where('title_slug',$slug)->get();
        $comments = AllComment::all();
        return view('pages.post_details',compact('posts','comments'));

    }

    public function getPages($type){
        if($type == 2){
            $pages = Page::all('id','title');
            return json_encode($pages);
        }
    }

    public function upload(Request $request){;
        if($request->file('upload')){

            $path = 'images/Write_Post/'.Str::random(20).'.webp';
            Image::make($request->file('upload'))->resize(1024, 768)->save(public_path($path));
            $path2 = asset( $path );
            return response()->json([
                'filename' =>$path,
                'uploaded' => 1,
                'url' => $path2
            ]);
        }
    }

}
