<?php


class Pilote {
	private $pil;
	private $pilNom;
	private $adr;
	
	/**
	 * 
	 * @param pil 		identifiant du pilote
	 * @param pilNom	nom du pilote
	 * @param adr		adresse du pilote
	 */
	public function __construct(string $pil, string $pilNom, string $adr) {
		$this->setPil($pil);
		$this->setPilNom($pilNom);
		$this->setAdr($adr);
	}
	
	// Getters and Setters
	public function getPil() {
		return $this->pil;
	}
	public function setPil($pil) {
		$this->pil = $pil;
	}
	public function getPilNom() {
		return $this->pilNom;
	}
	public function setPilNom($pilNom) {
		$this->pilNom = $pilNom;
	}
	public function getAdr() {
		return $this->adr;
	}
	public function setAdr($adr) {
		$this->adr = $adr;
	}
	
	public function __toString() {
		return $this->pilNom . " (id:" . $this->pil . ", adresse:" . $this->adr . ")";
	}
}
?>