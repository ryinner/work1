<?
declare(strict_types=1);

namespace Vokuro\Controllers;

use Vokuro\Models\Categories;

class CategoriesController extends ControllerBase
{
    public function indexAction() {
        $this->view->categories = Categories::find();
    }

    // public function getAllAction($id)
    // {
        
    // }
}