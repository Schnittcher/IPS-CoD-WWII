<?
require __DIR__.'/../libs/cConnector.php';
require __DIR__.'/../libs/cMatch.php';
require __DIR__.'/../libs/cPlayer.php';

class IPS_CoD_WWII_Weeklystat extends IPSModule {

  public function Create() {
    //Never delete this line!
    parent::Create();
    $this->RegisterPropertyString("Username","");
    $this->RegisterPropertyString("Platform","");

    $this->RegisterVariableBoolean("Update", $this->Translate("Update"), "~Switch", 0);
    $this->RegisterVariableString("Username", $this->Translate("Username"), "", 0);
    $this->RegisterVariableString("Platform", $this->Translate("Platform"),"", 1);
    $this->RegisterVariableInteger("Level", $this->Translate("Level"),"", 2);
    $this->RegisterVariableInteger("Prestige", $this->Translate("Prestige"),"", 3);

    $this->RegisterVariableInteger("Kills", $this->Translate("Kills"),"", 4);
    $this->RegisterVariableInteger("Deaths", $this->Translate("Deaths"),"", 5);
    $this->RegisterVariableInteger("Assists", $this->Translate("Assists"),"", 6);
    $this->RegisterVariableFloat("KDRatio", $this->Translate("KDRatio"),"", 7);
    $this->RegisterVariableInteger("ShotsFired", $this->Translate("Shots Fired"),"", 8);
    $this->RegisterVariableInteger("ShotsLanded", $this->Translate("Shots Landed"),"", 9);
    $this->RegisterVariableInteger("ShotsMissed", $this->Translate("Shots Missed"),"", 10);
    $this->RegisterVariableInteger("Headshots", $this->Translate("Headshots"),"", 11);
    $this->RegisterVariableFloat("Accuracy", $this->Translate("Accuracy"),"", 12);
    $this->RegisterVariableInteger("MatchesPlayed", $this->Translate("Matches Played"),"", 13);
    $this->RegisterVariableInteger("Losses", $this->Translate("Losses"),"", 15);
    $this->RegisterVariableInteger("Wins", $this->Translate("Wins"),"", 16);
    $this->RegisterVariableInteger("TimePlayed", $this->Translate("Time Played"),"", 17);
    $this->RegisterVariableInteger("Score", $this->Translate("Score"),"", 21);
    $this->RegisterVariableFloat("ScorePerMinute", $this->Translate("Score per Minute"),"", 22);
    $this->RegisterVariableInteger("TotalXP", $this->Translate("TotalXP"),"", 23);

    $this->EnableAction("Update");
  }

  public function ApplyChanges() {
      //Never delete this line!
      parent::ApplyChanges();
      if (($this->ReadPropertyString("Platform") != "") AND ($this->ReadPropertyString("Username") != "")) {
        $this->getPlayerStats();
      }
  }

  private function getPlayerStats() {
    $Connector = new Connector($this->ReadPropertyString("Platform"),$this->ReadPropertyString("Username"));
    $Player = new Player($Connector->getPlayer());

    SetValue($this->GetIDForIdent("Username"), $Player->getUsername());
    SetValue($this->GetIDForIdent("Platform"), $Player->getPlatform());
    SetValue($this->GetIDForIdent("Level"), $Player->getLevel());
    SetValue($this->GetIDForIdent("Prestige"), $Player->getPrestige());

    SetValue($this->GetIDForIdent("Kills"), $Player->getWeeklyKills());
    SetValue($this->GetIDForIdent("Deaths"), $Player->getWeeklyDeaths());
    SetValue($this->GetIDForIdent("Assists"), $Player->getWeeklyAssists());
    SetValue($this->GetIDForIdent("KDRatio"), $Player->getWeeklyKdRatio());
    SetValue($this->GetIDForIdent("ShotsFired"), $Player->getWeeklyShotsFired());
    SetValue($this->GetIDForIdent("ShotsLanded"), $Player->getWeeklyShotsLanded());
    SetValue($this->GetIDForIdent("ShotsMissed"), $Player->getWeeklyShotsMissed());
    SetValue($this->GetIDForIdent("Headshots"), $Player->getWeeklyHeadshots());
    SetValue($this->GetIDForIdent("Accuracy"), $Player->getWeeklyAccuracy());
    SetValue($this->GetIDForIdent("MatchesPlayed"), $Player->getWeeklyMatchesPlayed());
    SetValue($this->GetIDForIdent("Losses"), $Player->getWeeklyLosses());
    SetValue($this->GetIDForIdent("Wins"), $Player->getWeeklyWins());
    SetValue($this->GetIDForIdent("TimePlayed"), $Player->getWeeklyTimePlayed());
    SetValue($this->GetIDForIdent("Score"), $Player->getWeeklyScore());
    SetValue($this->GetIDForIdent("ScorePerMinute"), $Player->getWeeklyScorePerMinute());
    SetValue($this->GetIDForIdent("TotalXP"), $Player->getWeeklyTotalXP());
  }

  public function RequestAction($Ident, $Value) {
      switch($Ident) {
          case "Update":
              $this->getPlayerStats();
              SetValue($this->GetIDForIdent("Update"),0);
              break;
          default:
              throw new Exception("Invalid Ident");
      }
  }
}
