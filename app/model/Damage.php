<?php

namespace App\Model;

use JsonSerializable;

class Damage implements JsonSerializable
{

    public static $SKILL_ATTACK_RAPID_STRIKE = "rapid_strike";
    public static $SKILL_DEFEND_MAGIC_SHIELD = "magic_shield";

    /**
     * @var int
     */
    protected $value;

    /**
     * Skills used for attack or defend
     * @var array
     */
    protected $skills;

    /**
     * Damage constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
        $this->skills = [];
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param array $skills
     */
    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * Add new skill used to defend or to attack
     *
     * @param string $skill
     * @return Damage
     */
    public function addSkill(string $skill): Damage
    {
        array_push($this->skills, $skill);
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            "value" => $this->value,
            "skills" => $this->skills,
        ];
    }

}