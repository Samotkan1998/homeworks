<?php

namespace App\Controller;

use App\Service\SavedCatalogServiceInterface;
use App\Service\OmdbServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class SavedCatalogController extends AbstractController
{
    /**
     * @Route("/favourites", name="favourites")
     */
    public function index(SavedCatalogServiceInterface $catalogService): Response
    {
        if(isset($_POST['action_type'])) {
            if($_POST['action_type'] == 'add') {
                if (isset($_POST['film_id'])) {
                    $film_id = $_POST['film_id'];
                    $result = $catalogService->addToFavourites($film_id);
                }
            } elseif($_POST['action_type'] == 'remove') {
                if (isset($_POST['film_id'])) {
                    $film_id = $_POST['film_id'];
                    $result = $catalogService->removeFromFavourites($film_id);
                }
            }
        } else {
            $result = $catalogService->getAllFilms();
        }

        return $this->render('favourites/index.html.twig', [
            'result' => $result,
        ]);
    }
}
