<?php

namespace Operateur\TelecomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirectToRoute('get_all');
    }
}
