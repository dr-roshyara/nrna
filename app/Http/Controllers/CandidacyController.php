<?php

namespace App\Http\Controllers;

use App\Models\Candidacy;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Post;
use App\Models\Upload;
// use App\Http\Controllers\UploadController;
use Storage; 
use Throwable;

// use App\Http\Controllers\Redirect;


class CandidacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //starts here 
    public function index(Request $request)
    {
        request()->validate([
            'direction'=> ['in:asc,desc'],
            'field' => ['in:id,post_name,proposer_name,supporter_name']
        ]);
        $query =Candidacy::query();
        // if(request('direction')){
        //     $query->orderBy('id',request('direction'));

        // }else{
        //     $query->orderBy('id','desc');

        // }
        
        if(request('search')){
            $query->where('post_name', 'LIKE', '%'.request('search').'%');
        } 
        //
        if(request()->has(['field', 'direction'])){
            $query->orderBy(request('field'), request('direction')); 
        }else{
            $query->orderBy('id','desc'); 
        }
        //the following lines are for the first type of search 

        // $users =Message::when( $request->term, 
        //     function($query, $term){
        //     $query->where('to', 'LIKE', '%'.$term.'%' );
        // })->paginate(20); 
        
         $candidacies =$query->paginate(120);
        // $users =$users->sortBy('created_at')->reverse(); 
        return Inertia::render('Candidacy/IndexCandidacy', [
          'candidacies' => $candidacies,
          'filters' =>request()->all(['search', 'field','direction'])   
        ]);
    

    }
    //ends here 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        //
          $query =Post::all();
        //   dd($query->pluck('post_id'));
         return Inertia::render('Candidacy/CreateCandidacy', [
            'posts' =>$query, 
            'name'=>auth()->user()->name
         ]);
        //
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //  dd($request->all());
       $request->validate([
            'name'=>['required'],
            'image' =>['image']
        ]);
        //save 
        $post               =Post::all()->where('post_id', $request['post_id']);
        $post_name          =$post->first()->name;
        $post_nepali_name   =$post->first()->nepali_name;        
         $uploadedFile      = $request->file('image');
         $filename          =time().$uploadedFile->getClientOriginalName();
        $candidacy           =['user_id' => auth()->user()->id,
        'candidacy_id'       =>1];
        //   dd($candidacy);  
        $candidacy['candidacy_name']  =$request['name'];                  
        $candidacy['post_name']       =$post_name; 
         $candidacy['post_nepali_name']       =$post_nepali_name; 
       /** change psot id according to the post  otherwise it wont work
         * look at the post controller id*/ 
        $candidacy['post_id']         =$request['post_id']; 
        $candidacy['proposer_id']      =$request['proposer_id'];  
        $candidacy['proposer_name']   =$request['proposer_name']; 
        $candidacy['supporter_id']    =$request['supporter_id'];   
        $candidacy['supporter_name']   =$request['supporter_name'];  
        $candidacy['image_path_1']     =$filename ;
          $candidacy['image_path_2']   ="test";
            $candidacy['image_path_3']  ="test";
        // $candidacy['image_path_1']      =$request->input('image') ? $request->file('image')->store('images', 'public'): null;
        //save 
        // dd($candidacy);
           auth()->user()->candidacy()->create($candidacy);   
        // Candidacy::create($candidacy); 
            // auth()->user()->files()->create([ 
            //     'title' => "file1",
            //     'overview' =>"description1",
            //  ]);
            // dd($candidacy);
            // $this->upload($uploadedFile);  
            // Candidacy::create($candidacy);  

        // return redirect()->Inertia::render(('Candidacy/CreateCandidacy'); 
         return Inertia::render('Candidacy/CreateCandidacy');  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidacy  $candidacy
     * @return \Illuminate\Http\Response
     */
    public function show(Candidacy $candidacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidacy  $candidacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidacy $candidacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidacy  $candidacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidacy $candidacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidacy  $candidacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidacy $candidacy)
    {
        //
    }
    //
    public function upload($uploadedFile)
    {
        //
        // $uploadedFile = $request->file($fileKey);
         $filename = time().$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
        'files/'.$filename, 
            $uploadedFile,
            $filename
        );
        $upload = new Upload;
        $upload->filename = $filename;
        $upload->user()->associate(auth()->user());
         $upload->save();
    }

    //ends here
}
