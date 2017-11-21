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
    $this->RegisterVariableString("Level", "Level");
    $this->RegisterVariableString("Prestige", "Prestige");

    $this->RegisterVariableString("Kills", "Kills");
    $this->RegisterVariableString("Deaths", "Deaths");
    $this->RegisterVariableString("Suicides", "Suicides");
    $this->RegisterVariableString("KDRatio", "KDRatio");
    $this->RegisterVariableString("BestKills", "BestKills");
    $this->RegisterVariableString("KillStreak", "KillStreak");
    $this->RegisterVariableString("WinStreak", "WinStreak");
    $this->RegisterVariableString("Headshots", "Headshots");
    $this->RegisterVariableString("Accuracy", "Accuracy");
    $this->RegisterVariableString("MatchesPlayed", "MatchesPlayed");
    $this->RegisterVariableString("MatchesCompleted", "MatchesCompleted");
    $this->RegisterVariableString("Losses", "Losses");
    $this->RegisterVariableString("Wins", "Wins");
    $this->RegisterVariableString("TimePlayed", "TimePlayed");
    $this->RegisterVariableString("TimePlayedAllies", "TimePlayedAllies");
    $this->RegisterVariableString("TimePlayedAxis", "TimePlayedAxis");
    $this->RegisterVariableString("Points", "Points");
    $this->RegisterVariableString("Score", "Score");
    $this->RegisterVariableString("BestScore", "BestScore");
    $this->RegisterVariableString("TotalXP", "TotalXP");
    $this->RegisterVariableString("Destructions", "Destructions");
    $this->RegisterVariableString("Captures", "Captures");

    $this->RegisterVariableString("Money", "Money");
    $this->RegisterVariableString("CurrentWinStreak", "CurrentWinStreak");
    $this->RegisterVariableString("PrestigeShopTokens", "PrestigeShopTokens");
    $this->RegisterVariableString("UnlockPoints", "UnlockPoints");
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
