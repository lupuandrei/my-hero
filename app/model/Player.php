<?php

namespace App\Model;

class Player
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $strength;

    /**
     * @var int
     */
    protected $defence;

    /**
     * @var int
     */
    protected $speed;

    /**
     * @var int
     */
    protected $luck;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Player
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return $this
     */
    public function setHealth(int $health): Player
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     * @return $this
     */
    public function setStrength(int $strength): Player
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     * @return $this
     */
    public function setDefence(int $defence): Player
    {
        $this->defence = $defence;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     * @return $this
     */
    public function setSpeed(int $speed): Player
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     * @return $this
     */
    public function setLuck(int $luck): Player
    {
        $this->luck = $luck;
        return $this;
    }


    /**
     * Calculate the damage by subtracting defender's defence from attacker's strength
     *
     * @param $attackerStrength
     * @param $defenderDefence
     * @return int damage
     */
    public function attack($attackerStrength, $defenderDefence): int
    {
        return (int)($attackerStrength - $defenderDefence);
    }

    /**
     * @param $damage
     * @return mixed
     */
    public function defend($damage)
    {

        return $damage;

    }

    public function __toString()
    {
        return "Name: $this->name Health: $this->health";
    }


}