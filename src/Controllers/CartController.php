<?php 
declare(strict_types=1);

namespace Vokuro\Controllers;

class CartController extends ControllerBase 
{
    public function addtocartAction($id)
    {

        $number = $this->request->getPost('number');
        $title = $this->request->getPost('title');
        $price = $this->request->getPost('price');
        $this->cart->add($id,$title,$number,$price);
        // return $this->dispatcher->forward([
        //     'action' => 'index',
        // ]);
        $this->response->redirect('/cart');
    }

    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $items =  $this->cart->content();
        $total = $this->cart->total();
        $this->view->total = $total;
        $this->view->cart = $items;
    }

    public function deletefromcartAction($rowid)
    {
        $this->cart->remove($rowid);
        // $this->response->redirect('/cart');
    }

    public function clearcartAction()
    {
        $this->cart->destroy();
        $this->response->redirect('/cart');
    }

    public function getAction()
    {
        $this->view->disable();
        $items = $this->cart->content();
        echo json_encode($items);
    }

    // public function addtocartAction($id)
    // {
    //     $number = $this->request->getPost('number');
    //     $title = $this->request->getPost('title');
    //     $price = $this->request->getPost('price');
    //     $photo = $this->request->getPost('photo');
    //     $cart = $this->session->get('item');
    //     if (empty($cart) || !isset($cart)) {
    //         $cart = array(array('id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo));
    //     } else {
    //         $token = 0;
    //         foreach ($cart as $value) {
    //             if ($value['id'] == $id) {
    //                 $token++;
    //             } 
    //         }

    //         if ($token == 0) {
    //             array_push($cart,['id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo]);
    //         } else {
    //             $searchkey = array_search(['id' => $id,'title'=>$title, 'count' => $number, 'price'=>$price,'photo'=>$photo],$cart);
    //             foreach ($cart as $key => $value) {
    //                 if ($key == $searchkey) {
    //                     $number+=$value['count'];
    //                     var_dump(array($searchkey=>array('id' => $id,'title'=>$title, 'count' =>$number,'price'=>$price,'photo'=>$photo)));
    //                     array_replace($cart,array($searchkey=>array('id' => $id,'title'=>$title, 'count' =>$number,'price'=>$price,'photo'=>$photo)));
    //                 } 
    //             } 
    //         }
    //     }

    //     $this->session->set('item', $cart);   
    //     $items = $this->session->get('item');
    //     var_dump($items);   
    // }
}