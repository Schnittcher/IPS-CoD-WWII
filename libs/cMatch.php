<?php
/**
 * Klasse für die gespielten Matches
 */
  class Match
  {
    private $matches = [];
    private $summary = [];
    private $match;

    /**
     * [__construct]
     * @param array  $Request Rückgabewert von getPlayer() oder getMatches()
     * @param integer $match  Standard 0 für das letzte Match, 1 für das Vorletzte usw.
     */
    public function __construct($Request,$match = 0)
    {
      $this->match = $match;
      $this->matches = $Request["matches"];
      $this->summary = $Request["summary"];
    }

    /**
     * getStartTime
     * @return integer Startzeit in Sekunden
     */
    public function getStartTime()
    {
      return $this->matches[$this->match]["utcStartSeconds"];
    }

    /**
     * getEndTime
     * @return integer Endzeit in Sekunden
     */
    public function getEndTime()
    {
      return $this->matches[$this->match]["utcEndSeconds"];
    }

    /**
     * getDuration
     * @return integer Spielzeit in Sekunden
     */
    public function getDuration()
    {
      return $this->matches[$this->match]["duration"];
    }

    /**
     * getMap
     * @return string Gibt die Map zurück
     */
    public function getMap()
    {
      return $this->matches[$this->match]["map"];
    }

    /**
     * getMode
     * @return string Gibt den Spielmodus zurück
     */
    public function getMode()
    {
      return $this->matches[$this->match]["mode"];
    }

    /**
     * getResult
     * @return string Gibt Sieg oder Niederlage zurück
     */
    public function getResult()
    {
      return $this->matches[$this->match]["result"];
    }

    /**
     * getWinningTeam
     * @return string Gibt das Team zurück, welches gewonnne hat
     */
    public function getWinningTeam()
    {
      return $this->matches[$this->match]["WinningTeam"];
    }

    /**
     * getPrivateMatch
     * @return [type] [description]
     */
    public function getPrivateMatch()
    {
      return $this->matches[$this->match]["privateMatch"];
    }

    /**
     * getGameBattle
     * @return [type] [description]
     */
    public function getGameBattle()
    {
      return $this->matches[$this->match]["gameBattle"];
    }

    /**
     * getPlaylistName
     * @return string Gibt Spielmodus zurück zum Beispiel: Team Deathmatch
     */
    public function getPlaylistName()
    {
      return $this->matches[$this->match]["playlistName"];
    }

    //Todo: Player Awards Start

    //Todo: Player Awards End

    /**
     * getPlayerStatsKills
     * @return integer Kills in dem Match
     */
    public function getPlayerStatsKills()
    {
      return $this->matches[$this->match]["playerStats"]["kills"];
    }

    /**
     * getPlayerStatsShotsMissed
     * @return integer Nicht getroffene Schüsse in dem Match
     */
    public function getPlayerStatsShotsMissed()
    {
      return $this->matches[$this->match]["playerStats"]["shotsMissed"];
    }

    /**
     * getPlayerStatsKdRatio
     * @return float KD Ratio in dem Match
     */
    public function getPlayerStatsKdRatio()
    {
      return $this->matches[$this->match]["playerStats"]["kdRatio"];
    }

    /**
     * getPlayerStatsDistanceTravelled
     * @return [type] [description]
     */
    public function getPlayerStatsDistanceTravelled()
    {
      return $this->matches[$this->match]["playerStats"]["distanceTravelled"];
    }

    /**
     * getPlayerStatsDivisionXpMountain
     * @return [type] [description]
     */
    public function getPlayerStatsDivisionXpMountain()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpMountain"];
    }

    /**
     * getPlayerStatsAccuracy
     * @return float Gibt die Genauigkeit von dem Match zurück
     */
    public function getPlayerStatsAccuracy()
    {
      return $this->matches[$this->match]["playerStats"]["accuracy"];
    }

    /**
     * getPlayerStatsDivisionXpExpeditionary
     * @return integer [description]
     */
    public function getPlayerStatsDivisionXpExpeditionary()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpExpeditionary"];
    }

    /**
     * getPlayerStatsDivisionXpInfantry
     * @return integer [description]
     */
    public function getPlayerStatsDivisionXpInfantry()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpInfantry"];
    }

    /**
     * getPlayerStatsDivisionXpArmored
     * @return integer [description]
     */
    public function getPlayerStatsDivisionXpArmored()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpArmored"];
    }

    /**
     * getPlayerStatsShotsLanded
     * @return integer Getroffene Schüsse in dem Match
     */
    public function getPlayerStatsShotsLanded()
    {
      return $this->matches[$this->match]["playerStats"]["shotsLanded"];
    }

    /**
     * getPlayerStatsDivisionXpAirborne
     * @return integer [description]
     */
    public function getPlayerStatsDivisionXpAirborne()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpAirborne"];
    }

    /**
     * [getPlayerStatsAvgSpeed description]
     * @return [type] [description]
     */
    public function getPlayerStatsAvgSpeed()
    {
      return $this->matches[$this->match]["playerStats"]["avgSpeed"];
    }

    /**
     * getPlayerStatsAvgKillDistance
     * @return [type] [description]
     */
    public function getPlayerStatsAvgKillDistance()
    {
      return $this->matches[$this->match]["playerStats"]["avgKillDistance"];
    }

    /**
     * getPlayerStatsScore
     * @return integer Punkte in diesem Match
     */
    public function getPlayerStatsScore()
    {
      return $this->matches[$this->match]["playerStats"]["score"];
    }

    /**
     * getPlayerStatsTotalXP
     * @return integer Gesammelte XP in dem Match
     */
    public function getPlayerStatsTotalXP()
    {
      return $this->matches[$this->match]["playerStats"]["totalXp"];
    }

    /**
     * getPlayerTimePlayed
     * @return float gespielte Zeit in Sekunden
     */
    public function getPlayerTimePlayed()
    {
      return $this->matches[$this->match]["playerStats"]["timePlayed"];
    }

    /**
     * getPlayerStatsHeadshots
     * @return integer Erzielte Headshots in dem Match
     */
    public function getPlayerStatsHeadshots()
    {
      return $this->matches[$this->match]["playerStats"]["headshots"];
    }

    /**
     * getPlayerStatsDivisionXpNone
     * @return [type] [description]
     */
    public function getPlayerStatsDivisionXpNone()
    {
      return $this->matches[$this->match]["playerStats"]["divisionXpNone"];
    }

    /**
     * getPlayerStatsAssists
     * @return integer Assists in dem Match
     */
    public function getPlayerStatsAssists()
    {
      return $this->matches[$this->match]["playerStats"]["assists"];
    }

    /**
     * getPlayerStatsShotsFired
     * @return integer abgegebene Schüsse in dem Match
     */
    public function getPlayerStatsShotsFired()
    {
      return $this->matches[$this->match]["playerStats"]["shotsFired"];
    }

    /**
     * getPlayerStatsDeaths
     * @return integer Tode in dem Match
     */
    public function getPlayerStatsDeaths()
    {
      return $this->matches[$this->match]["playerStats"]["deaths"];
    }

    //Summary Start
    public function getSummaryKills($type)
    {
      return $this->summary[$type]["kills"];
    }

    public function getSummaryDistanceTravelled($type)
    {
      return $this->summary[$type]["distanceTravelled"];
    }

    public function getSummaryDivisionXpMountain($type)
    {
      return $this->summary[$type]["divisionXpMountain"];
    }

    public function getSummaryAccuracy($type)
    {
      return $this->summary[$type]["accuracy"];
    }

    public function getSummaryDivisionXpExpeditionary($type)
    {
      return $this->summary[$type]["divisionXpExpeditionary"];
    }

    public function getSummaryLosses($type)
    {
      return $this->summary[$type]["losses"];
    }

    public function getSummaryShotsLanded($type)
    {
      return $this->summary[$type]["shotsLanded"];
    }

    public function getSummaryScore($type)
    {
      return $this->summary[$type]["score"];
    }

    public function getSummarytotalXP($type)
    {
      return $this->summary[$type]["totalXp"];
    }

    public function getSummaryHeadshots($type)
    {
      return $this->summary[$type]["headshots"];
    }

    public function getSummaryAssists($type)
    {
      return $this->summary[$type]["assists"];
    }

    public function getSummaryScorePerMinute($type)
    {
      return $this->summary[$type]["scorePerMinute"];
    }

    public function getSummaryDeaths($type)
    {
      return $this->summary[$type]["deaths"];
    }

    public function getSummaryWins($type)
    {
      return $this->summary[$type]["wins"];
    }

    public function getSummaryShotsMissed($type)
    {
      return $this->summary[$type]["shotsMissed"];
    }

    public function getSummaryKdRatio($type)
    {
      return $this->summary[$type]["kdRatio"];
    }

    public function getSummaryDivisionXpInfantry($type)
    {
      return $this->summary[$type]["divisionXpInfantry"];
    }

    public function getSummaryDivisionXpArmored($type)
    {
      return $this->summary[$type]["divisionXpArmored"];
    }

    public function getSummaryDivisionXpAirborne($type)
    {
      return $this->summary[$type]["divisionXpAirborne"];
    }

    public function getSummaryAvgSpeed($type)
    {
      return $this->summary[$type]["avgSpeed"];
    }

    public function getSummaryAvgKillDistance($type)
    {
      return $this->summary[$type]["avgKillDistance"];
    }

    public function getSummaryTimePlayed($type)
    {
      return $this->summary[$type]["timePlayed"];
    }

    public function getSummaryMatchesPlayed($type)
    {
      return $this->summary[$type]["matchesPlayed"];
    }

    public function getSummaryDivisionXpNone($type)
    {
      return $this->summary[$type]["divisionXpNone"];
    }

    public function getSummaryShotsFired($type)
    {
      return $this->summary[$type]["shotsFired"];
    }
  }
?>
