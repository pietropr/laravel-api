<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    protected $fillable = ['titulo', 'descricao', 'local', 'remoto', 'tipo', 'company_id'];

    protected $dates = ['deleted_at'];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
