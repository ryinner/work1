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

namespace Vokuro\Controllers;

use Vokuro\Models\Goodsinorders;
use Vokuro\Models\Orders;

class OrdersController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
    }

    public function makeorderAction()
    {
        $items = $this->cart->content();
        if (count($items) == 0) {
            $this->response->redirect('');
        } else {
            $tel = $this->request->getPost('phone');
            $adress = $this->request->getPost('adress');
            $name = $this->request->getPost('name');
            $order = new Orders([
                'tel_orders' => $tel,
                'adress_orders' => $adress,
                'name_orders' => $name
            ]);
            $order->save();
    
            $order_id = Orders::maximum([
                "column" => "id_orders"
            ]);
    
            foreach($items as $value) {
                $goods_id = $value->id;
                $count = $value->qty;
                $goodsinorders = new Goodsinorders([
                    'goods_id_gio'    =>  $goods_id,
                    'order_id_gio'    =>  $order_id,
                    'count_goods_gio' =>  $count
                ]);
                $goodsinorders->save();
                $this->response->redirect('/check');
            }
    
            $this->cart->destroy();
        }

    }
}