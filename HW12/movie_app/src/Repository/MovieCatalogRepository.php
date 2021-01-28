<?php

namespace App\Repository;

use App\Dto\MovieDto;
use App\Entity\MovieCatalog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovieCatalog|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieCatalog|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieCatalog[]    findAll()
 * @method MovieCatalog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieCatalogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieCatalog::class);
    }

    public function findById(string $id): Array
    {
        $qb = $this->createQueryBuilder('catalog');
        $query = $qb->where($qb->expr()->like('catalog.imdbId', ':imdbId'))
            ->setParameter('imdbId', '%'.$id.'%')
            ->getQuery();
        return $query->getResult();
    }

    public function removeById(string $id): int
    {
        $qb = $this->createQueryBuilder('catalog');
        $query = $qb->delete()->where($qb->expr()->like('catalog.imdbId', ':imdbId'))
            ->setParameter('imdbId', '%'.$id.'%')
            ->getQuery();

        return $query->getResult();
    }

    public function getAllFilms(): Array
    {
        $qb = $this->createQueryBuilder('catalog');
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function save(MovieDto $movieDto)
    {
        $movie = new MovieCatalog();
        $movie->setTitle($movieDto->title)
            ->setImdbId($movieDto->imdbId)
            ->setPoster($movieDto->poster)
            ->setType($movieDto->type)
            ->setYear($movieDto->year);
        $this->getEntityManager()->persist($movie);
        $this->getEntityManager()->flush();
    }
}