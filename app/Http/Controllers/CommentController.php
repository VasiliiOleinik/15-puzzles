<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CommentFormRequest $request)
    {

        // $validatedData = $request->validate([
        //     'add-comm' => ['required'],
        //     'member-case-id' => ['required'],
        // ]);

        $comment = new Comment;

        $comment->content = $request['add-comm'];
        $comment->member_case_id = $request['member-case-id'];
        $comment->user_id = Auth::user()->id;
        $comment->save();

        $request->session()->flash('status-member_case', 'You have successfully created your medical history.');

        //return redirect()->back();
        return response()->json([
            'img' => $comment->user->img ? $comment->user->img : asset('images/no_avatar.png'),
            'nickname' => $comment->user->nickname,
            'updated_at' => $comment->updated_at->format('d.m.Y'),
            'content' => $comment->content,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
