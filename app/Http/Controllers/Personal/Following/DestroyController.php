<?php

namespace App\Http\Controllers\Personal\Following;

use App\Http\Controllers\Controller;
use App\Models\User;

class DestroyController extends Controller
{
    public function __invoke(User $user, $id)
    {
        $user->followings()->detach($id);
        return redirect()->back();
    }
}
