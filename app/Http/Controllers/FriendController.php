<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\User;


class FriendController extends Controller
{


    public function store(Request $request, User $user){

        $is_from = $request->User()->from()->where('to_id', $user->id)->exists();
        $is_to = $request->User()->from()->where('from_id', $user->id)->exists();

        if($is_from || $is_to){
            return back();
        }
        if($request->User()->id === $user->id ){
            return back();
        }
        $request->User()->from()->attach($user);

        return back();
    }

    public function update(Request $request, User $user){
        $request->user()->pendingTo()->updateExistingPivot($user, ['accepted' => true]);
        return back();
    }

    public function destroy(Request $request, User $user){
        $request->user()->pendingTo()->detach($user->id);
        return redirect()->back()->with('success', 'Friend request cancelled successfully.');
    }
}
