<?php
namespace Model;

use \OCFram\Manager;

abstract class CommentsManager extends Manager
{
	abstract public function getComments($idPost);
}