<?php

namespace Mydnic\Metrics\Test;

use Illuminate\Database\Eloquent\Model;
use Mydnic\Metrics\Traits\Graphable;

class TestModel extends Model
{
    use Graphable;

    protected $fillable = ['created_at'];
}
