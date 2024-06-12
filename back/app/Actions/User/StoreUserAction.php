<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
* Store a new user
*/
class StoreUserAction {

    static function store($request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->skills()->sync($request->skills);

        return $user;
    }
}