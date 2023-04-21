<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['last_names','phone','ci','user_id'];

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
