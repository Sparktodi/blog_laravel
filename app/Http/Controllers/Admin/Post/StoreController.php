<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaceController;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaceController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $this->service->store($data);

        return redirect()->route('admin.posts.index');
    }
}
