<?php

namespace App\Model;

use App\Helper\Range;

class Hero extends AbstractPlayer
{
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
        $hero->setName("andrei")
            ->setName( $name ?? "Orderus")
            ->setHealth($RANGE_HEALTH->getRandom())
            ->setStrength($RANGE_STRENGTH->getRandom())
            ->setDefence($RANGE_DEFENCE->getRandom())
            ->setSpeed($RANGE_SPEED->getRandom())
            ->setLuck($RANGE_LUCK->getRandom());

        return $hero;
    }

}