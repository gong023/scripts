<?php
require_once('quest.php');
?>
<?php
$quest = Quest::getQuest();
$player = $quest->runPlayer();
foreach($player as $key => $play) {
	$job = $quest->runJob($play['job']);
	$status = $quest->culculateStatus($play['hp'], $play['mp'], $job['hp'], $job['mp']);
	echo $play['name'].':'.$job['self_appoint'].'は「'.$job['name'].'」。'.$job['introduce'].'(HP '.$status['hp'].'/MP '.$status['mp'].')'.PHP_EOL;
}

sleep(1);
echo 'スライムの群れがあらわれた！'.PHP_EOL;
echo $quest->tatakau();
sleep(1);

$changed_player = $quest->jobChange(0, 'brave');
$changed_job = $quest->runJob($changed_player['job']);
$status = $quest->culculateStatus($changed_player['hp'], $changed_player['mp'], $changed_job['hp'], $changed_job['mp']);
echo $changed_player['name'].':'.$changed_job['self_appoint'].'は「'.$changed_job['name'].'」。'.$changed_job['introduce'].'(HP '.$status['hp'].'/MP '.$status['mp'].')'.PHP_EOL;

/*
-----------output-----------
player1:オレは「せんし」。力だけが自慢だ(HP 183/MP 0)
player2:私は「そうりょ」。回復は任せて(HP 152/MP 100)
player3:僕は「ゆうしゃ」。バランス型です(HP 180/MP 50)
player4:オレは「せんし」。力だけが自慢だ(HP 218/MP 0)
player5:私は「そうりょ」。回復は任せて(HP 128/MP 123)
スライムの群れがあらわれた！
player2はスライムに15のダメージを与えた
player1:僕は「ゆうしゃ」。バランス型です(HP 160/MP 20)
?>
