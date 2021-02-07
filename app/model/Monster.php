<?php

namespace App\Model;

use App\Helper\Range;

class Monster
{
    private $name;
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;

    public function __toString()
    {
        return "Name: $this->name Health: $this->health";
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
     * Initialize a new beast
     *
     * @return Monster
     */
    public static function generateMonster(): Monster
    {
        $RANGE_HEALTH = new Range(70, 100);
        $RANGE_STRENGTH = new Range(70, 80);
        $RANGE_DEFENCE = new Range(45, 55);
        $RANGE_SPEED = new Range(40, 50);
        $RANGE_LUCK = new Range(10, 30);

        $monster = new Monster();
        $monster->setName("beast");
        $monster->setHealth($RANGE_HEALTH->getRandom());
        $monster->setStrength($RANGE_STRENGTH->getRandom());
        $monster->setDefence($RANGE_DEFENCE->getRandom());
        $monster->setSpeed($RANGE_SPEED->getRandom());
        $monster->setLuck($RANGE_LUCK->getRandom());

        return $monster;
    }

}