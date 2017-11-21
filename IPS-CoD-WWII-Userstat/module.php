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
    $this->RegisterVariableInteger("Level", "Level","", 2);
    $this->RegisterVariableInteger("Prestige", "Prestige","", 3);

    $this->RegisterVariableInteger("Kills", "Kills","", 4);
    $this->RegisterVariableInteger("Deaths", "Deaths","", 5);
    $this->RegisterVariableInteger("Suicides", "Suicides","", 6);
    $this->RegisterVariableFloat("KDRatio", "KDRatio","", 7);
    $this->RegisterVariableInteger("BestKills", "BestKills","", 8);
    $this->RegisterVariableInteger("KillStreak", "KillStreak","", 9);
    $this->RegisterVariableInteger("WinStreak", "WinStreak","", 10);
    $this->RegisterVariableInteger("Headshots", "Headshots","", 11);
    $this->RegisterVariableFloat("Accuracy", "Accuracy","", 12);
    $this->RegisterVariableInteger("MatchesPlayed", "MatchesPlayed","", 13);
    $this->RegisterVariableInteger("MatchesCompleted", "MatchesCompleted","", 14);
    $this->RegisterVariableInteger("Losses", "Losses","", 15);
    $this->RegisterVariableInteger("Wins", "Wins","", 16);
    $this->RegisterVariableInteger("TimePlayed", "TimePlayed","", 17);
    $this->RegisterVariableInteger("TimePlayedAllies", "TimePlayedAllies","", 18);
    $this->RegisterVariableInteger("TimePlayedAxis", "TimePlayedAxis","", 19);
    $this->RegisterVariableInteger("Points", "Points","", 20);
    $this->RegisterVariableInteger("Score", "Score","", 21);
    $this->RegisterVariableInteger("BestScore", "BestScore","", 22);
    $this->RegisterVariableInteger("TotalXP", "TotalXP","", 23);
    $this->RegisterVariableInteger("Destructions", "Destructions","", 24);
    $this->RegisterVariableInteger("Captures", "Captures","", 25);

    $this->RegisterVariableFloat("Money", "Money","", 26);
    $this->RegisterVariableInteger("CurrentWinStreak", "CurrentWinStreak","", 27);
    $this->RegisterVariableInteger("PrestigeShopTokens", "PrestigeShopTokens","", 28);
    $this->RegisterVariableInteger("UnlockPoints", "UnlockPoints","", 29);
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
