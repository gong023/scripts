<?php
interface Job {
	public function getJobName();
	public function getSelfAppoint();
	public function getIntroduce();
	public function getAdditionalHp();
	public function getAdditionalMp();
}
class Soldier implements Job{
	var $job_name = 'せんし';
	var $self_appoint = 'オレ';
	var $introduce = '力だけが自慢だ';
	var $additional_hp = 83;
	var $additional_mp = 0;
	public function getJobName(){return $this->job_name;}
	public function getSelfAppoint(){return $this->self_appoint;}
	public function getIntroduce(){return $this->introduce;}
	public function getAdditionalHp(){return $this->additional_hp;}
	public function getAdditionalMp(){return $this->additional_mp;}
}
class Brave implements Job{
	var $job_name = 'ゆうしゃ';
	var $self_appoint = '僕';
	var $introduce = 'バランス型です';
	var $additional_hp = 60;
	var $additional_mp = 20;
	public function getJobName(){return $this->job_name;}
	public function getSelfAppoint(){return $this->self_appoint;}
	public function getIntroduce(){return $this->introduce;}
	public function getAdditionalHp(){return $this->additional_hp;}
	public function getAdditionalMp(){return $this->additional_mp;}
}
class Monk implements Job{
	var $job_name = 'そうりょ';
	var $self_appoint = '私';
	var $introduce = '回復は任せて';
	var $additional_hp = 38;
	var $additional_mp = 80;
	public function getJobName(){return $this->job_name;}
	public function getSelfAppoint(){return $this->self_appoint;}
	public function getIntroduce(){return $this->introduce;}
	public function getAdditionalHp(){return $this->additional_hp;}
	public function getAdditionalMp(){return $this->additional_mp;}
}
class JobFactory {
	public function create ($job) {
		$reader = $this->createReader($job);
		return $reader;
	}
	public function createReader($job) {
		if ($job === 'soldier') {
			return new Soldier;
		} else if ($job === 'brave') {
			return new Brave;
		} else if ($job === 'monk') {
			return new Monk;
		} else {
			die ('JobFactory faild');
		}
	}
}
?>
