<?php

namespace App\Http\Controllers;

use App\Models\MemberCase;
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
        if($request->page){
            $member_cases = MemberCase::with('user')->where('status','=','show')->paginate(4);
            return view('member-cases.partial.member_cases', compact(['member_cases']));
        }
        else{
            $member_cases = MemberCase::with('user')->where('status','=','show')->paginate(4);
            return view('member-cases.member_cases',compact(['member_cases']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberCase  $memberCase
     * @return \Illuminate\Http\Response
     */
    public function show(MemberCase $memberCase)
    {
        //
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
