<?php

namespace App\Http\Controllers;

use App\Models\PageLang;
use App\Models\Tag;
use App\Models\TagLanguage;
use App\Models\MemberCase;
use App\Models\Comment;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = PageLang::with('page')
            ->where('pages_id', 6)
            ->first();

        $memberCases = Cache::remember(
            'memberCases',
            now()->addDay(1),
            function(){
                return MemberCase::with('tags')->get();
            }
        );
        $member_cases_tags = TagLanguage::all();
        //Выбраны тэги
        if($request->tag){
            $memberCasesId = array();
            $tags = Tag::with('memberCases')
                ->whereIn('id', [$request->tag])
                ->get();

            foreach ($tags as $tag) {
                foreach ($tag->memberCases as $obj) {
                    array_push($memberCasesId, $obj->id);
                }
            }
            $memberCases = MemberCase::with('tags')
                ->whereIn('id', $memberCasesId)
                //->where('status','=','show')
                ->where('is_active', true)
                ->orderBy('id', 'DESC')
                ->paginate(4);

            return view('member-cases.member-cases', compact(['memberCases', 'page', 'member_cases_tags']));
        }
        $memberCases = MemberCase::with('user')
            //->where('status','=','show')
            ->where('is_active', true)
            ->orderBy('id', 'DESC')
            ->paginate(4);

        return view('member-cases.member-cases', compact(['memberCases', 'page', 'member_cases_tags']));

    }

    public function loadPost($id)
    {
        $memberCase = MemberCase::find($id);
        $memberCase->story_tags = $memberCase->tags()->pluck('tag_id');
        if($memberCase->img == null)
        {
            $memberCase->img = asset('/img/med-history.png');
        }
        else
        {
            $memberCase->img = asset($memberCase->img);
        }
        //$memberCase->img = asset($memberCase->img);
//        $memberCases = MemberCase::with('user')
//            //->where('status','=','show')
//            ->where('is_active', true)
//            ->orderBy('id', 'DESC')
//            ->get();
//            //->paginate(4);
//        foreach ($memberCases as $memberCase) {
//            $memberCase->img = asset($memberCase->img);
//            $memberCase->updated_at_format = $memberCase->updated_at->format('d.m.Y');
//            $memberCase->member_case_published = trans('personal_cabinet.member_case_published');
//            $memberCase->member_case_on_moderation = trans('personal_cabinet.member_case_on_moderation');
//            $memberCase->edit_article = trans('personal_cabinet.edit_article');
//            $memberCase->delete_article = trans('personal_cabinet.delete_article');
//        }

        return $memberCase;
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
        //'img' => ['nullable'],
        'story-tags' => ['required'],
        ]);

        //dd($request['story-tags']);
        $tags = explode(",",$request['story-tags']);
        //$tags = $request['story-tags'];

        // временно
        //$tags = Tag::all();

        $memberCase = new MemberCase;

        $memberCase->user_id = Auth::id();
        $memberCase->title = $request['headline'];
        $memberCase->content = $request['your-story'];
        $memberCase->description = substr($memberCase->content,0,186);
        $memberCase->status = "moderating";
        $memberCase->anonym = json_decode($request['anonym']);

        if($request->has('image-file'))
        {
            $image = $request->file('image-file');
            $name = str_random(32).'.'.$image->getClientOriginalExtension();
            $folder = '/images/uploads';
            $memberCase->img = $image->storeAs($folder, $name, 'public');
        }

        $memberCase->save();
        $memberCase->alias = \URLify::filter($memberCase->title.' '.$memberCase->created_at.' '.$memberCase->id, 190);
        $memberCase->save();
        $memberCase->tags()->attach($tags);

        $request->session()->flash('status-member_case', 'You have successfully created your member case.');
        // возвращаем созданную историю
        if($memberCase->img == null)
        {
            $memberCase->img = asset('/img/med-history.png');
        }
        else
        {
            $memberCase->img = asset($memberCase->img);
        }
        $memberCase->img = asset($memberCase->img);
        $memberCase->updated_at_format = $memberCase->updated_at->format('d.m.Y');
        $memberCase->member_case_on_moderation = trans('personal_cabinet.member_case_on_moderation');
        $memberCase->edit_article = trans('personal_cabinet.edit_article');
        $memberCase->delete_article = trans('personal_cabinet.delete_article');
        $memberCase->content = str_limit(strip_tags($memberCase->content), $limit = 400, $end = '...');

        return $memberCase;
    }

    /**
     * Show the form for creating a new resource. method POST
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request)
    {
        $validatedData = $request->validate([
        'headline' => ['required', 'string', 'max:191'],
        'your-story' => ['required'],
        //'img' => ['nullable'],
        'story-tags' => ['required'],
        ]);

        $tags = explode(",",$request['story-tags']);
        //$tags = $request['story-tags'];
        $memberCase = MemberCase::find($request['id']);

        /*if($request->img != null){
          $memberCase->img = $request['img'];
        }*/
        $memberCase->title = $request['headline'];
        $memberCase->content = $request['your-story'];
        $memberCase->description = substr($memberCase->content,0,186);
        $memberCase->status = "moderating";
        $memberCase->is_active = false;
        $memberCase->anonym = json_decode($request['anonym']);

        if($request->has('image-file'))
        {
            Storage::disk('public')->delete($memberCase->img);
            $image = $request->file('image-file');
            $name = str_random(32).'.' . $image->getClientOriginalExtension();
            $folder = '/images/uploads';
            $memberCase->img = $image->storeAs($folder, $name, 'public');
        }

        $memberCase->save();
        $memberCase->tags()->detach();
        $memberCase->tags()->attach($tags);

        $request->session()->flash('status-member_case', 'You have successfully created your member case.');

        // возвращаем созданную историю
        if($memberCase->img == null)
        {
            $memberCase->img = asset('/img/med-history.png');
        }
        else
        {
            $memberCase->img = asset($memberCase->img);
        }
        $memberCase->img = asset($memberCase->img);
        $memberCase->updated_at_format = $memberCase->updated_at->format('d.m.Y');
        $memberCase->member_case_on_moderation = trans('personal_cabinet.member_case_on_moderation');
        $memberCase->edit_article = trans('personal_cabinet.edit_article');
        $memberCase->delete_article = trans('personal_cabinet.delete_article');
        $memberCase->content = str_limit(strip_tags($memberCase->content), $limit = 400, $end = '...');

        return $memberCase;
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
    public function show($locale, $alias)
    {
        $memberCases = Cache::remember(
            'memberCases',
            now()->addDay(1),
            function(){
                return MemberCase::with('tags')->get();
            }
        );
        $id = MemberCase::where('alias', $alias)->first()->id;

        $tags = MemberCase::with('tags')
            ->find($id)
            ->tags()
            ->get()
            ->pluck('id');

        $tagLanguages = TagLanguage::whereIn('tag_id',$tags)->get();
        return view('member-cases.single.member-case',
            [
                'memberCase' => MemberCase::with('user', 'tags')->find($id),
                'comments' => Comment::with('user')->where('member_case_id','=',$id)->get(),
                'tags' => $tagLanguages
            ]
        );
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
    public function destroy(Request $request, $id)
    {
        $memberCase = MemberCase::findOrFail($id);
        Storage::disk('public')->delete($memberCase->img);
        $memberCase->delete();
    }
}
