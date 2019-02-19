<?php
namespace Phoenix\Expenses\ModelExtends\Uuid;

use Illuminate\Database\Eloquent\Model as BaseModel;
use App\Traits\UuidAutoIncrement;


class Model extends BaseModel
{
    use UuidAutoIncrement;

    public $incrementing = false;
}


