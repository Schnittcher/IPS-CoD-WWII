<?
require __DIR__.'/../libs/cConnector.php';
require __DIR__.'/../libs/cMatch.php';
require __DIR__.'/../libs/cPlayer.php';

class IPS_CoD_WWII extends IPSModule {

  public function Create() {
    //Never delete this line!
    parent::Create();
    $this->RegisterPropertyString("Username","");
    $this->RegisterPropertyString("Platform","");

    $this->RegisterVariableString("Username", "Username");
    $this->RegisterVariableString("Platform", "Platform");

  }

  public function ApplyChanges() {
      //Never delete this line!
      parent::ApplyChanges();
      $this->getPlayerStats();
  }

  private function getPlayerStats() {
    $Connector = new Connector($this->ReadPropertyString("Platform"),$this->ReadPropertyString("Username"));
    $Player = new Player($Connector->getPlayer());

    SetValue($this->GetIDForIdent("Username"), $Player->getUsername());
    SetValue($this->GetIDForIdent("Username"), $Player->getPlatform());
  }
}
