<?php
require_once('job.php');
require_once('player.php');
?>
<?php
class Quest {
	private $players;
	private $factory;
	private $iterator;
	private static $instance;

	private function __construct () {
		$this->players = new Players(5);
		$this->players->add(new Player('naoya', 100 ,0, 'soldier'));
		$this->players->add(new Player('hirayama', 114 ,20, 'monk'));
		$this->players->add(new Player('2y', 120 , 30, 'brave'));
		$this->players->add(new Player('ku', 135 ,0, 'soldier'));
		$this->players->add(new Player('saito', 90, 43, 'monk'));

		$this->iterator = $this->players->getIterator();
		$this->factory = new JobFactory();
	}
	public static function getQuest () {
		if (!isset(self::$instance)) {
			self::$instance =  new Quest();
		}
		return self::$instance;
	}
	public final function __clone () {
		throw new RuntimeException ('Clone is not allowed against'.get_class($this));
	}
	public function culculateStatus ($player_hp, $player_mp, $job_hp, $job_mp) {
		$status = array (
			'hp' => $player_hp + $job_hp,
			'mp' => $player_mp + $job_mp,
		);
		return $status;
	}
	public function jobChange ($at, $job) {
		$player = $this->iterator->getSinglePlayer($at);
		$player->setPlayerJob($job);
		$player = $this->iterator->getSinglePlayer($at);
		$changed_player = array();
		$changed_player['name'] = $player->getName();
		$changed_player['hp'] = $player->getPlayerHp();
		$changed_player['mp'] = $player->getPlayerMp();
		$changed_player['job'] = $player->getPlayerJob();
		return $changed_player;
	}
	public function runPlayer () {
		$player_param = array();
		$i = 0;
		while($this->iterator->hasNext()) {
			$player = $this->iterator->getPlayerAt();
			$player_param[$i]['name'] = $player->getName();
			$player_param[$i]['hp'] = $player->getPlayerHp();
			$player_param[$i]['mp'] = $player->getPlayerMp();
			$player_param[$i]['job'] = $player->getPlayerJob();
			$i++;
		}
		return $player_param;
	}
	public function runJob ($player_job) {
		$job_param = array();
		$job = $this->factory->create($player_job);
		$job_param['name'] = $job->getJobName();
		$job_param['self_appoint'] = $job->getSelfAppoint();
		$job_param['introduce'] = $job->getIntroduce();
		$job_param['hp'] = $job->getAdditionalHp();
		$job_param['mp'] = $job->getAdditionalMp();
		return $job_param;
	}
	public function tatakau () {
		$attack_player = $this->iterator->getSinglePlayer(1);
		return  $attack_player->getName().'はスライムに15のダメージを与えた'.PHP_EOL;
	}
}
?>
