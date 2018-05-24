<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Anteojo extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'anteojos';
}
