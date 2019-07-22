<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\MemberCase;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MemberCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //Выбраны тэги
        if($request->tagsActive){
            if($request->tagsActive[0]) {
                $memberCasesId = array();
                $tags = Tag::with('memberCases')->whereIn('id', $request->tagsActive)->get();
                foreach ($tags as $tag) {
                    foreach ($tag->memberCases as $obj) {
                        array_push($memberCasesId, $obj->id);
                    }
                }          
                $memberCases = MemberCase::with('tags')->whereIn('id', $memberCasesId)
                                                       ->where('status','=','show')->paginate(4);        
            }
            else{                
              $memberCases = MemberCase::with('tags')->where('status','=','show')->paginate(4);              
            }
            return view('member-cases.partial.member-cases', compact(['memberCases']));
        }
        //пагинация
        if($request->page){
            $memberCases = MemberCase::with('user')->where('status','=','show')->paginate(4);
            return view('member-cases.partial.member-cases', compact(['memberCases']));
        }
        else{
            $memberCases = MemberCase::with('user')->where('status','=','show')->paginate(4);
            return view('member-cases.member-cases',compact(['memberCases']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        
    }

    /**
     * Show the form for creating a new resource. method POST
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
        'headline' => ['required', 'string', 'max:191'],
        'your-story' => ['required'],
        'img' => ['nullable'],
        'story-tags' => ['required'],
        'anonym' => ['required'],
        ]);

        $tags = explode(",",$request['story-tags']);
        $memberCase = new MemberCase;
        
        if($request->img != null){
          
          $memberCase->img = $request['img'];
        }        
        $memberCase->title = $request['headline'];
        $memberCase->content = $request['your-story'];
        $memberCase->description = substr($memberCase->content,0,186);
        $memberCase->status = "moderating";
        $memberCase->anonym = ($request['anonym'] == 'on') ? 1 : 0;
        $memberCase->save();
        $memberCase->tags()->attach($tags);

        $request->session()->flash('status-member_case', 'You have successfully created your member case.');

        return redirect()->back();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberCase  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {        
        return view('member-cases.single.member-case', ['memberCase' => MemberCase::with('user', 'tags')->find($id),
                                     'comments' => Comment::with('user')->where('member_case_id','=',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberCase  $memberCase
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberCase $memberCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberCase  $memberCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberCase $memberCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberCase  $memberCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberCase $memberCase)
    {
        //
    }
}
