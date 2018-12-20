<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['nome', 'email', 'site', 'url_logo', 'senha'];

    protected $hidden = [
        'senha'
    ];

    protected $dates = ['deleted_at'];


    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
