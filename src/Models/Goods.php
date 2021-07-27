<?php
declare(strict_types=1);

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Categories;
use Vokuro\Models\Parametrsgoods;
use Vokuro\Models\Brands;
use Vokuro\Models\Prices;

class Goods extends Model
{
    public $id_goods;
    public $title_goods;
    public $price_goods;
    public $photo_goods;
    public $count_goods;
    public $desrp_goods;
    public $id_brands_goods;
    public $id_cat_goods;

    public function initialize() {
        $this->belongsTo('id_cat_goods', Categories::class, 'id', [
            'alias' => 'categories'
        ]);

        $this->belongsTo('id_brands_goods', Brands::class,'id_brands',[
            'alias' =>  'brands'
        ]);

        $this->hasMany('id_goods', Parametrsgoods::class, 'id_good_pg',[
            'alias' =>  'parametrsgoods'
        ]);

        $this->hasMany('id_goods', Prices::class, 'id_good_prices',[
            'alias' => 'prices'
        ]);
    }
}