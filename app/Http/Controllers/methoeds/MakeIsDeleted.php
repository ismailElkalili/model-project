<?php
namespace App\Http\Controllers\methoeds;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MakeIsDeleted extends Controller
{
    public static function makeIsDelete($tableName, $ID, $bool)
    {
        DB::table($tableName)->where('id', $ID)->update(['isDelete' => $bool]);
        return true;
    }
}
