<?php

namespace App\Manager;

use App\Model\AbstractPlayer;
use App\Model\Hero;
use App\Model\Monster;

class BattleManager
{
    private static $TURNS_DEFAULT = 20;

    /**
     * @var Hero
     */
    private $orderus;

    /**
     * @var Monster
     */
    private $monster;

    /**
     * @var int
     */
    private $turns;


    /**
     * @var AbstractPlayer
     */
    private $currentAttacker;

    /**
     * @var AbstractPlayer
     */
    private $currentDefender;

    /**
     * The damage of after an attack.
     * It will be update after each attack
     *
     * @var int
     */
    private $damage;


    /**
     * BattleManager constructor.
     * @param Hero $orderus
     * @param Monster $monster
     */
    public function __construct(Hero $orderus, Monster $monster)
    {
        $this->orderus = $orderus;
        $this->monster = $monster;

        // could be set in constructor
        $this->turns = self::$TURNS_DEFAULT;
    }

    public function battle()
    {
        $this->initializeBattle();

        print_r($this->currentAttacker);
        print_r($this->currentDefender);
        $this->fight();
    }

    /**
     *  Initialize the battle. First attack is made by the fastest or the luckiest
     *
     * "The first attack is done by the player with the higher speed. If both players have the same speed,
     * than the attack is carried on by the player with the highest luck."
     */
    private function initializeBattle()
    {
        if ($this->orderus->getSpeed() == $this->monster->getSpeed()) {
            $this->currentAttacker = ($this->orderus->getLuck() > $this->monster->getLuck()) ? $this->orderus : $this->monster;
        } else {
            $this->currentAttacker = ($this->orderus->getSpeed() > $this->monster->getSpeed()) ? $this->orderus : $this->monster;
        }

        $this->currentDefender = $this->getOpposite($this->orderus, $this->monster, $this->currentAttacker);
    }

    /**
     * @return bool
     */
    private function fight()
    {
        $isLuckyDefender = FALSE;
        if (!$this->currentDefender->hasSkippedTheAttack()) {
            $this->attack();
            $this->defend();

            $this->currentDefender->subtractHealth($this->damage);
        } else {
            $isLuckyDefender = TRUE;
        }

        $this->currentDefender = $this->currentAttacker;
        $this->currentAttacker = $this->getOpposite($this->orderus, $this->monster, $this->currentAttacker);

        return $isLuckyDefender;
    }

    /**
     * The attack of the battle and set the defender damage
     */
    private function attack()
    {
        $this->damage = $this->currentAttacker->attack($this->currentDefender->getDefence());
    }

    /**
     * The defend of the battle and set the defender damage
     */
    private function defend()
    {
        $this->damage = $this->currentDefender->defend($this->damage);
    }

    /**
     * Gets the opposite player/participant
     *
     * @param AbstractPlayer $attacker
     * @param AbstractPlayer $defender
     * @param AbstractPlayer $currentAttacker
     * @return AbstractPlayer the opposite of current attacker
     */
    private function getOpposite(AbstractPlayer $attacker, AbstractPlayer $defender, AbstractPlayer $currentAttacker): AbstractPlayer
    {
        // todo: find a better solution to compare
        if ($currentAttacker->getName() == $attacker->getName()) {
            return $defender;
        } elseif ($currentAttacker->getName() == $defender->getName()) {
            return $attacker;
        }
        return $currentAttacker;
    }


}