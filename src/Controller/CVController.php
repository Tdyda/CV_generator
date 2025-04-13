<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CVController extends AbstractController
{
    #[Route('/', name: 'app_cv')]
    public function showCv(): Response
    {
        return $this->render('cv/cv.html.twig');
    }
}
