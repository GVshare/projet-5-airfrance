<?php
namespace App\Backend\Modules\Stocks;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Stocks;
 
class StocksController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $listStocksAF = $manager->getListFiltered("airFrance" , "All");
    $listStocksCA = $manager->getListFiltered("airCanada" , "All");
    $listStocksKLM = $manager->getListFiltered("KLM" , "All");
    $listStocksUX = $manager->getListFiltered("airEuropa" , "All");

    // We now add listStocks to the view
    $this->page->addVar('listStocksAF', $listStocksAF);
    $this->page->addVar('listStocksCA', $listStocksCA);
    $this->page->addVar('listStocksKLM', $listStocksKLM);
    $this->page->addVar('listStocksUX', $listStocksUX);

    // Get the missing, expiring and expired items of AirFrance
    $numberMissingAF = 0;
    $partAlmostExpiringAF = 0;
    $partExpiredAF = 0;

    foreach ($listStocksAF as $stockAF) :
      
      if ($stockAF['stockOnHand'] < $stockAF['parStock']):
        $numberMissingAF = $numberMissingAF + ($stockAF['parStock'] - $stockAF['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($stockAF['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiringAF ++;
      endif;

      if ($dateDifference < 0) :
        $partExpiredAF ++;
      endif;
    endforeach;
    $this->page->addVar('numberMissingAF', $numberMissingAF);
    $this->page->addVar('partAlmostExpiringAF', $partAlmostExpiringAF);
    $this->page->addVar('partExpiredAF', $partExpiredAF);

    // Get the missing, expiring and expired items of AirFrance
    $numberMissingCA = 0;
    $partAlmostExpiringCA = 0;
    $partExpiredCA = 0;

    foreach ($listStocksCA as $stockCA) :
      
      if ($stockCA['stockOnHand'] < $stockCA['parStock']):
        $numberMissingCA = $numberMissingCA + ($stockCA['parStock'] - $stockCA['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($stockCA['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiringCA ++;
      endif;

      if ($dateDifference < 0) :
        $partExpiredCA ++;
      endif;
    endforeach;
    $this->page->addVar('numberMissingCA', $numberMissingCA);
    $this->page->addVar('partAlmostExpiringCA', $partAlmostExpiringCA);
    $this->page->addVar('partExpiredCA', $partExpiredCA);

    // Get the missing, expiring and expired items of AirFrance
    $numberMissingKLM = 0;
    $partAlmostExpiringKLM = 0;
    $partExpiredKLM = 0;

    foreach ($listStocksKLM as $stockKLM) :
      
      if ($stockKLM['stockOnHand'] < $stockKLM['parStock']):
        $numberMissingKLM = $numberMissingKLM + ($stockKLM['parStock'] - $stockKLM['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($stockKLM['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiringKLM ++;
      endif;

      if ($dateDifference < 0) :
        $partExpiredKLM ++;
      endif;
    endforeach;
    $this->page->addVar('numberMissingKLM', $numberMissingKLM);
    $this->page->addVar('partAlmostExpiringKLM', $partAlmostExpiringKLM);
    $this->page->addVar('partExpiredKLM', $partExpiredKLM);


    $numberMissingUX = 0;
    $partAlmostExpiringUX = 0;
    $partExpiredUX = 0;

    foreach ($listStocksUX as $stockUX) :
      
      if ($stockUX['stockOnHand'] < $stockUX['parStock']):
        $numberMissingUX = $numberMissingUX + ($stockUX['parStock'] - $stockUX['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($stockUX['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiringUX ++;
      endif;

      if ($dateDifference < 0) :
        $partExpiredUX ++;
      endif;
    endforeach;
    $this->page->addVar('numberMissingUX', $numberMissingUX);
    $this->page->addVar('partAlmostExpiringUX', $partAlmostExpiringUX);
    $this->page->addVar('partExpiredUX', $partExpiredUX);
  }

  public function executeFilter(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
      
    $listStocks = $manager->getListFiltered($_GET['company'] , $_GET['dot']);

    $infoDotA = $manager->infoDot($_GET['company'] , "A");
    $infoDotG = $manager->infoDot($_GET['company'] , "G");
    $infoDotE = $manager->infoDot($_GET['company'] , "E");
    $infoDotQ = $manager->infoDot($_GET['company'] , "Q");
    $infoDotT = $manager->infoDot($_GET['company'] , "T");
    $infoDotX = $manager->infoDot($_GET['company'] , "X");
    $infoDotING = $manager->infoDot($_GET['company'] , "ING");

    // We now add listStocks to the view
    $this->page->addVar('listStocks', $listStocks);

    // We now add infoDots to the view
    $this->page->addVar('infoDotA', $infoDotA);
    $this->page->addVar('infoDotG', $infoDotG);
    $this->page->addVar('infoDotE', $infoDotE);
    $this->page->addVar('infoDotQ', $infoDotQ);
    $this->page->addVar('infoDotT', $infoDotT);
    $this->page->addVar('infoDotX', $infoDotX);
    $this->page->addVar('infoDotING', $infoDotING);
  } 

  public function executeDecrease(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->decrease($request->getData('id'));

    if ($_GET['dot']=='All') :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-All');
    else :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_GET['dot']);
    endif;
  }   

  public function executeIncrease(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->increase($request->getData('id'));

    if ($_GET['dot']=='All') :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-All');
    else :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_GET['dot']);
    endif;
  } 

  public function executeDelete(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->delete($request->getData('id'));

     if ($_GET['dot']=='All') :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-All');
    else :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_GET['dot']);
    endif;
  } 

  public function executeAdd(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
    
    $manager->add(
      htmlspecialchars($request->postData("itemPool")) , 
      htmlspecialchars($request->postData("kit")) , 
      htmlspecialchars($request->postData("extention")) , 
      htmlspecialchars($request->postData("designation")) , 
      htmlspecialchars($request->postData("partNumber")) , 
      htmlspecialchars($request->postData("serialNumber")) , 
      htmlspecialchars($request->postData("parStock")) , 
      htmlspecialchars($request->postData("stockOnHand")) , 
      htmlspecialchars($request->postData("shelfLife")) , 
      htmlspecialchars($request->postData("provider")) , 
      htmlspecialchars($request->postData("users")) , 
      htmlspecialchars($request->getData("company"))
    );

    header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_POST['kit']);
  } 

  public function executeUpdate(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
    
    $manager->update(
      $request->getData("id") ,  
      htmlspecialchars($request->postData("serialNumber")) , 
      htmlspecialchars($request->postData("shelfLife"))
    );
    
    if ($_GET['dot']=='All') :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-All');
    else :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_GET['dot']);
    endif;
  }
}