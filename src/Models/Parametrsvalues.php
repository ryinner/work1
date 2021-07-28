<?php
declare(strict_types=1);

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Parametrs;
use Vokuro\Models\Parametrsgoods;

class Parametrsvalues extends Model
{
    public $id_pv;
    public $val_pv;
    public $id_par_pv;

    public function initialize()
    {
       $this->belongsTo('id_par_pv', Parametrs::class, 'id_par',[
           'alias' => 'parametrs'
       ]);

       $this->hasMany('id_pv',Parametrsgoods::class,'id_val_pg',[
           'alias' => 'parametrsgoods'
       ]);
    }
}