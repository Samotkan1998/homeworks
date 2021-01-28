<?php

namespace App\Repository;

use App\Dto\MovieDto;
use App\Entity\SavedMovieCatalog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavedMovieCatalog|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavedMovieCatalog|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavedMovieCatalog[]    findAll()
 * @method SavedMovieCatalog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavedMoviesCatalogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavedMovieCatalog::class);
    }

    public function findById(string $id): Array
    {
        $qb = $this->createQueryBuilder('saved');
        $query = $qb->where($qb->expr()->like('saved.imdbId', ':imdbId'))
            ->setParameter('imdbId', '%'.$id.'%')
            ->getQuery();
        return $query->getResult();
    }

    public function removeById(string $id): int
    {
        $qb = $this->createQueryBuilder('saved');
        $query = $qb->delete()->where($qb->expr()->like('saved.imdbId', ':imdbId'))
            ->setParameter('imdbId', '%'.$id.'%')
            ->getQuery();

        return $query->getResult();
    }

    public function getAllFilms(): Array
    {
        $qb = $this->createQueryBuilder('saved');
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function save(MovieDto $movieDto)
    {
        $movie = new SavedMovieCatalog();
        $movie->setTitle($movieDto->title)
            ->setImdbId($movieDto->imdbId)
            ->setPoster($movieDto->poster)
            ->setType($movieDto->type)
            ->setYear($movieDto->year);
        $this->getEntityManager()->persist($movie);
        $this->getEntityManager()->flush();
    }
}