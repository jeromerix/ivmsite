<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!\Auth::user()->hasRole('admin') && !\Auth::user()->hasRole('manager') && !\Auth::user()->hasRole('supplier') ){
           $posts = Post::where('userId', \Auth::user()->id)->orderBy('id', 'desc')
           ->get();
       }else{
           $posts = Post::orderBy('id', 'desc')->get();
       }
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create', Post::class);
     //call the view admin.posts.create
      return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate(
           [
             'OrderDate' => 'required|date',
             'pdf' => 'required|',
             'CommentarySantexo' => 'string|max:255',
             'CommentarySupplier' => 'string|max:255',
          ]);

      //get the image from the form
      $fileNameWithTheExtension = request('pdf')->getClientOriginalName();

      //get the name of the file
      $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

      //get extension of the file
      $extension = request('pdf')->getClientOriginalExtension();

      //create a new name for the file using the timestamp
      $newFileName = $fileName . '_' . time() . '.' . $extension;

      //save the iamge onto a public directory into a separately folder
      $path = request('pdf')->storeAs('public/pdfs/posts_pdfs', $newFileName);

        $user = auth()->user();
        $post = new Post();

        $post->OrderDate = request('OrderDate');
        $post->pdf_link = $newFileName;
        $post->DeliveryDate = request('DeliveryDate');
        $post->ConfirmedDelivery = request('ConfirmedDelivery');
        $post->InProduction = request('InProduction');
        $post->ready = request ('ready');
        $post->send= request('send');
        $post->CommentarySantexo = request('CommentarySantexo');
        $post->CommentarySupplier = request ('CommentarySupplier');
        $post->userId = Auth::user()->id;


        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
      if (\Request::ajax()){

          $post = Post::find($request['task']['id']);
          $post->published = $request['task']['checked'];
          $post->save();

          return $request;
      }

      return view('admin.posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      //$this->authorize('edit', $post);

     //get the post with the id $post->idate
     $post = Post::find($post->id);

     // return view
     return view('admin/posts/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //$this->authorize('update', $post);

        $request->validate(
             [
               'OrderDate' => 'required|date',
               'CommentarySantexo' => 'string|max:255',
               'CommentarySupplier' => 'string|max:255',

            ]);
      //if (Gate::allows('isAdmin')) {
    // The current user can edit settings

  if($request->hasFile('pdf')){
      //get the pdf from the form
        $fileNameWithTheExtension = request('pdf')->getClientOriginalName();

        //get the name of the file
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //get extension of the file
        $extension = request('pdf')->getClientOriginalExtension();

        //create a new name for the file using the timestamp
        $newFileName = $fileName . '_' . time() . '.' . $extension;

        //save the iamge onto a public directory into a separately folder
        $path = request('pdf')->storeAs('public/pdfs/posts_pdfs', $newFileName);

        // dd($extension);

        $post = Post::findOrFail($post->id);

        $post->OrderDate = request('OrderDate');
        $post->pdf_link = $newFileName;
        $post->DeliveryDate = request('DeliveryDate');
        $post->ConfirmedDelivery = request('ConfirmedDelivery');
        $post->InProduction = request('InProduction');
        $post->ready = request('ready');
        $post->send = request('send') ;
        $post->CommentarySantexo = request('CommentarySantexo');
        $post->CommentarySupplier = request ('CommentarySupplier');

        $post->save();
      }
      else{

        $post = Post::findOrFail($post->id);

        $post->OrderDate = request('OrderDate');
        $post->DeliveryDate = request('DeliveryDate');
        $post->ConfirmedDelivery = request('ConfirmedDelivery');
        $post->InProduction = request('InProduction');
        $post->ready = request('ready');
        $post->send = request('send') ;
        $post->CommentarySantexo = request('CommentarySantexo');
        $post->CommentarySupplier = request ('CommentarySupplier');

        $post->save();
      }



        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
      //find the pdf

      $post = Post::find($request->post_id);

      $this->authorize('delete', $post);

      $oldpdf = public_path() . '/storage/pdfs/posts_pdfs/'. $post->pdf_link;

      if(file_exists($oldpdf)){
          //delete the pdf
          unlink($oldpdf);
      }

      //delete the post
      $post->delete();

      //redirect to posts
      return redirect('/posts');
  }
    }
