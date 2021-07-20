<?php 
declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Goods;

class CartController extends ControllerBase 
{
    public function addtocartAction($id)
    {
        $number = $this->request->getPost('number');
        $this->session->set('item',['id' => $id, 'count' => $number]);
        $thisItem = $this->session->get("item");
        var_dump($thisItem);
    }

    public function showcartAction()
    {
        $this->view->cart = $this->session->item;
    }

    public function deletefromcartAction()
    {
        
    }
}