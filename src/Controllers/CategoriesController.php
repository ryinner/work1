<?php

declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Goods;
use Vokuro\Models\Parametrs;
use Vokuro\Models\Parametrsgoods;
use PDO;
use Phalcon\Mvc\View\Simple;
use Vokuro\Models\Brands;
use Vokuro\Models\Parametrsvalues;
use Phalcon\Paginator\Adapter\QueryBuilder as Paginator;

class CategoriesController extends ControllerBase
{
    public function indexAction()
    {
        // $this->paginator(10,5);
        // Страница отладки и тестирования

        // $list = 10;
        // $show = 5;
        // $count = 10;

        // $id = 1;
        // $from = ($list-1)*$count;

        // $pages = $this->db->fetchOne('SELECT COUNT(id_goods)/'.$count.' AS pages FROM goods  WHERE id_cat_goods=1');
        // $pages = (int)ceil((float)$pages['pages']);

        // $builder = $this->modelsManager->createBuilder()
        // ->columns('id_goods, title_goods, photo_goods')
        // ->from(Goods::class)
        // ->where('id_cat_goods = :idcat:',['idcat'=>$id],[PDO::PARAM_INT])
        // ->limit($count,$from)
        // ->getQuery()
        // ->execute()
        // ->toarray();

        // echo '<div class="row text-center">
        // <a class="col">1</a>';
        // if ($list>$show) { 
        //     echo '<span class="col">...</span>'; 
        //     for ($i=0; $i <= $show; $i++) { 
        //         echo '<a class="col">'.$list-$show+$i.'</a>';
        //     }
        // }
        // for ($i=1; $i <= $show; $i++) { 
        //     echo '<a class="col">'.$list+$i.'</a>';
        // }
        // echo '<span class="col">...</span>';
        // echo '<a class="col">'.$pages.'<a></div>';
        // Через Билдер работает, но узнать стоит ли использовать с учетом необходимости сравнения перебором
        // $builder = $this->modelsManager->createBuilder()
        // ->columns("g.id_goods, g.title_goods, g.photo_goods")
        // ->from(["g"=>Goods::class])
        // ->where('g.id_cat_goods = :id:',["id"=>$id],["id"=>PDO::PARAM_INT]);

        // if ($brands !== null) {
        //     $builder->inWhere("g.id_brands_goods",$brands);
        // }

        // if (($min !== null) || ($max !== null)) {
        //     $builder->join(Prices::class,
        //     "g.id_goods = pr.id_good_prices","pr","LEFT")
        //     ->betweenWhere(
        //         'pr.value_prices',
        //         (int)$min,
        //         (int)$max
        //     );
        // }

        // $builder = $builder
        // ->groupBy(["g.id_goods"])
        // ->getQuery()
        // ->execute();
        // if ($params !== null) {
        //     $inparams = $this->modelsManager->createBuilder()
        //     ->columns("g.id_goods, g.title_goods, g.photo_goods")
        //     ->from(["g"=>Goods::class])
        //     ->join(Parametrsgoods::class,
        //     "pg.id_good_pg = g.id_goods","pg",'LEFT')
        //     ->inWhere('pg.value_pg', $params)
        //     ->having("COUNT(g.id_goods)=:count:",
        //     [
        //         "count"=>count($types)
        //     ],
        //     [
        //         "count" => PDO::PARAM_INT
        //     ])
        //     ->groupBy(["g.id_goods"])
        //     ->getQuery()
        //     ->execute();
        // }

        // echo "<pre>";

    }

    public function goodsAction($id)
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $this->view->goods = Goods::find('id_cat_goods=' . $id);
        $this->view->filter = Parametrs::find('id_cat_par=' . $id);
        $this->view->brands = Brands::find();

        $builder = $this->modelsManager->createBuilder()->columns('id_goods, title_goods, photo_goods')
            ->from(Goods::class)
            ->where('id_cat_goods = :idcat:', ['idcat' => $id], [PDO::PARAM_INT]);
        $paginator = new Paginator([
            'builder'  => $builder,
            'limit' => 12,
            'page'  => $this->request->getQuery('page', 'int', 1),
        ]);

