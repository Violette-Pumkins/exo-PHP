<?php
class Pilote{
    private $pil;
    private $pilNom;
    private $adr;
    /**
     * @param string $pil
     * @param string $pilNom
     * @param string $adr
     * 
     * @return void
     */
    public function __construct(string $pil, string $pilNom, string $adr){
        
        $this->setPil($pil);
        $this->setPilNom($pilNom);
        $this->setAdr($adr);

    }

    public function getPil() :string
    {
        return $this->pil;
    }
    public function setPil(string $pil)
    {
        $this->pil=$pil;
    }
    public function getPilNom() :string
    {
        return $this->pilNom;
    }
    public function setPilNom(string $pilNom)
    {
        $this->pilNom=$pilNom;
    }
    public function getAdr() :string
    {
        return $this->adr;
    }
    public function setAdr(string $adr)
    {
        $this->adr=$adr;
    }


}
?>