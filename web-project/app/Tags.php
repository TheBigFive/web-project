<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    public function alleTagsOpvragen()
    {
      return DB::table('tags')
      ->get();
    }

    public function voegTagToe($tag)
    {
      
      return DB::table('tags')
      ->insert($tag);

    }

    public function verwijderTag($id)
    {
      
      return DB::table('tags')
      ->where('tag_id', $id)
      ->delete();

    }
}
