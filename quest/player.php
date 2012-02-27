<?php
//iterator pattern
interface MyIterator {
	public function hasNext();
	public function getPlayerAt();
}
class Players {
	private $players;
	private $last;
	public function __construct ($max) {
		$this->last = $max;
	}
	public function add (Player $player) {
		$this->players[] = $player;
	}
	public function getCurrent ($index) {
		return $this->players[$index];
	}
	public function getLength () {
		return $this->last;
	}
	public function getIterator() {
		return new PlayersIterator($this);
	}
}
class PlayersIterator implements MyIterator {
	private $players;
	private $index;
	public function __construct (Players $players) {
		$this->players = $players;
		$this->index = 0;
	}
	public function hasNext () {
		if ($this->index < $this->players->getLength()) {
			return true;
		} else {
			return false;
		}
	}
	public function getPlayerAt () {
		$player = $this->players->getCurrent($this->index);
		$this->index++;
		return $player;
	}
	public function getSinglePlayer ($at) {
		$player = $this->players->getCurrent($at);
		return $player;
	}
}
class Player {
	var $name;
	var $player_hp;
	var $player_mp;
	var $player_job;
	public function __construct ($name, $player_hp, $player_mp, $player_job) {
		$this->name = $name;
		$this->player_hp = $player_hp;
		$this->player_mp = $player_mp;
		$this->player_job = $player_job;
	}
	public function getName () {
		return $this->name;
	}
	public function getPlayerHp () {
		return $this->player_hp;
	}
	public function getPlayerMp () {
		return $this->player_mp;
	}
	public function getPlayerJob () {
		return $this->player_job;
	}
	public function setPlayerJob ($job) {
		$this->player_job = $job;
	}
}
?>
