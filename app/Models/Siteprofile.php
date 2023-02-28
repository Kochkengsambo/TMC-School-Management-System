<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siteprofile extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'id','user_id','add_by','site_name', 'phone', 'email', 'address', 'logo', 'icon', 'creator_id', 'updater_id', 'deleter_id',
    ];
}
