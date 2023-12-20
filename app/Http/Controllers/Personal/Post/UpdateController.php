<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Personal\Post\BaceController;
use App\Http\Requests\Personal\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaceController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $data = $request->validated();
    
        $this->service->update($data, $post);
     
        return redirect()->route('personal.main.index');
    }
}
