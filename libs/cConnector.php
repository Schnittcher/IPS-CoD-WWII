<?php
  require 'config.php';
/**
 * Klasse zum Verbinden mit der API von CoD
 * @author Kai Schnittcher
*/
  class Connector
  {
    private $platform;
    private $player;
    /**
     * Konstruktor
     * @param string $platform psn, steam, xbl
     * @param string $player   username vom Spieler
     */
    public function __construct($platform,$player)
    {
      $this->platform = $platform;
      $this->player = $player;
      return $this;
    }

    /**
     * Ruft die Funktion request mit den dazugehörene Parametern auf
     * @return array Gibt ein Array zurück mit allen Informationen zum Spieler, welches an die Klasse Player übergeben wird
     */
    public function getPlayer()
    {
      return $this->request("player");
    }

    /**
     * Ruft die Funktion request mit den dazugehörene Parametern auf
     * @return array Gibt ein Array zurück mit allen Informationen zu den letzten Spielen, welches an die Klasse Match übergeben wird
     */
    public function getMatches()
    {
      return $this->request("match");
    }

    /**
     * Ruft die Werte über die API ab und gibt ein Array zurück
     * @param  string $type player oder Match
     * @return array       Gibt die Daten der API zurück
     */
    private function request($type)
    {
      switch ($type) {
        case 'player':
          $url = str_replace("%platform%", $this->platform, PLAYER);
          $url = str_replace("%player%", $this->player, $url);
          break;
        case 'match':
          $url = str_replace("%platform%", $this->platform, MATCHES);
          $url = str_replace("%player%", $this->player, $url);
          break;
        default:
          # code...
          break;
      }
      $json = file_get_contents($url);
      $data = json_decode($json, TRUE);
      return $data["data"];
    }
  }
?>
