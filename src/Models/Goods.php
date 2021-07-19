<?php
declare(strict_types=1);

/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Vokuro\Models\Categories;

class Goods extends Model
{
    public $id_goods;
    public $title_goods;
    public $price_goods;
    public $photo_goods;
    public $desrp_goods;
    public $id_cat_goods;

    public function initialize() {
        $this->belongsTo('id_cat_goods', Categories::class, 'id', [
            'alias' => 'categories'
        ]);
    }
}