<?php

class Buzz {
	public function __construct($n,$v,$a) {
		$this->nouns = explode("\n",trim(file_get_contents($n)));
		$this->verbs = explode("\n",trim(file_get_contents($v)));
		$this->adjectives = explode("\n",trim(file_get_contents($a)));
	}
	public function pick($set) {
		return $set[rand(0,count($set)-1)];
	}
	public function words($n=1) {
		if($n == 1) {
			return ucfirst($this->pick($this->nouns));
		} else if($n == 2) {
			return ucfirst($this->pick($this->verbs)) . ' ' . $this->pick($this->nouns);
		} else {
			return ucfirst($this->pick($this->verbs)) . ' ' . $this->pick($this->adjectives) . ' ' . $this->pick($this->nouns);
		}
	}
}