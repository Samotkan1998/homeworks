<?php


namespace App\Service;


use App\Dto\MovieDto;

interface CatalogServiceInterface
{
    /**
     * Add film to catalog
     *
     * @param string $id
     * @return Array|null
     */
    public function addToCatalog(string $id): Array;


    /**
     * Remove film from catalog
     *
     * @param string $id
     * @return Array|null
     */
    public function removeFromCatalog(string $id): Array;
}