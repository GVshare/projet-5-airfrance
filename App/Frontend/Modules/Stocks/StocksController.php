<?php
namespace App\Frontend\Modules\Stocks;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Stocks;
 
class StocksController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $listStocks = $manager->getList();

    // We now add listStocks to the view
    $this->page->addVar('listStocks', $listStocks);
  }

  public function executeStocks(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $listStocks = $manager->getList();

    // We now add listStocks to the view
    $this->page->addVar('listStocks', $listStocks);
  }    

  public function executeDecrease(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->decrease($request->getData('id'));

    header('location: /projet-5-airfrance/Web/stocks');
  }   

  public function executeIncrease(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->increase($request->getData('id'));

    header('location: /projet-5-airfrance/Web/stocks');
  } 

  public function executeDelete(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
 
    $manager->delete($request->getData('id'));

    header('location: /projet-5-airfrance/Web/stocks');
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
    );

    header('location: /projet-5-airfrance/Web/stocks');
  } 

  public function executeUpdate(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Stocks');
    
    $manager->update(
      $request->getData("id") ,  
      $request->postData("serialNumber") , 
      $request->postData("shelfLife")
    );
    
    header('location: /projet-5-airfrance/Web/stocks');
  } 
}