<?php

namespace App\Http\Controllers;

use App\Models\User;
use Aws\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Helper\Table;

class UserController extends Controller
{
       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $user->name=$request->input('name')?$request->input('name'):$user->name;
        $user->update();
        return redirect(route('user.edit'))->with('flash_message', '編集が完了しました！');
    }
}
