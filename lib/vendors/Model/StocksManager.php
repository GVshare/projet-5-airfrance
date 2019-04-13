<?php
namespace Model;

use \OCFram\Manager;

abstract class StocksManager extends Manager
{
  abstract public function getList();
  abstract public function getListFiltered($dot);
  abstract public function decrease($id);
  abstract public function increase($id);
  abstract public function delete($id);
  abstract public function add($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users);
  abstract public function update($id , $serialNumber , $shelfLife);

}