<?
require __DIR__.'/../libs/cConnector.php';
require __DIR__.'/../libs/cMatch.php';
require __DIR__.'/../libs/cPlayer.php';

class IPS_CoD_WWII_Userstat extends IPSModule {

  public function Create() {
    //Never delete this line!
    parent::Create();
    $this->RegisterPropertyString("Username","");
    $this->RegisterPropertyString("Platform","");

    $this->RegisterVariableBoolean("Update", $this->Translate("Update"), 0, 0);
    $this->RegisterVariableString("Username", $this->Translate("Username"), "", 0);
    $this->RegisterVariableString("Platform", $this->Translate("Platform"),"", 1);
    $this->RegisterVariableInteger("Level", $this->Translate("Level"),"", 2);
    $this->RegisterVariableInteger("Prestige", $this->Translate("Prestige"),"", 3);

    $this->RegisterVariableInteger("Kills", $this->Translate("Kills"),"", 4);
    $this->RegisterVariableInteger("Deaths", $this->Translate("Deaths"),"", 5);
    $this->RegisterVariableInteger("Suicides", $this->Translate("Suicides"),"", 6);
    $this->RegisterVariableFloat("KDRatio", $this->Translate("KDRatio"),"", 7);
    $this->RegisterVariableInteger("BestKills", $this->Translate("Best Kills"),"", 8);
    $this->RegisterVariableInteger("KillStreak", $this->Translate("Kill Streak"),"", 9);
    $this->RegisterVariableInteger("WinStreak", $this->Translate("Win Streak"),"", 10);
    $this->RegisterVariableInteger("Headshots", $this->Translate("Headshots"),"", 11);
    $this->RegisterVariableFloat("Accuracy", $this->Translate("Accuracy"),"", 12);
    $this->RegisterVariableInteger("MatchesPlayed", $this->Translate("Matches Played"),"", 13);
    $this->RegisterVariableInteger("MatchesCompleted", $this->Translate("Matches Completed"),"", 14);
    $this->RegisterVariableInteger("Losses", $this->Translate("Losses"),"", 15);
    $this->RegisterVariableInteger("Wins", $this->Translate("Wins"),"", 16);
    $this->RegisterVariableInteger("TimePlayed", $this->Translate("Time Played"),"", 17);
    $this->RegisterVariableInteger("TimePlayedAllies", $this->Translate("Time Played Allies"),"", 18);
    $this->RegisterVariableInteger("TimePlayedAxis", $this->Translate("Time Played Axis"),"", 19);
    $this->RegisterVariableInteger("Points", $this->Translate("Points"),"", 20);
    $this->RegisterVariableInteger("Score", $this->Translate("Score"),"", 21);
    $this->RegisterVariableInteger("BestScore", $this->Translate("Best Score"),"", 22);
    $this->RegisterVariableInteger("TotalXP", $this->Translate("TotalXP"),"", 23);
    $this->RegisterVariableInteger("Destructions", $this->Translate("Destructions"),"", 24);
    $this->RegisterVariableInteger("Captures", $this->Translate("Captures"),"", 25);

    $this->RegisterVariableFloat("Money", $this->Translate("Money"),"", 26);
    $this->RegisterVariableInteger("CurrentWinStreak", $this->Translate("Current Win Streak"),"", 27);
    $this->RegisterVariableInteger("PrestigeShopTokens", $this->Translate("Prestige Shop Tokens"),"", 28);
    $this->RegisterVariableInteger("UnlockPoints", $this->Translate("Unlock Points"),"", 29);

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

    SetValue($this->GetIDForIdent("Kills"), $Player->getKills());
    SetValue($this->GetIDForIdent("Deaths"), $Player->getDeaths());
    SetValue($this->GetIDForIdent("Suicides"), $Player->getSuicides());
    SetValue($this->GetIDForIdent("KDRatio"), $Player->getKdRatio());
    SetValue($this->GetIDForIdent("BestKills"), $Player->getBestKills());
    SetValue($this->GetIDForIdent("KillStreak"), $Player->getKillStreak());
    SetValue($this->GetIDForIdent("WinStreak"), $Player->getWinStreak());
    SetValue($this->GetIDForIdent("Headshots"), $Player->getHeadshots());
    SetValue($this->GetIDForIdent("Accuracy"), $Player->getAccuracy());
    SetValue($this->GetIDForIdent("MatchesPlayed"), $Player->getMatchesPlayed());
    SetValue($this->GetIDForIdent("MatchesCompleted"), $Player->getMatchesCompleted());
    SetValue($this->GetIDForIdent("Losses"), $Player->getLosses());
    SetValue($this->GetIDForIdent("Wins"), $Player->getWins());
    SetValue($this->GetIDForIdent("TimePlayed"), $Player->getTimePlayed());
    SetValue($this->GetIDForIdent("TimePlayedAllies"), $Player->getTimePlayedAllies());
    SetValue($this->GetIDForIdent("TimePlayedAxis"), $Player->getTimePlayedAxis());
    SetValue($this->GetIDForIdent("Points"), $Player->getPoints());
    SetValue($this->GetIDForIdent("Score"), $Player->getScore());
    SetValue($this->GetIDForIdent("BestScore"), $Player->getBestScore());
    SetValue($this->GetIDForIdent("TotalXP"), $Player->getTotalXP());
    SetValue($this->GetIDForIdent("Destructions"), $Player->getDestructions());
    SetValue($this->GetIDForIdent("Captures"), $Player->getCaptures());

    SetValue($this->GetIDForIdent("Money"), $Player->getMoney());
    SetValue($this->GetIDForIdent("CurrentWinStreak"), $Player->getCurrentWinStreak());
    SetValue($this->GetIDForIdent("PrestigeShopTokens"), $Player->getPrestigeShopTokens());
    SetValue($this->GetIDForIdent("UnlockPoints"), $Player->getUnlockPoints());
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
