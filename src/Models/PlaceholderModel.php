<?php

namespace Phoenix\Expenses\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceholderModel extends Model
{
    protected $fillable = [];

    public function test(){
        return 'test';
    }
}
