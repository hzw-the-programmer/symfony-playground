<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller {
    public function createAction() {
        $form = $this->createForm('Symfony\Component\Form\Extension\Core\Type\DateType');
        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }
}
