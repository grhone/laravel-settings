<?php

namespace Grhone\LaravelSettings\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['model_type', 'model_id', 'key', 'value'];

    protected $table = 'laravel_settings';

    public function model()
    {
        return $this->morphTo();
    }
}
