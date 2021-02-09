<?php

namespace App\Model;

use JsonSerializable;

class Round implements JsonSerializable
{

    /**
     * @var int
     */
    private $turnNumber;

    /**
     * @var string
     */
    private $attackerName;

    /**
     * @var string
     */
    private $defenderName;

    /**
     * The skills which were used into the current round
     * @var array
     */
    private $skillsUsed;

    /**
     * The damage provoked by the attacker into the current round
     * @var int
     */
    private $damage;

    /**
     * Has skipped the defender the hit?
     * @var bool
     */
    private $hasDefenderSkippedAttack;

    /**
     * Hero's info after each round
     *
     * @var Hero
     */
    private $hero;

    /**
     * Monster's info after each round
     * @var Monster
     */
    private $monster;

    /**
     * Round constructor.
     * @param int $turnNumber
     */
    public function __construct(int $turnNumber)
    {
        $this->turnNumber = $turnNumber;
        $this->skillsUsed = [];
    }


    /**
     * @return int
     */
    public function getTurnNumber(): int
    {
        return $this->turnNumber;
    }

    /**
     * @param int $turnNumber
     * @return $this
     */
    public function setTurnNumber(int $turnNumber): Round
    {
        $this->turnNumber = $turnNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttackerName(): string
    {
        return $this->attackerName;
    }

    /**
     * @param string $attackerName
     * @return $this
     */
    public function setAttackerName(string $attackerName): Round
    {
        $this->attackerName = $attackerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefenderName(): string
    {
        return $this->defenderName;
    }

    /**
     * @param string $defenderName
     * @return Round
     */
    public function setDefenderName(string $defenderName): Round
    {
        $this->defenderName = $defenderName;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkillsUsed(): array
    {
        return $this->skillsUsed;
    }

    /**
     * @param array $skillsUsed
     */
    public function setSkillsUsed(array $skillsUsed): void
    {
        $this->skillsUsed = $skillsUsed;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * @return bool
     */
    public function isHasDefenderSkippedAttack(): bool
    {
        return $this->hasDefenderSkippedAttack;
    }

    /**
     * @param bool $hasDefenderSkippedAttack
     * @return $this
     */
    public function setHasDefenderSkippedAttack(bool $hasDefenderSkippedAttack): Round
    {
        $this->hasDefenderSkippedAttack = $hasDefenderSkippedAttack;
        return $this;
    }

    /**
     * @return Hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * @param Hero $hero
     * @return $this
     */
    public function setHero(Hero $hero): Round
    {
        $this->hero = $hero;
        return $this;
    }

    /**
     * @return Monster
     */
    public function getMonster(): Monster
    {
        return $this->monster;
    }

    /**
     * @param Monster $monster
     * @return $this
     */
    public function setMonster(Monster $monster): Round
    {
        $this->monster = $monster;
        return $this;
    }


    public function jsonSerialize(): array
    {

        /*
         {
  "hero": {
    "name": "orderus",
    "strenght": 80,
    "health": 49
  },
  "monster": {
    "name": "beast",
    "strenght": 69,
    "health":70
  },
  "battle": {
    "winner": "hero",
    "number_of_figths": 30,
    "rounds": {
      "turn": 1,
      "attacker_name": "Beast",
      "defender_name": "Orderus",
      "skills": ["magic_shiled"],
      "damage": 11,
      ""
      "hero": {
        "health": ""
      }
    }
  }
}
         */
        return [
            "turn" => $this->turnNumber,
            "attackerName" => $this->attackerName,
            "defenderName" => $this->defenderName,
            "skills" => $this->skillsUsed,
            "damage" => $this->damage,
            "hero" => $this->hero->jsonSerialize(),
            "monster" => $this->monster->jsonSerialize(),
            "hasDefenderSkippedAttack" => $this->hasDefenderSkippedAttack
        ];
    }
}