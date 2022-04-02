<?php

namespace Theslowaja\Rtp;

use pocketmine\player\Player;
use pocketmine\world\World;
use pocketmine\world\Position;
use pocketmine\math\Vector3;
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
           $x = mt_rand(-300, 9099);
           $y = mt_rand(70, 120);
           $z = mt_rand(-300, 9091);
           $coor = $x." - ".$y." - ".$z;
           $player->teleport(new Position($x, $y, $z, $this->getServer()->getWorldManager()->getWorldByName($this->main->getConfig()->get("world"))));
           $player->sendMessage("§aSucsesfully Teleport To ".intval($coor));
        }
    }
}
