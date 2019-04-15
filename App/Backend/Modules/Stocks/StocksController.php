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
      $request->postData("itemPool") , 
      $request->postData("kit") , 
      $request->postData("extention") , 
      $request->postData("designation") , 
      $request->postData("partNumber") , 
      $request->postData("serialNumber") , 
      $request->postData("parStock") , 
      $request->postData("stockOnHand") , 
      $request->postData("shelfLife") , 
      $request->postData("provider") , 
      $request->postData("users") , 
      $request->getData("company")
    );

    header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_POST['kit']);
  } 

  public function executeUpdate(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
    
    $manager->update(
      $request->getData("id") ,  
      $request->postData("serialNumber") , 
      $request->postData("shelfLife")
    );
    
    if ($_GET['dot']=='All') :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-All');
    else :
      header('location: /projet-5-airfrance/Web/stocks-'.$_GET['company'].'-filter-'.$_GET['dot']);
    endif;
  }
}