<?php
namespace Entity;

use \OCFram\Entity;

class Posts extends Entity
{
  protected $id,
            $title,
            $author,
            $dateOpen,
            $status;

  const TITLE_INVALID = 1;
  const AUTHOR_INVALID = 2;
  const STATUS_INVALID = 3;
  const DATEOPEN_INVALID = 4;

  public function isValid()
  {
    return !(
      empty($this->title) || 
      empty($this->author) ||
      empty($this->status) ||
      empty($this->dateOpen)
    );
  }


  //============================================================ SETTERS ==================================================================//

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->erreurs[] = self::TITLE_INVALID;
    }

    $this->title = $title;
  }

  public function setAuthor($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->erreurs[] = self::AUTHOR_INVALID;
    }

    $this->author = $author;
  }

  public function setStatus($status)
  {
    if (!is_string($status) || empty($status))
    {
      $this->erreurs[] = self::CONTENT_INVALID;
    }

    $this->status = $status;
  }

  public function setDateOpen($dateOpen)
  {
    $this->datOpen = $dateOpen;
  }

  //============================================================ GETTERS ==================================================================//

  public function title()
  {
    return $this->title;
  }

  public function author()
  {
    return $this->author;
  }

  public function status()
  {
    return $this->status;
  }

  public function dateOpen()
  {
    return $this->dateOpen;
  }
}