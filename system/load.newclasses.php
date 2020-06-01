<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 02/06/2018
 * Time: 20:16
 */

$outfits = new Outfits();
$items = new New_items();


/**
 * @param $player_id
 * @return array|bool
 */
$getPlayerOutfitsByPlayerId = function ($player_id) use ($outfits) {
    $player = new Player();
    $player->loadById($player_id);
    $sex = $player->getSex();
    $p = [];
    for ($i = 1; $i <= 500; $i++) {
        $var = (10000000 + 1000);
        $var = $var + $i;
        if ($player->getStorage($var) != NULL) {
            $p[] = $player->getStorage($var);
        }
    }
    if ($p != NULL) {
        $t = [];
        foreach ($p as $key => $value) {
            $q = $outfits->getOutfitByLooktype(0, $value >> 16);
            if ($q != NULL) {
                $q['addon'] = $value - $q['storage'];
                $t[] = $q;
            }
        }
        foreach ($p as $key => $value) {
            $q = $outfits->getOutfitByLooktype(1, $value >> 16);
            if ($q != NULL) {
                $q['addon'] = $value - $q['storage'];
                $t[] = $q;
            }
        }
        return $t;
    } else {
        return FALSE;
    }
};
/**
 * @param $id
 * @return mixed
 */
$getItemByItemId = function ($id) use ($items) {
    return $items->getItemByItemId($id);
};

