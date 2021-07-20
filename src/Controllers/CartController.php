<?php 
declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Goods;

class CartController extends ControllerBase 
{
    public function addtocartAction($id)
    {
        $number = $this->request->getPost('number');
        $title = $this->request->getPost('title');
        $price = $this->request->getPost('price');
        $photo = $this->request->getPost('photo');
        $cart = $this->session->get('item');
        if (empty($cart) || !isset($cart)) {
            $cart = array(array('id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo));
        } else {
            $token = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $id) {
                    $token++;
                } 
            }

            if ($token == 0) {
                array_push($cart,['id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo]);
            } else {
                $searchkey = array_search(['id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo],$cart);
                foreach ($cart as $key => $value) {
                    if ($key == $searchkey) {
                        $number+=$value['count'];
                        var_dump(array($searchkey=>array('id' => $id,'title'=>$title, 'count' =>$number,'price'=>$price,'photo'=>$photo)));
                        array_replace($cart,array($searchkey=>array('id' => $id,'title'=>$title, 'count' =>$number,'price'=>$price,'photo'=>$photo)));
                    } 
                } 
                
            }
        }
        
        $this->session->set('item', $cart);   
        $items = $this->session->get('item');
        var_dump($items);   
    }

    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $items =  $this->session->get('item');
        $this->view->cart = $items;
    }

    public function deletefromcartAction()
    {
        
    }

    public function clearCart()
    {
        $this->session->destroy();
    }
}