<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'name',
        'surname',
        'email',
    ];

}
