<?php
declare(strict_types=1);

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Categories;

class Parametrs extends Model
{
    public $id_par;
    public $name_par;
    public $id_cat_par;

    public function initializeinia()
    {
        $this->belongsTo('id_cat_par',Categories::class,'id',[
            'alias' => 'categories'
        ]);
    }
}