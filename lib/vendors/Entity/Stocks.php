<?php
namespace Entity;

use \OCFram\Entity;

class Stocks extends Entity
{
  protected $id,
            $dot,
            $kit,
            $itemPool,
            $designation,
            $partNumber,
            $serialNumber,
            $parStock,
            $stockOnHand,
            $shelfLife,
            $provider,
            $users,
            $company;

  const DOT_INVALID = 1;
  const KIT_INVALID = 2;
  const ITEMPOOL_INVALID = 3;
  const DESIGNATION_INVALID = 4;
  const PARTNUMBER_INVALID = 5;
  const SERIALNUMBER_INVALID = 6;
  const PARSTOCK_INVALID = 7;
  const STOCKONHAND_INVALID = 8;
  const SHELFLIFE_INVALID = 9;
  const PROVIDER_INVALID = 10;
  const USERS_INVALID = 11;
  const COMPANY_INVALID = 12;

  public function isValid()
  {
    return !(
      empty($this->dot) || 
      empty($this->kit) ||
      empty($this->itemPool) ||
      empty($this->designation) ||
      empty($this->partNumber) ||
      empty($this->serialNumber) ||
      empty($this->parStock) ||
      empty($this->stockOnHand) ||
      empty($this->shelfLife) ||
      empty($this->provider) ||
      empty($this->users) ||
      empty($this->company)
    );
  }


  //============================================================ SETTERS ==================================================================//

  public function setDot($dot)
  {
    if (!is_string($dot) || empty($dot))
    {
      $this->erreurs[] = self::DOT_INVALID;
    }

    $this->dot = $dot;
  }

  public function setKit($kit)
  {
    if (!is_string($kit) || empty($kit))
    {
      $this->erreurs[] = self::KIT_INVALID;
    }

    $this->kit = $kit;
  }

  public function setContenu($itemPool)
  {
    if (!is_string($itemPool) || empty($itemPool))
    {
      $this->erreurs[] = self::ITEMPOOL_INVALID;
    }

    $this->itemPool = $itemPool;
  }

  public function setDesignation($designation)
  {
    if (!is_string($designation) || empty($designation))
    {
      $this->erreurs[] = self::DESIGNATION_INVALID;
    }

    $this->designation = $designation;
  }

  public function setPartNumber($partNumber)
  {
    if (!is_string($partNumber) || empty($partNumber))
    {
      $this->erreurs[] = self::PARTNUMBER_INVALID;
    }

    $this->partNumber = $partNumber;
  }

  public function setSerialNumber($serialNumber)
  {
    if (!is_string($serialNumber) || empty($serialNumber))
    {
      $this->erreurs[] = self::PARTNUMBER_INVALID;
    }

    $this->serialNumber = $serialNumber;
  }

  public function setParStock($parStock)
  {
    if (!is_numeric($parStock) || empty($parStock))
    {
      $this->erreurs[] = self::PARSTOCK_INVALID;
    }

    $this->partNumber = $partNumber;
  }

  public function setStockOnHand($stockOnHand)
  {
    if (!is_numeric($stockOnHand) || empty($stockOnHand))
    {
      $this->erreurs[] = self::STOCKONHAND_INVALID;
    }

    $this->stockOnHand = $stockOnHand;
  }

  public function setShelfLife($shelfLife)
  {
    $this->shelfLife = $shelfLife;
  }

  public function setProvider($provider)
  {
    if (!is_string($provider) || empty($provider))
    {
      $this->erreurs[] = self::PROVIDER_INVALID;
    }

    $this->provider = $provider;
  }

  public function setUsers($users)
  {
    if (!is_string($users) || empty($users))
    {
      $this->erreurs[] = self::USERS_INVALID;
    }

    $this->users = $users;
  }

  public function setCompany($company)
  {
    if (!is_string($company) || empty($company))
    {
      $this->erreurs[] = self::COMPANY_INVALID;
    }

    $this->company = $company;
  }


  //============================================================ GETTERS ==================================================================//

  public function dot()
  {
    return $this->dot;
  }

  public function kit()
  {
    return $this->kit;
  }

  public function itemPool()
  {
    return $this->itemPool;
  }

  public function designation()
  {
    return $this->designation;
  }

  public function partNumber()
  {
    return $this->partNumber;
  }

  public function serialNumber()
  {
    return $this->serialNumber;
  }

  public function parStock()
  {
    return $this->parStock;
  }

  public function stockOnHand()
  {
    return $this->stockOnHand;
  }

  public function shelfLife()
  {
    return $this->shelfLife;
  }

  public function provider()
  {
    return $this->provider;
  }

  public function users()
  {
    return $this->users;
  }

  public function company()
  {
    return $this->company;
  }
}