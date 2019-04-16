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

    // Get the missing, expiring and expired items by Company
    $this->checkInfo("AF" , "airFrance");
    $this->checkInfo("CA" , "airCanada");
    $this->checkInfo("KLM" , "KLM");
    $this->checkInfo("UX" , "airEuropa");
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

    // Check if any missing, expiring or expired items by Dot
    $this->getInfoDot("A");
    $this->getInfoDot("G");
    $this->getInfoDot("E");
    $this->getInfoDot("Q");
    $this->getInfoDot("T");
    $this->getInfoDot("X");
    $this->getInfoDot("ING");
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

  public function checkInfo($id,$companyName) {

    $manager = $this->managers->getManagerOf('Stocks');

    $company = '$listStocks'.$id;
    $company = $manager->getListFiltered($companyName , "All");

    $numberMissing = '$numberMissing'.$id;
    $partAlmostExpiring = '$partAlmostExpiring'.$id;
    $partExpired = '$partExpired'.$id;

    $numberMissing = 0;
    $partAlmostExpiring = 0;
    $partExpired = 0;

    foreach ($company as $stock) :
      
      if ($stock['stockOnHand'] < $stock['parStock']):
        $numberMissing = $numberMissing + ($stock['parStock'] - $stock['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($stock['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiring ++;
      endif;

      if ($dateDifference < 0) :
        $partExpired ++;
      endif;
    endforeach;
    $this->page->addVar('numberMissing'.$id, $numberMissing);
    $this->page->addVar('partAlmostExpiring'.$id, $partAlmostExpiring);
    $this->page->addVar('partExpired'.$id, $partExpired);
  }

  public function getInfoDot($dot) {

    $manager = $this->managers->getManagerOf('Stocks');

    $infoDot = 'infoDot'.$dot;

    $infoDot = $manager->infoDot($_GET['company'] , $dot);
    
    $numberMissingDot = '$numberMissingDot'.$dot;
    $partAlmostExpiringDot = '$partAlmostExpiringDot'.$dot;
    $partExpiredDot = '$partExpiredDot'.$dot;

    $numberMissingDot = 0;
    $partAlmostExpiringDot = 0;
    $partExpiredDot = 0;

    foreach ($infoDot as $infoDot) :
      
      if ($infoDot['stockOnHand'] < $infoDot['parStock']):
        $numberMissingDot = $numberMissingDot + ($infoDot['parStock'] - $infoDot['stockOnHand']);
      endif;
      
      $dateExpire = strtotime($infoDot['shelfLife']);
      $dateNow = time();
      $dateDifference = ($dateExpire - $dateNow)/(60*60*24);

      if ($dateDifference > 0 && $dateDifference < 30) :
        $partAlmostExpiringDot ++;
      endif;

      if ($dateDifference < 0) :
        $partExpiredDot ++;
      endif;
    endforeach;

    $this->page->addVar('numberMissingDot'.$dot , $numberMissingDot);
    $this->page->addVar('partAlmostExpiringDot'.$dot , $partAlmostExpiringDot);
    $this->page->addVar('partExpiredDot'.$dot, $partExpiredDot);
  }
}