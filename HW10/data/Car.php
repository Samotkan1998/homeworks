<?php

/**
 * Class Car value object.
 *
 * @author Lena
 * @copyright 2020
 */
class Car
{
    /** @var string */
    private $brand;

    /** @var string */
    private $type;

    /** @var int */
    private $numberOfWheels;

    /**
     * Car constructor.
     * @param string $brand
     * @param string $type
     * @param int $numberOfWheels
     */
    public function __construct(string $brand, string $type, int $numberOfWheels)
    {
        $this->brand = $brand;
        $this->type = $type;
        $this->numberOfWheels = $numberOfWheels;
    }

    /**
     * @return int
     */
    public function getNumberOfWheels(): int
    {
        return $this->NumberOfWheels;
    }

    /**
     * @return string
     */
    public function getType(): string
        {
            return $this->type;
        }
}