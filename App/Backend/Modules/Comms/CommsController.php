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

    $postsOpen = $manager->getOpenPosts();
    $postsClose = $manager->getClosePosts();
    
    $this->page->addVar('postsOpen', $postsOpen);
    $this->page->addVar('postsClose', $postsClose);
  }

  public function executeNewPost(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Comms');

    $posts = $manager->newPost(htmlspecialchars($_POST["authorTopic"]) , htmlspecialchars($_POST["titleTopic"]));
    
    header('location: /projet-5-airfrance/Web/communication');
  }
}