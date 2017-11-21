<?php
  class Player
  {
    private $liftetime = [];
    private $weekly = [];
    private $username;
    private $level;
    private $prestige;
    private $platform;

    public function __construct($Request)
    {
      $this->username = $Request["username"];
      $this->platform = $Request["platform"];
      $this->level = $Request["mp"]["level"];
      $this->prestige = $Request["mp"]["prestige"];
      $this->lifetimeStat($Request["mp"]);
      $this->weeklyStat($Request["mp"]);
    }

#### User Informations Start
    public function getUsername()
    {
      return $this->username;
    }

    public function getPlatform()
    {
      return $this->platform;
    }

    public function getLevel()
    {
      return $this->level;
    }

    public function getPrestige()
    {
      return $this->prestige;
    }
### User Informations End

### Public Lifetime Statistics start
    public function getKills()
    {
      return $this->lifetime["kills"];
    }

    public function getAccuracy()
    {
      return $this->lifetime["accuracy"];
    }

    public function getLosses()
    {
      return $this->lifetime["losses"];
    }

    public function getTimePlayedAllies()
    {
      return $this->lifetime["timePlayedAllies"];
    }

    public function getTimePlayedAxis()
    {
      return $this->lifetime["timePlayed"] - $this->lifetime["timePlayedAllies"];
    }

    public function getPoints()
    {
      return $this->lifetime["points"];
    }

    public function getScore()
    {
      return $this->lifetime["score"];
    }

    public function getTotalXP()
    {
      return $this->lifetime["totalXp"];
    }

    public function getHeadshots()
    {
      return $this->lifetime["headshots"];
    }

    public function getPlants()
    {
      return $this->lifetime["plants"];
    }

    public function getDeaths()
    {
      return $this->lifetime["deaths"];
    }

    public function getWins()
    {
      return $this->lifetime["wins"];
    }

    public function getKillStreak()
    {
      return $this->lifetime["killStreak"];
    }

    public function getKdRatio()
    {
      return $this->lifetime["kdRatio"];
    }

    public function getDestructions()
    {
      return $this->lifetime["destructions"];
    }

    public function getCaptures()
    {
      return $this->lifetime["captures"];
    }

    public function getBestScore()
    {
      return $this->lifetime["bestScore"];
    }

    public function getWinStreak()
    {
      return $this->lifetime["winStreak"];
    }

    public function getBestKills()
    {
      return $this->lifetime["bestKills"];
    }

    public function getTimePlayed()
    {
      return $this->lifetime["timePlayed"];
    }

    public function getMatchesPlayed()
    {
      return $this->lifetime["matchesPlayed"];
    }

    public function getSuicides()
    {
      return $this->lifetime["suicides"];
    }

    public function getMoney()
    {
      return $this->lifetime["money"];
    }

    public function getCurrentWinStreak()
    {
      return $this->lifetime["currentWinStreak"];
    }

    public function getPrestigeShopTokens()
    {
      return $this->lifetime["prestigeShopTokens"];
    }

    public function getMatchesCompleted()
    {
      return $this->lifetime["matchesCompleted"];
    }

    public function getUnlockPoints()
    {
      return $this->lifetime["unlockPoints"];
    }
### Public Lifetime Statistics end

    private function lifetimeStat($Request)
    {
      $this->liftetime["kills"] = $Request["lifetime"]["all"]["kills"];
      $this->lifetime["accuracy"] = $Request["lifetime"]["all"]["accuracy"];
      $this->lifetime["losses"] = $Request["lifetime"]["all"]["losses"];
      $this->lifetime["timePlayedAllies"] = $Request["lifetime"]["all"]["timePlayedAllies"];
      $this->lifetime["score"] = $Request["lifetime"]["all"]["score"];
      $this->lifetime["totalXp"] = $Request["lifetime"]["all"]["totalXp"];
      $this->lifetime["headshots"] = $Request["lifetime"]["all"]["headshots"];
      $this->lifetime["plants"] = $Request["lifetime"]["all"]["plants"];
      $this->lifetime["deaths"] = $Request["lifetime"]["all"]["deaths"];
      $this->lifetime["wins"] = $Request["lifetime"]["all"]["wins"];
      $this->lifetime["killStreak"] = $Request["lifetime"]["all"]["killStreak"];
      $this->lifetime["kdRatio"] = $Request["lifetime"]["all"]["kdRatio"];
      $this->lifetime["destructions"] = $Request["lifetime"]["all"]["destructions"];
      $this->lifetime["captures"] = $Request["lifetime"]["all"]["captures"];
      $this->lifetime["bestScore"] = $Request["lifetime"]["all"]["bestScore"];
      $this->lifetime["winStreak"] = $Request["lifetime"]["all"]["winStreak"];
      $this->lifetime["bestKills"] = $Request["lifetime"]["all"]["bestKills"];
      $this->lifetime["timePlayed"] = $Request["lifetime"]["all"]["timePlayed"];
      $this->lifetime["matchesPlayed"] = $Request["lifetime"]["all"]["matchesPlayed"];
      $this->lifetime["suicides"] = $Request["lifetime"]["all"]["suicides"];
      $this->lifetime["money"] = $Request["lifetime"]["all"]["money"];
      $this->lifetime["currentWinStreak"] = $Request["lifetime"]["all"]["currentWinStreak"];
      $this->lifetime["prestigeShopTokens"] = $Request["lifetime"]["all"]["prestigeShopTokens"];
      $this->lifetime["matchesCompleted"] = $Request["lifetime"]["all"]["matchesCompleted"];
      $this->lifetime["unlockPoints"] = $Request["lifetime"]["all"]["unlockPoints"];
    }

### Public Weekly Statistics start
    public function getWeeklyKills()
    {
      return $this->weekly["kills"];
    }

    public function getWeeklkyDistanceTravelled()
    {
      return $this->weekly["distanceTravelled"];
    }

    public function getWekklyDivisionXpMountain()
    {
      return $this->weekly["divisionXpMountain"];
    }

    public function getWeeklyAccuracy()
    {
      return $this->weekly["accuracy"];
    }

    public function getWeeklyDivisionXpExpeditionary()
    {
      return $this->weekly["divisionXpExpeditionary"];
    }

    public function getWeeklyLosses()
    {
      return $this->weekly["losses"];
    }

    public function getWeeklyShotsLanded()
    {
      return $this->weekly["shotsLanded"];
    }

    public function getWeeklyScore()
    {
      return $this->weekly["score"];
    }

    public function getWeeklyTotalXP()
    {
      return $this->weekly["totalXp"];
    }

    public function getWeeklyHeadshots()
    {
      return $this->weekly["headshots"];
    }

    public function getWeeklyAssists()
    {
      return $this->weekly["assists"];
    }

    public function getWeeklyScorePerMinute()
    {
      return $this->weekly["scorePerMinute"];
    }

    public function getWeeklyDeaths()
    {
      return $this->weekly["deaths"];
    }

    public function getWeeklyWins()
    {
      return $this->weekly["wins"];
    }

    public function getWeeklyShotsMissed()
    {
      return $this->weekly["shotsMissed"];
    }

    public function getWeeklyKdRatio()
    {
      return $this->weekly["kdRatio"];
    }

    public function getWeeklyDivisionXpInfantry()
    {
      return $this->weekly["divisionXpInfantry"];
    }

    public function getWeeklyDivisionXpArmored()
    {
      return $this->weekly["divisionXpArmored"];
    }

    public function getWeeklyDivisionXpAirborne()
    {
      return $this->weekly["divisionXpAirborne"];
    }

    public function getWeeklyAvgSpeed()
    {
      return $this->weekly["avgSpeed"];
    }

    public function getWeeklyAvgKillDistance()
    {
      return $this->weekly["avgKillDistance"];
    }

    public function getWeeklyTimePlayed()
    {
      return $this->weekly["timePlayed"];
    }

    public function getWeeklyMatchesPlayed()
    {
      return $this->weekly["matchesPlayed"];
    }

    public function getWeeklyDivisionXpNone()
    {
      return $this->weekly["divisionXpNone"];
    }

    public function getWeeklyShotsFired()
    {
      return $this->weekly["shotsFired"];
    }
### Public Weekly Statistics end

    private function weeklyStat($Request)
    {
      $this->weekly["kills"] = $Request["weekly"]["all"]["kills"];
      $this->weekly["distanceTravelled"] = $Request["weekly"]["all"]["distanceTravelled"];
      $this->weekly["divisionXpMountain"] = $Request["weekly"]["all"]["divisionXpMountain"];
      $this->weekly["accuracy"] = $Request["weekly"]["all"]["accuracy"];
      $this->weekly["divisionXpExpeditionary"] = $Request["weekly"]["all"]["divisionXpExpeditionary"];
      $this->weekly["losses"] = $Request["weekly"]["all"]["losses"];
      $this->weekly["shotsLanded"] = $Request["weekly"]["all"]["shotsLanded"];
      $this->weekly["score"] = $Request["weekly"]["all"]["score"];
      $this->weekly["totalXp"] = $Request["weekly"]["all"]["totalXp"];
      $this->weekly["headshots"] = $Request["weekly"]["all"]["headshots"];
      $this->weekly["assists"] = $Request["weekly"]["all"]["assists"];
      $this->weekly["scorePerMinute"] = $Request["weekly"]["all"]["scorePerMinute"];
      $this->weekly["deaths"] = $Request["weekly"]["all"]["deaths"];
      $this->weekly["wins"] = $Request["weekly"]["all"]["wins"];
      $this->weekly["shotsMissed"] = $Request["weekly"]["all"]["shotsMissed"];
      $this->weekly["kdRatio"] = $Request["weekly"]["all"]["kdRatio"];
      $this->weekly["divisionXpInfantry"] = $Request["weekly"]["all"]["divisionXpInfantry"];
      $this->weekly["divisionXpArmored"] = $Request["weekly"]["all"]["divisionXpArmored"];
      $this->weekly["divisionXpAirborne"] = $Request["weekly"]["all"]["divisionXpAirborne"];
      $this->weekly["avgSpeed"] = $Request["weekly"]["all"]["avgSpeed"];
      $this->weekly["avgKillDistance"] = $Request["weekly"]["all"]["avgKillDistance"];
      $this->weekly["timePlayed"] = $Request["weekly"]["all"]["timePlayed"];
      $this->weekly["matchesPlayed"] = $Request["weekly"]["all"]["matchesPlayed"];
      $this->weekly["divisionXpNone"] = $Request["weekly"]["all"]["divisionXpNone"];
      $this->weekly["shotsFired"] = $Request["weekly"]["all"]["shotsFired"];

    }
  }
?>
