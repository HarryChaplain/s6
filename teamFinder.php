<?php

function playingTeams() {
    $path = "../s6/playerHeadshots/";
    $teams = scandir($path);

    foreach ($teams as $team) {
        if (($team != '.') && ($team != '..') && ($team != '.DS_Store')) {
            echo $team . PHP_EOL;
        }
    }

    $playingTeam = 'Manchester United';
    $playersPath = "../s6/playerHeadshots/$playingTeam/";
    $players = scandir($playersPath);

    foreach ($players as $player) {
        if (($player != '.') && ($player != '..')) {
            

        }
        echo $player.PHP_EOL; 
        print_r($playerName);
    
    }
}

playingTeams();

?>