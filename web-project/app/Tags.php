<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    public function alleTagsOpvragen()
    {
      return DB::table('tags')->get();
    }
}
