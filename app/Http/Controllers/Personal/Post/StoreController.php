<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Personal\Post\BaceController;
use App\Http\Requests\Personal\Post\StoreRequest;

class StoreController extends BaceController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $this->service->store($data);

        return redirect()->route('personal.main.index');
    }
}
