<?php
namespace App\Controllers;

class DefaultController extends BaseController
{
    public function index()
    {
        $this->renderHTML('../app/Views/default.php');
    }

    function showAction()
    {
        $this->renderHTML('..\views\holamundo_view.php', $data);
    }
}
