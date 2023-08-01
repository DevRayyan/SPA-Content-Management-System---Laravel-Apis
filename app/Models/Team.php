<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = "team";
    protected $primaryKey = "id";

    protected $updated_at = null;
    protected $link = null;
    protected $occupation = null;
    protected $fillable = [
        'name',
        'image',
        'email',
        'link',
        'occupation'
    ];
}
