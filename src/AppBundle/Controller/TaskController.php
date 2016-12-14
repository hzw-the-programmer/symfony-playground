<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller {
    public function createAction() {
        $form = $this->createFormBuilder()->getForm();
        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }
}
