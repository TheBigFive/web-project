<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rollen extends Model
{
    public function alleRollenOpvragen()
    {
      return DB::table('rollen')->get();
    }

    public function RolOpvragenViaId($id)
    {
      return DB::table('rollen')
      ->where('rol_id', $id)
      ->get();
    }
}
