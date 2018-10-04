<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }

  public function department()
  {
    return $this->belongsTo(Department::class);
  }
}
