<?php
declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Categories;
use Vokuro\Models\Goods;
use Vokuro\Models\Parametrsgoods;

class CategoriesController extends ControllerBase
{
    public function indexAction() {
        $this->view->categories = Categories::find();
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
    }
}