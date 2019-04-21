<?php
namespace App\Backend\Modules\Comms;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Posts;
use \Entity\Comments;

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

  public function executeOnGoing(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Comms');
    $managerComments = $this->managers->getManagerOf('Comments');

    $postsOpen = $manager->getOpenPosts();
    $postsClose = $manager->getClosePosts();
    $Comments = $managerComments->getComments($_GET['id']);
    
    $this->page->addVar('postsOpen', $postsOpen);
    $this->page->addVar('postsClose', $postsClose);
    $this->page->addVar('Comments', $Comments);
    
    $manager = $this->managers->getManagerOf('Comms');

    $post = $manager->viewPost($_GET['id']);
    
    $this->page->addVar('post', $post);
  }

  public function executeNewComment(HTTPRequest $request)
  {
    $manager = $this->managers->getManagerOf('Comments');

    $manager->newComment($_GET["id"], $_POST["authorComment"], $_POST["contentComment"]);
    
    header('location: /projet-5-airfrance/Web/communication-onGoing-' . $_GET["id"]);
  }
}