        $this->view->setVar('page', $paginator->paginate());
        $this->view->pick("categories/paginator");
    }

    public function filterAction()
    {
        $id = $this->request->getPost('id');
        $min = $this->request->getPost('min');
        $max = $this->request->getPost('max');
        $brands = $this->request->getPost('brands');
        $types = $this->request->getPost('types');
        $params = $this->request->getPost('params');

        $in = "";
        $placeholders = ["id" => $id, "min" => $min, "max" => $max];
        $sql = 'SELECT g.id_goods, g.title_goods, g.photo_goods FROM goods as g 
        JOIN prices p ON g.id_goods = p.id_good_prices
        WHERE g.id_cat_goods=:id AND p.value_prices BETWEEN :min AND :max ';

        if ($brands !== null) {
            $in = "";
            foreach ($brands as $value) {
                $in .= ':brand' . $value . ',';
                $placeholders['brand' . $value] = $value;
            }
            $in = trim($in, ',');

            $sql .= 'AND g.id_brands_goods IN (' . $in . ')';
        }

        if ($params !== null) {
            $in = "";
            foreach ($params as $value) {
                $in .= ':param' . $value . ',';
                $placeholders['param' . $value] = $value;
            }
            $in = trim($in, ',');
            $placeholders['count'] = count($types);

            $sql .= 'AND g.id_goods IN 
            (SELECT goods.id_goods FROM parametrsgoods 
            INNER JOIN goods ON goods.id_goods = parametrsgoods.id_good_pg 
            WHERE parametrsgoods.id_val_pg IN (' . $in . ')
            GROUP BY parametrsgoods.id_good_pg HAVING COUNT(parametrsgoods.id_good_pg)=:count)';
        }

        $sql .= 'GROUP BY g.id_goods';
        $goods = $this->db->fetchAll($sql, 2, $placeholders);
        return json_encode($goods);
    }

    // public function paginatorAction(int $count, int $show)
    // {
    //     $list = $this->request->getQuery('page');

    //     if (empty($list)) {
    //         $list = 1;
    //     }

    //     $id = $this->dispatcher->getParam('id');
    //     // $count = 1;
    //     // $show = 1;
    //     $from = ($list - 1) * $count;
    //     $pages = $this->db->fetchOne('SELECT COUNT(id_goods)/' . $count . ' AS pages FROM goods  WHERE id_cat_goods=1');
    //     $pages = (int)ceil((float)$pages['pages']);

    //     $goods = $this->modelsManager->createBuilder()
    //         ->columns('id_goods, title_goods, photo_goods')
    //         ->from(Goods::class)
    //         ->where('id_cat_goods = :idcat:', ['idcat' => $id], [PDO::PARAM_INT])
    //         ->limit($count, $from)
    //         ->getQuery()
    //         ->execute();
    //     // Pages
    //     $paginatorCost = "";
    //     $paginatorCost .= '<div class="row text-center">';
    //     //left
    //     if ($list > $show) {
    //         $paginatorCost .= '<a class="col" href="?">1</a>';
    //         $paginatorCost .= '<span class="col">...</span>';
    //         for ($i = 0; $i <= $show; $i++) {
    //             $paginatorCost .= '<a class="col" href="?&page=' . $list - $show + $i . '">' . $list - $show + $i . '</a>';
    //         }
    //     } else {
    //         for ($i = 1; $i <= $show; $i++) {
    //             $paginatorCost .= '<a class="col" href="?&page=' . $i . '">' . $i . '</a>';
    //         }
    //     }
    //     // right
    //     if (($list <= ($pages - $show)) && ($list > ($show - 1))) {
    //         for ($i = 1; $i <= ($show - 1); $i++) {
    //             $paginatorCost .= '<a class="col" href="?&page=' . $list + $i . '">' . $list + $i . '</a>';
    //         }
    //         $paginatorCost .= '<span class="col">...</span>';
    //     }
    //     if ($list > ($pages - $show)) {
    //         for ($i = 1; $i < ($pages - $list); $i++) {
    //             $paginatorCost .= '<a class="col" href="?&page=' . $list + $i . '">' . $list + $i . '</a>';
    //         }
    //     }
    //     if ($list < ($pages)) {
    //         $paginatorCost .= '<a class="col" href="?&page=' . $pages . '">' . $pages . '</a></div>';
    //     }
        
    //     // var_dump($goods->toarray()); exit;
    //     // echo $paginatorCost; 

    //     $this->view->paginator = $paginatorCost;
    //     $this->view->goods = $goods;
    // }


    public function goodAction($id)
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $this->view->good = Goods::findFirst($id);
        $this->view->cat = Goods::findFirst($id)->categories;
        $this->view->brand = Goods::findFirst($id)->brands;
        // $this->view->prices = Goods::find($id)->prices;
        $param = $this->modelsManager->createBuilder()
            ->columns("v.val_pv,p.name_par")
            ->from(['pg' => Parametrsgoods::class])
            ->join(
                Parametrs::class,
                'pg.id_par_pg = p.id_par',
                'p',
                'LEFT'
            )
            ->join(
                Parametrsvalues::class,
                'v.id_pv=pg.id_par_pg',
                'v',
                'LEFT'
            )
            ->where("id_good_pg= :id:", ["id" => $id], ["id" => PDO::PARAM_INT])
            ->getQuery()
            ->execute();
        $this->view->param = $param;
    }
}
