<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use Spatie\Browsershot\Browsershot;

class CvExportController extends AbstractController
{
    #[Route('/cv/download', name: 'app_cv_download')]
    public function download(): BinaryFileResponse
    {
        $url = 'http://localhost:8000/'; // musi być widoczna publicznie

        $pdfPath = sys_get_temp_dir() . '/cv.pdf';

        Browsershot::url('http://localhost:8000/')
            ->waitUntilNetworkIdle()
            ->emulateMedia('print') // <- KLUCZ!
            ->timeout(60)
            ->setDelay(1000)
            ->noSandbox()
            ->format('A4')
            ->showBackground()              // <- renderuje kolory tła
            ->savePdf($pdfPath);


        return new BinaryFileResponse($pdfPath);
    }
}

