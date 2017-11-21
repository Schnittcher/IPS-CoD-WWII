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

    $this->RegisterVariableString("Username", "Username", "", 0);
    $this->RegisterVariableString("Platform", "Platform","", 1);
    $this->RegisterVariableString("Level", "Level","", 2);
    $this->RegisterVariableString("Prestige", "Prestige","", 3);

    $this->RegisterVariableString("Kills", "Kills","", 4);
    $this->RegisterVariableString("Deaths", "Deaths","", 5);
    $this->RegisterVariableString("Suicides", "Suicides","", 6);
    $this->RegisterVariableString("KDRatio", "KDRatio","", 7);
    $this->RegisterVariableString("BestKills", "BestKills","", 8);
    $this->RegisterVariableString("KillStreak", "KillStreak","", 9);
    $this->RegisterVariableString("WinStreak", "WinStreak","", 10);
    $this->RegisterVariableString("Headshots", "Headshots","", 11);
    $this->RegisterVariableString("Accuracy", "Accuracy","", 12);
    $this->RegisterVariableString("MatchesPlayed", "MatchesPlayed","", 13);
    $this->RegisterVariableString("MatchesCompleted", "MatchesCompleted","", 14);
    $this->RegisterVariableString("Losses", "Losses","", 15);
    $this->RegisterVariableString("Wins", "Wins","", 16);
    $this->RegisterVariableString("TimePlayed", "TimePlayed","", 17);
    $this->RegisterVariableString("TimePlayedAllies", "TimePlayedAllies","", 18);
    $this->RegisterVariableString("TimePlayedAxis", "TimePlayedAxis","", 19);
    $this->RegisterVariableString("Points", "Points","", 20);
    $this->RegisterVariableString("Score", "Score","", 21);
    $this->RegisterVariableString("BestScore", "BestScore","", 22);
    $this->RegisterVariableString("TotalXP", "TotalXP","", 23);
    $this->RegisterVariableString("Destructions", "Destructions","", 24);
    $this->RegisterVariableString("Captures", "Captures","", 25);

    $this->RegisterVariableString("Money", "Money","", 26);
    $this->RegisterVariableString("CurrentWinStreak", "CurrentWinStreak","", 27);
    $this->RegisterVariableString("PrestigeShopTokens", "PrestigeShopTokens","", 28);
    $this->RegisterVariableString("UnlockPoints", "UnlockPoints","", 29);
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
}
