<?php

namespace App\Controller;

use App\Service\CatalogServiceInterface;
use App\Service\OmdbServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(CatalogServiceInterface $catalogService): Response
    {
        if (isset($_POST['movieTitle'])) {
            $title = $_POST['movieTitle'];
            $result = $catalogService->search($title);

        } else {
            $result = [];
        }

        return $this->render('search/index.html.twig', [
            'result' => $result,
        ]);
    }
}
