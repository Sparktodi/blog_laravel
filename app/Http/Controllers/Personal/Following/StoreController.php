<?php

namespace App\Http\Controllers\Personal\Following;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(User $user, $id)
    {
        $user->followings()->attach($id);
        return redirect()->back();
    }
}
