<?php
declare(strict_types=1);

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Categories;

class Goods extends Model
{
    public $id_goods;
    public $title_goods;
    public $price_goods;
    public $photo_goods;
    public $count_goods;
    public $desrp_goods;
    public $id_cat_goods;

    public function initialize() {
        $this->belongsTo('id_cat_goods', Categories::class, 'id', [
            'alias' => 'categories'
        ]);
    }
}