<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }

  public static function contacts()
  {
    $contacts = Contact::where('seen_unseen', 0)->get();
    return $contacts;
  }
}
