<?php
namespace Model;

use \Entity\Stocks;

class StocksManagerPDO extends StocksManager
{

  // GET FULL STOCK OF COMPANY =============================================================================================================

  public function getListFiltered($company , $dot, $start, $itemsPerPage)
  {
    if ($dot == "All") :
      $sql = ('
        SELECT dot , kit , itemPool, designation , partNumber , serialNumber , parStock , stockOnHand , shelfLife , provider , users , id , company 
        FROM stocks
        WHERE company = ?
        ORDER BY itemPool ASC
        LIMIT ' . $start . ',' . $itemsPerPage)
      ;
    else :
      $sql = ('
        SELECT dot , kit , itemPool , designation , partNumber , serialNumber , parStock , stockOnHand , shelfLife , provider , users , id , company 
        FROM stocks
        WHERE company = ? AND dot = ?
        ORDER BY itemPool ASC
        LIMIT ' . $start . ',' . $itemsPerPage)
      ;
    endif;

    $requete = $this->dao->prepare($sql);

    if ($dot == "All"):
      $requete->execute(array($company));
    else :
      $requete->execute(array($company , $dot));
    endif;

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Stocks');
    
    $listStocks = $requete->fetchAll();
    
    $requete->closeCursor();
       
    return $listStocks;
  }

  public function getListIndex($company , $dot)
  {
    if ($dot == "All") :
      $sql = ('
        SELECT dot , kit , itemPool, designation , partNumber , serialNumber , parStock , stockOnHand , shelfLife , provider , users , id , company 
        FROM stocks
        WHERE company = ?
        ORDER BY itemPool ASC')
      ;
    else :
      $sql = ('
        SELECT dot , kit , itemPool , designation , partNumber , serialNumber , parStock , stockOnHand , shelfLife , provider , users , id , company 
        FROM stocks
        WHERE company = ? AND dot = ?
        ORDER BY itemPool ASC')
      ;
    endif;

    $requete = $this->dao->prepare($sql);

    if ($dot == "All"):
      $requete->execute(array($company));
    else :
      $requete->execute(array($company , $dot));
    endif;

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Stocks');
    
    $listStocks = $requete->fetchAll();
    
    $requete->closeCursor();
       
    return $listStocks;
  }

  public function getList($company, $dot) {
    if ($dot != 'All') {
      $sql = '
        SELECT id 
        FROM stocks
        WHERE company = ? AND dot = ?'
    ;

    $requete = $this->dao->prepare($sql);
    $requete->execute(array($company, $dot));

    return $requete;
    } else {
      $sql = '
        SELECT id 
        FROM stocks
        WHERE company = ?'
    ;

    $requete = $this->dao->prepare($sql);
    $requete->execute(array($company));

    return $requete;
    }
    
  }

  public function infoDot($company , $dot) {
    $sql = '
      SELECT dot , kit , itemPool , designation , partNumber , serialNumber , parStock , stockOnHand , shelfLife , provider , users , id , company 
      FROM stocks
      WHERE company = ? AND dot = ?
      ORDER BY itemPool ASC';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($company , $dot));

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Stocks');
    
    $infoDot = $requete->fetchAll();
    
    $requete->closeCursor();
       
    return $infoDot;
  }

  public function decrease($id)
  {
    $sql = '
      UPDATE stocks
      SET stockOnHand = stockOnHand - 1
      WHERE id = ?'
    ;

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

  public function add($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users , $company)
  {
    $sql = '
    INSERT INTO stocks (itemPool, dot , kit ,designation, partNumber, serialNumber, parStock, stockOnHand, shelfLife, provider, users , company) 
    VALUES (? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?)
    ';

    $requete = $this->dao->prepare($sql);
    
    $requete->execute(array($itemPool , $kit , $extention , $designation , $partNumber , $serialNumber , $parStock , $stockOnHand , $shelfLife , $provider , $users , $company));
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