<?php


namespace App\Service;


use App\Dto\MovieDto;

interface OmdbServiceInterface
{
    /**
     * Find film by ID.
     *
     * @param int $id
     * @return array
     */
    public function findById(string $id): ?MovieDto;

    /**
     * Find film by title.
     *
     * @param string $title
     * @return array
     */
    public function findSingleByTitle(string $title): ?MovieDto;

    /**
     * Find films by title.
     *
     * @param string $title
     * @return array
     */
    public function findByTitle(string $title): Array;
}
