<?php

namespace App\Service;

use Exception;
use App\Models\Parser;
use Illuminate\Support\Facades\DB;

class SaveToBDService
{
    public function create($data)
    {
        try {
            DB::beginTransaction();
            Parser::firstOrCreate($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            abort(500);
        }
    }
    public function update($data, $item)
    {
        try {
            DB::beginTransaction();
            // dd($data, $item);
            $item->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            abort(500);
        }
        return $item;
    }
}
