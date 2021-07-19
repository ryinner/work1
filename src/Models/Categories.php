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
use Vokuro\Models\Goods;

class Categories extends Model
{
    public $id;
    public $cat_name;

    public function initialize() {
        $this->HasMany('id', Goods::class, 'id_cat_goods', [
            'alias' => 'goods',
        ]);
    }
}