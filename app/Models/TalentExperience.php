<?php namespace App\Models;

use Eloquent;

class TalentExperience extends Eloquent
{
    protected $table = 'talent_experience';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
