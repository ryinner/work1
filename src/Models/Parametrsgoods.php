<?php
declare(strict_types=1);

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Goods;
use Vokuro\Models\Parametrs;

class Parametrsgoods extends Model
{
    public $id_good_pg;
    public $value_pg;
    public $id_par_pg;

    public function initializeinia()
    {
        $this->belongsTo('id_good_pg',Goods::class,'id_goods',[
            'alias' =>  'goods'
        ]);

        $this->belongsTo('id_par_pg',Parametrs::class,'id_par',[
            'alias' =>  'parametrs'
        ]);
    }
}