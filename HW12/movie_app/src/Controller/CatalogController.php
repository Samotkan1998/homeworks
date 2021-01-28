<?php

namespace App\Controller;

use App\Service\CatalogServiceInterface;
use App\Service\OmdbServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class CatalogController extends AbstractController
{
    /**
     * @Route("/catalog", name="catalog")
     */
    public function index(CatalogServiceInterface $catalogService): Response
    {
        if(isset($_POST['action_type'])) {
            if($_POST['action_type'] == 'add') {
                if (isset($_POST['film_id'])) {
                    $film_id = $_POST['film_id'];
                    $result = $catalogService->addToCatalog($film_id);
                }
            } elseif($_POST['action_type'] == 'remove') {
                if (isset($_POST['film_id'])) {
                    $film_id = $_POST['film_id'];
                    $result = $catalogService->removeFromCatalog($film_id);
                }
            }
        } else {
            $result = $catalogService->getAllFilms();
        }

        return $this->render('catalog/index.html.twig', [
            'result' => $result,
        ]);
    }
}
