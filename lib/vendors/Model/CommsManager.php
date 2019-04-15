<?php
namespace Model;

use \OCFram\Manager;

abstract class CommsManager extends Manager
{
	abstract public function getOpenPosts();
	abstract public function getClosePosts();
	abstract public function newPost($author , $title);
}