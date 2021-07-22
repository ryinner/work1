<?php
declare(strict_types=1);

namespace Vokuro\Controllers;

/**
 * Display the "About" page.
 */
class CheckController extends ControllerBase
{
    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function indexAction(): void
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
    }
}
