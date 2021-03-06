<?php

namespace App\Entity;

use App\Dto\MovieDto;
use App\Repository\SavedMovieCatalogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="savedfilms")
 * @ORM\Entity(repositoryClass=MovieCatalogRepository::class)
 */
class SavedMovieCatalog
{

    /**
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * @param mixed $imdbId
     * @return SavedMovieCatalog
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return SavedMovieCatalog
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     * @return SavedMovieCatalog
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $imdbId;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $poster;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }


    public function toDto(): MovieDto
    {
        $movieDto = new MovieDto();
        $movieDto->title = $this->title;
        $movieDto->year = $this->year;
        $movieDto->type = $this->type;
        $movieDto->imdbId = $this->imdbId;
        $movieDto->poster = $this->poster;
        return $movieDto;
    }
}
