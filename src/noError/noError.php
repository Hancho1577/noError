<?php
namespace noError;

use pocketmine\plugin\PluginBase;

use pocketmine\player;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerDeathEvent;

class noError extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getLogger()->info("NO ERROR is loading.. by Hancho");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onDamage(EntityDamageEvent $event)
    {
        $player = $event->getEntity();
        if ($player instanceof Player) {
            if ($event->getFinalDamage() >= $player->getHealth()) {
                $event->setCancelled(true);
                $player->setHealth(20);
                $player->removeAllEffects();
                $player->setFood(20);
                if (true) {
                    $player->doCloseInventory();
                    $ev = new PlayerDeathEvent($player, $player->getDrops());
                    $ev->call();

                    if (!$ev->getKeepInventory()) {
                        foreach ($ev->getDrops() as $item) {
                            $player->level->dropItem($player, $item);
                        }

                        if ($player->getInventory() !== null) {
                            $player->getInventory()->setHeldItemIndex(0);
                            $player->getInventory()->clearAll();
                        }
                        if ($player->getArmorInventory() !== null) {
                            $player->getArmorInventory()->clearAll();
                        }
                    }
                }
                $player->teleport($player->getSpawn(), 0, 0);
            }
        }
    }
}
