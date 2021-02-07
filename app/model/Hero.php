<?php

namespace App\Model;

use App\Helper\Range;

class Hero
{
    private $name;
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;

    public function __toString()
    {
        return "Health: $this->health " ;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }
    

    // - Static methods

    /**
     * Initialize Orderus object
     *
     * @return Hero
     */
    public static function initializeOrderus(): Hero
    {
        $RANGE_HEALTH = new Range(70, 100);
        $RANGE_STRENGTH = new Range(70, 80);
        $RANGE_DEFENCE = new Range(45, 55);
        $RANGE_SPEED = new Range(40, 50);
        $RANGE_LUCK = new Range(10, 30);

        $hero = new Hero();
        $hero->setName("beast");
        $hero->setHealth($RANGE_HEALTH->getRandom());
        $hero->setStrength($RANGE_STRENGTH->getRandom());
        $hero->setDefence($RANGE_DEFENCE->getRandom());
        $hero->setSpeed($RANGE_SPEED->getRandom());
        $hero->setLuck($RANGE_LUCK->getRandom());

        return $hero;
    }
}