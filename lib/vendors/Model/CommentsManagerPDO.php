<?php
namespace Model;

use \Entity\Comments;

class CommentsManagerPDO extends CommentsManager
{
	public function getComments($idPost) {
		$sql = '
			SELECT id, idPost, author, content, attachment, attachmentName, dateComment
			FROM comments
			WHERE idPost = ?
			ORDER BY dateComment DESC';

		$requete = $this->dao->prepare($sql);

		$requete->execute(array($idPost));

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comments');

		$comments = $requete->fetchAll();

		$requete->closeCursor();

		return $comments;
	}

	public function newComment($idPost, $authorComment, $contentComment, $file) {

		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		if ($fileError === 0) {
			if ($fileSize < 500000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;

				move_uploaded_file($fileTmpName, $fileDestination);

				} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}

		if ($_FILES["fileAttachment"]["name"] !== "") {
			$sql = '
			INSERT INTO comments (idPost, author, content, attachment, attachmentName, dateComment)
			VALUES (?, ?, ?, ?, ?, NOW())';

		$requete = $this->dao->prepare($sql);

		$requete->execute(array($idPost, $authorComment, $contentComment, $fileDestination, $fileName));

		$requete->closeCursor();
      
		} else {
			$sql = '
			INSERT INTO comments (idPost, author, content, dateComment)
			VALUES (?, ?, ?, NOW())';

		$requete = $this->dao->prepare($sql);

		$requete->execute(array($idPost, $authorComment, $contentComment));

		$requete->closeCursor();

		}
		
	}
}