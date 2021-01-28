<?php


namespace App\Service;


use App\Dto\MovieDto;
use App\Repository\SavedMoviesCatalogRepository;

class SavedCatalogService implements SavedCatalogServiceInterface
{
    private $movieCatalogRepository;
    private $omdbService;

    public function __construct(SavedMoviesCatalogRepository $movieCatalogRepository, OmdbServiceInterface $omdbService)
    {
        $this->movieCatalogRepository = $movieCatalogRepository;
        $this->omdbService = $omdbService;
    }
    /**
     * Search film by title
     *
     * @param string $id
     * @return Array
     *
     */
    public function addToFavourites(string $id): Array
    {
        $isInDb = $this->movieCatalogRepository->findById($id);
        if(count($isInDb) == 0) {
            $movie = $this->omdbService->findById($id);
            $this->movieCatalogRepository->save($movie);
        }
        $result = $this->movieCatalogRepository->getAllFilms();

        $arr = [];
        for($i = 0; $i < count($result); $i++) {
           $temp = $result[$i]->toDto();
           array_push($arr, $temp);
        }
        return $arr;
    }

    public function removeFromFavourites(string $id): Array
    {
        $this->movieCatalogRepository->removeById($id);

        $result = $this->movieCatalogRepository->getAllFilms();

        $arr = [];
        for($i = 0; $i < count($result); $i++) {
            $temp = $result[$i]->toDto();
            array_push($arr, $temp);
        }
        return $arr;
    }

    public function getAllFilms(): Array
    {
        $result = $this->movieCatalogRepository->getAllFilms();

        $arr = [];
        for($i = 0; $i < count($result); $i++) {
            $temp = $result[$i]->toDto();
            array_push($arr, $temp);
        }
        return $arr;
    }


}