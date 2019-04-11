<?php
namespace Model;

use \Entity\Stocks;

class StocksManagerPDO extends StocksManager
{

  // GET FULL STOCK OF AIRFRANCE =============================================================================================================

  public function getList()
  {
    $sql = '
    SELECT dot , kit , itemPool, designation, partNumber, serialNumber, parStock, stockOnHand, shelfLife, provider, users , id , company 
    FROM stocks
    WHERE company = "airFrance"
    ORDER BY itemPool ASC';
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Stocks');
    
    $listStocks = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listStocks;
  }

  public function decrease($id)
  {
    $sql = '
    UPDATE stocks
    SET stockOnHand = stockOnHand - 1
    WHERE id = ?
    ';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($id));
  }

  public function increase($id)
  {
    $sql = '
    UPDATE stocks
    SET stockOnHand = stockOnHand + 1
    WHERE id = ?
    ';

    $requete = $this->dao->prepare($sql);

    $requete->execute(array($id));
  }

  public function delete($id)
  {
    $sql = '
    DELETE FROM stocks
    WHERE id = ?
    ';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($id));
  }

  public function add($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users)
  {
    $sql = '
    INSERT INTO stocks (itemPool, dot , kit ,designation, partNumber, serialNumber, parStock, stockOnHand, shelfLife, provider, users , company) 
    VALUES (? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , "airFrance")
    ';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users));
  }

  public function update($id , $serialNumber , $shelfLife)
  {
    $sql = '
    UPDATE stocks 
    SET serialNumber = ? , shelfLife = ?
    WHERE id = ?
    ';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($serialNumber , $shelfLife , $id));
  }
}