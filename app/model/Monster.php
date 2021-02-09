<?php

namespace App\Model;

use App\Helper\Range;

class Monster extends AbstractPlayer
{
    /**
     * Generate a new monster
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

        $monster = new Monster();
        $monster->setName($name ?? "beast");
        $monster->setHealth($RANGE_HEALTH->getRandom());
        $monster->setStrength($RANGE_STRENGTH->getRandom());
        $monster->setDefence($RANGE_DEFENCE->getRandom());
        $monster->setSpeed($RANGE_SPEED->getRandom());
        $monster->setLuck($RANGE_LUCK->getRandom());

        return $monster;
    }

}