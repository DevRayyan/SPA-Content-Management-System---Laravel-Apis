<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "review";
    protected $primaryKey = "id";

    protected $updated_at = null;
    protected $image = null;
    protected $occupation = null;
    protected $fillable = [
        'email',
        'name',
        'msg',
        'occupation',
        'image'
    ];
}