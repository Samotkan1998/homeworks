<?php


namespace App\Service;


use App\Dto\MovieDto;

interface SavedCatalogServiceInterface
{
    /**
     * Add film to favourites
     *
     * @param string $id
     * @return Array|null
     */
    public function addToFavourites(string $id): Array;


    /**
     * Remove film from favourites
     *
     * @param string $id
     * @return Array|null
     */
    public function removeFromFavourites(string $id): Array;

}