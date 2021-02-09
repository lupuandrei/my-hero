<?php

namespace App\Model;

use App\Helper\Range;

class Hero extends Player
{

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
        $hero->setName("andrei")
            ->setName("Orderus")
            ->setHealth($RANGE_HEALTH->getRandom())
            ->setStrength($RANGE_STRENGTH->getRandom())
            ->setDefence($RANGE_DEFENCE->getRandom())
            ->setSpeed($RANGE_SPEED->getRandom())
            ->setLuck($RANGE_LUCK->getRandom());

        return $hero;
    }
}