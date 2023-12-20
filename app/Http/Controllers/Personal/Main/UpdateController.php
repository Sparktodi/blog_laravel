<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Main\UpdateRequest;
use App\Models\User;
use App\Service\UserService;

class UpdateController extends Controller
{
    public $service;
    public function __invoke(UpdateRequest $request , User $user, UserService $service)
    {
        $data = $request->validated();
        $service->update($data, $user);
        return redirect()->route('personal.main.index');
    }
}
