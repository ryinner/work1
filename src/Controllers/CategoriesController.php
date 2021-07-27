<?php
declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Categories;
use Vokuro\Models\Goods;
use Vokuro\Models\Parametrs;
use Vokuro\Models\Parametrsgoods;
use PDO;
use Phalcon\Mvc\Model\Query;
use Phalcon\Di;
use Phalcon\Mvc\View;

class CategoriesController extends ControllerBase
{
    public function indexAction() {
        var_dump(Goods::find(1)->prices);
    }

    public function goodsAction($id)
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $this->view->categories = Categories::find($id);
    }

    public function goodAction($id)
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $this->view->good = Goods::findFirst($id);
        $this->view->cat = Goods::findFirst($id)->categories;
        $this->view->brand = Goods::findFirst($id)->brands;
        // $this->view->prices = Goods::find($id)->prices;
        $param=$this->modelsManager->createBuilder()
        ->columns("pg.value_pg,p.name_par")
        ->from(['pg' => Parametrsgoods::class])
        ->join(Parametrs::class,
        'pg.id_par_pg = p.id_par','p','LEFT')
        ->where("id_good_pg= :id:",["id"=>$id],["id"=>PDO::PARAM_INT])
        ->getQuery()
        ->execute();
        $this->view->param=$param;
    }
}