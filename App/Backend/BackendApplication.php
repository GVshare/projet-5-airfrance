<?php
namespace App\Backend;
 
use \OCFram\Application;
 
class BackendApplication extends Application
{
  public function __construct()
  {
    parent::__construct();
 
    $this->name = 'Backend';
  }
 
  public function run()
  {
    if ($this->user->isAuthenticated())
    {
      $controller = $this->getController();
    }
    else
    {
      header('location: /projet-5-airfrance/Web/');
    }
    
    $controller->execute();
 
    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}