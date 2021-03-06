<?php
namespace Model;

use \OCFram\Manager;

abstract class StocksManager extends Manager
{
  abstract public function getListFiltered($company , $dot, $start, $itemsPerPage);
  abstract public function infoDot($company , $dot);
  abstract public function decrease($id);
  abstract public function increase($id);
  abstract public function delete($id);
  abstract public function add($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users , $company);
  abstract public function update($id , $serialNumber , $shelfLife);
}