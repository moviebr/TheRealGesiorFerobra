<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/03/2018
 * Time: 18:43
 */

class Outfits
{
    private $outfits;
    
    /**
     * outfits constructor.
     */
    public function __construct ()
    {
        $this->loadFromFile(Website::getWebsiteConfig()->getValue('Outfits_path'));
    }
    
    public function loadFromFile ($file)
    {
        if (Website::fileExists($file)) {
            $xml = simplexml_load_file($file, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $outfits = json_decode($json, TRUE)['outfit'];
            foreach ($outfits as $outfit) {
                $outfit = $outfit['@attributes'];
                $news[$outfit['type']][$outfit['looktype']] = $outfit;
                $news[$outfit['type']][$outfit['looktype']]['storage'] = $outfit['looktype'] << 16;
            }
            $this->setOutfits($news);
        } else {
            new Error_Critic('#O-1', "<b>ERROR: #O-1:</b> Class::Outfits - Outfit File not exists in {$file}.");
        }
    }
    
    /**
     * @param mixed $outfits
     * @return Outfits
     */
    private function setOutfits ($outfits)
    {
        $this->outfits = $outfits;
        return $this;
    }
    
    public function getPlayerOutfitsByPlayerId ($player_id)
    {
        $player = new Player();
        $player->loadById($player_id);
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
                $q = $this->getOutfitByLooktype(0, $value >> 16);
                if ($q != NULL) {
                    $q['addon'] = $value - $q['storage'];
                    $t[] = $q;
                }
            }
            foreach ($p as $key => $value) {
                $q = $this->getOutfitByLooktype(1, $value >> 16);
                if ($q != NULL) {
                    $q['addon'] = $value - $q['storage'];
                    $t[] = $q;
                }
            }
            return $t;
        } else {
            return FALSE;
        }
    }
    
    public function getOutfitByLooktype ($type, $looktype)
    {
        $type = (int)$type;
        $looktype = (int)$looktype;
        $outfits = $this->getOutfitsByType($type);
        return $outfits[$looktype];
    }
    
    /**
     * @param $type
     * @return mixed
     */
    public function getOutfitsByType ($type)
    {
        $type = (int)$type;
        ($type == 0 ? 0 : 1);
        $outfits = $this->getOutfits();
        return $outfits[$type];
    }
    
    /**
     * @return mixed
     */
    private function getOutfits ()
    {
        return $this->outfits;
    }
}