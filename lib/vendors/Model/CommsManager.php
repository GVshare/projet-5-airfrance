<?php
namespace Model;

use \OCFram\Manager;

abstract class CommsManager extends Manager
{
	abstract public function getOpenPosts();
}