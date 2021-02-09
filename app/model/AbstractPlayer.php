<?php

namespace App\Model;

use App\Helper\Range;
use JsonSerializable;

abstract class AbstractPlayer implements JsonSerializable
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

    // - BUSINESS LOGIC

    /**
     * Calculate the damage by subtracting defender's defence from the player's strength
     *
     * @param $defenderDefence
     * @return Damage damage
     */
    public function attack(int $defenderDefence): Damage
    {
        $damageValue = (int)($this->strength - $defenderDefence);
        return new Damage($damageValue);
    }

    /**
     * @param $damage
     * @return Damage damage
     */
    public function defend(Damage $damage): Damage
    {
        return $damage;
    }

    /**
     * Subtract health
     *
     * @param Damage $damage
     * @return $this
     */
    public function subtractHealth(Damage $damage): AbstractPlayer
    {
        $this->health -= $damage->getValue();
        return $this;
    }

    /**
     * Check if the player/defender was lucky and if he has skipped the attack
     *
     * "An attacker can miss their hit and
     * do no damage if the defender gets lucky that turn."
     * @return bool
     */
    public function hasSkippedTheAttack(): bool
    {
        $range = new Range(1, 100);
        return $range->getRandom() <= $this->getLuck();
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    // - MAGIC METHODS

    public function __toString()
    {
        return "Name: $this->name Health: $this->health";
    }

    // - ABSTRACT METHODS

    /**
     * @param ?string $name
     * @return AbstractPlayer
     */
    abstract static public function generate(?string $name): AbstractPlayer;



    // - GETTERS &  SETTERS

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): AbstractPlayer
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
    public function setHealth(int $health): AbstractPlayer
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
    public function setStrength(int $strength): AbstractPlayer
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
    public function setDefence(int $defence): AbstractPlayer
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
    public function setSpeed(int $speed): AbstractPlayer
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
    public function setLuck(int $luck): AbstractPlayer
    {
        $this->luck = $luck;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "health" => $this->health,
            "strength" => $this->strength,
            "defence" => $this->defence,
            "speed" => $this->speed,
            "luck" => $this->luck,
        ];
    }


}