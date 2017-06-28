<?php

class HorariosDisponiveis{

	public $OitoManha;
	public $NoveManha;
   public $DezManha;
   public $OnzeManha;
   public $MeioDia;
   public $UmaTarde;
   public $DuasTarde;
   public $TresTarde;
   public $QuatroTarde;
   public $CincoTarde;

   public function __construct (array $disponibilidades){
      $this->OitoManha      = $disponibilidades[0];
      $this->NoveManha      = $disponibilidades[1];
      $this->DezManha       = $disponibilidades[2];
      $this->OnzeManha      = $disponibilidades[3];
      $this->MeioDia        = $disponibilidades[4];
      $this->UmaTarde       = $disponibilidades[5];
      $this->DuasTarde      = $disponibilidades[6];
      $this->TresTarde      = $disponibilidades[7];
      $this->QuatroTarde    = $disponibilidades[8];
      $this->CincoTarde     = $disponibilidades[9];
   }
}
?>