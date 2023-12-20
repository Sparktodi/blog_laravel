<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $this->authorize('update', $user);
        return view('personal.main.edit', compact('user'));
    }
}
