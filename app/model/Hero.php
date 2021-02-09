<?php

namespace App\Model;

use App\Helper\Range;

class Hero extends AbstractPlayer
{
    /**
     * Strike twice while it’s his turn to attack;
     * there’s a 10% chance he’ll use this skill every time he attacks
     *
     * @var int
     */
    private $attackTwiceChance = 10;

    /**
     * Takes only half of the usual damage when an enemy attacks;
     * there’s a 20% change he’ll use this skill every time he defends.
     *
     * @var int
     */
    private $defenceShieldChance = 20;

    public function attack($defenderDefence): Damage
    {
        $damage = parent::attack($defenderDefence);
        if ($this->rapidStrike()) {
            $damage->setValue( $damage->getValue() * 2);
            $damage->addSkill(Damage::$SKILL_ATTACK_RAPID_STRIKE);
        }

        return $damage;
    }

    public function defend($damage): Damage
    {
        if ($this->magicShield()) {
            $damage->setValue($damage->getValue() / 2);
            $damage->addSkill(Damage::$SKILL_DEFEND_MAGIC_SHIELD);
        }

        return $damage;
    }

    // - SKILLS

    /**
     * Rapid Strike - strike twice while it's his turn to attack and
     * there is a 10% chance he use this skill
     * return bool
     * */
    private function rapidStrike() : bool
    {
        $range = new Range(1,100);
        return $range->getRandom() <= $this->attackTwiceChance;
    }

    /**
     * Magic shield - it takes only a half of the usual damage when he is attacked and
     * there are 20% chances of using this skill
     * return TRUE/FALSE
     * @return bool
     */
    private function magicShield() : bool
    {
        $range = new Range(1,100);
        return $range->getRandom() <= $this->defenceShieldChance;
    }


    /**
     * Initialize Orderus object
     *
     * @param string|null $name
     * @return AbstractPlayer
     */
    static public function generate(?string $name): AbstractPlayer
    {
        $RANGE_HEALTH = new Range(70, 100);
        $RANGE_STRENGTH = new Range(70, 80);
        $RANGE_DEFENCE = new Range(45, 55);
        $RANGE_SPEED = new Range(40, 50);
        $RANGE_LUCK = new Range(10, 30);

        $hero = new Hero();
        $hero->setName($name ?? "Orderus")
            ->setHealth($RANGE_HEALTH->getRandom())
            ->setStrength($RANGE_STRENGTH->getRandom())
            ->setDefence($RANGE_DEFENCE->getRandom())
            ->setSpeed($RANGE_SPEED->getRandom())
            ->setLuck($RANGE_LUCK->getRandom());

        return $hero;
    }

}