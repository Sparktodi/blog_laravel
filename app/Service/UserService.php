<?php

namespace App\Service;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserService
{
    public function update($data, $user)
    {
        try {
            DB::beginTransaction();

            if (isset($data['photo'])) {
                $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
            };
            $user->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
