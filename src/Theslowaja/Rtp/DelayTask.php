<?php

namespace Theslowaja\Rtp;

use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use Theslowaja\Rtp\Main;

class DelayTask extends Task{
 
    private $main;
    private $name;
  
    public function __construct(Main $main, $name){
        $this->main = $main;
        $this->name = $name;
    }
    public function onRun(): void{
        $player = $this->main->getServer()->getPlayerExact($this->name);
        if($player->isOnline()){
           $player->teleport($x, $y, $z, $this->main->getConfig()->get("world"));
           $player->sendMessage("§aSucsesfully Teleport To ".$coor);
        }
    }
}
