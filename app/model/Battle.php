<?php

namespace App\Model;

use JsonSerializable;

class Battle implements JsonSerializable
{

    /**
     * @var Hero
     */
    private $hero;

    /**
     * @var Monster
     */
    private $monster;

    /**
     * @var AbstractPlayer
     */
    private $winner;

    /**
     * @var int
     */
    private $numberOfTurnsPlayed;

    /**
     * @var array
     */
    private $rounds;

    /**
     * Battle constructor.
     * @param Hero $hero
     * @param Monster $monster
     */
    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
        $this->rounds = array();
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
    public function setHero(Hero $hero): Battle
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

    /**
     * @return AbstractPlayer
     */
    public function getWinner(): AbstractPlayer
    {
        return $this->winner;
    }

    /**
     * @param AbstractPlayer $winner
     */
    public function setWinner(AbstractPlayer $winner): void
    {
        $this->winner = $winner;
    }

    /**
     * @return int
     */
    public function getNumberOfTurnsPlayed(): int
    {
        return $this->numberOfTurnsPlayed;
    }

    /**
     * @param int $numberOfTurnsPlayed
     */
    public function setNumberOfTurnsPlayed(int $numberOfTurnsPlayed): void
    {
        $this->numberOfTurnsPlayed = $numberOfTurnsPlayed;
    }

    /**
     * @return array
     */
    public function getRounds(): array
    {
        return $this->rounds;
    }

    /**
     * @param array $rounds
     */
    public function setRounds(array $rounds): void
    {
        $this->rounds = $rounds;
    }

    /**
     * @param Round $round
     * @return Battle
     */
    public function addRound(Round $round): Battle
    {
        array_push($this->rounds, $round);
        return $this;
    }

    public function jsonSerialize(): array
    {
        $roundsSerialized = [];
        /**
         * @var Round $round
         */
        foreach ($this->rounds as $round) {
            array_push($roundsSerialized, $round->jsonSerialize());
        }

        return [
            "hero" => $this->hero->jsonSerialize(),
            "monster" => $this->monster->jsonSerialize(),
            "winner" => $this->winner->jsonSerialize(),
            "numberOfTurnsPlayed" => $this->numberOfTurnsPlayed,
            "rounds" => $roundsSerialized
        ];
    }


}