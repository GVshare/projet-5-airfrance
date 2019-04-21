<?php
namespace Entity;

use \OCFram\Entity;

class Comments extends Entity
{
  protected $id,
            $idPost,
            $author,
            $content,
            $attachment,
            $dateComment;

  const AUTHOR_INVALID = 1;
  const CONTENT_INVALID = 2;
  const ATTACHMENT_INVALID = 3;
  const DATECOMMENT_INVALID = 4;

  public function isValid()
  {
    return !(
      empty($this->author) || 
      empty($this->content) ||
      empty($this->attachment) ||
      empty($this->dateComment)
    );
  }


  //============================================================ SETTERS ==================================================================//

  public function setAuthor($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->erreurs[] = self::AUTHOR_INVALID;
    }

    $this->author = $author;
  }

  public function setStatus($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALID;
    }

    $this->content = $content;
  }

  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }

  public function setDateOpen($dateComment)
  {
    $this->dateComment = $dateComment;
  }

  //============================================================ GETTERS ==================================================================//

   public function id()
  {
    return $this->id;
  }

   public function idPost()
  {
    return $this->idPost;
  }

  public function author()
  {
    return $this->author;
  }

  public function content()
  {
    return $this->content;
  }

  public function attachment()
  {
    return $this->attachment;
  } 

  public function dateComment()
  {
    return $this->dateComment;
  }
}