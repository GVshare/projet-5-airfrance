<?php
namespace App\Backend\Modules\Comms;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Posts;

class CommsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Comms');

    $posts = $manager->getOpenPosts();
    
    $this->page->addVar('posts', $posts);
  }
}