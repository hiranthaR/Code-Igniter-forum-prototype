<?php

class Forum extends CI_Controller
{

	public function getAnswers()
	{
		$this->load->model('Forum_Model');
		$res = $this->Forum_Model->readAnswers(2018, 32, "phy");
		foreach ($res as $row) {
			echo($this->createAnswer($row));
		}
	}

	public function updateAnswers($id, $row)
	{
		$this->load->model('Forum_Model');
		echo $this->Forum_Model->updateAnswer($row, $id);
	}

	public function insertAnswers($row)
	{
		$this->load->model('Forum_Model');
		$id = $this->Forum_Model->insertAnswer($row);
		$row += ['answer_id' => $id];

		echo $this->createAnswer($row);
	}

	public function deleteAnswers($id)
	{
		$this->load->model('Forum_Model');
		echo $this->Forum_Model->deleteAnswer($id);

	}

	private function createAnswer($answer)
	{

		//rendering the answer view from the answer's data
		$answerText = trim($answer->answer_text);
		$answerText = str_replace("\r\n", "</br>", $answerText);
		$owner = $answer->owner;
		$likes = $answer->likes;
		$dislikes = $answer->dislikes;
		$answerID = $answer->answer_id;

		$username = 'hirantha';
		$role = 'moderator';

		$delete = "";
		//render if owner or admin delete function
//    only answer owner or admin can delete the answer replay
		if ($username == $owner || $role == 'moderator') {
			$delete = "<img src='" . base_url() . "assests/icons/delete.png' onclick='deleteAnswer(" . $answerID . ");' alt='delete' style='height: 18px;margin:auto 10px;width: 18px;float: right'>";
		}

		$edit = "";
		//render if owner edit function
		//only owner can edit the answer
		if ($username == $owner) {
			$edit = "<img src='" . base_url() . "assests/icons/edit.png' onclick='showHideBand(" . $answerID . ");' alt='edit' style='height: 18px;margin:auto 10px;width: 18px;float: right'>";
		}

		$answerView = "<div class='answer-box' id='answer-box-" . $answerID . "'>
<div class='answer-box-answer' id='answer-box-answer-text-" . $answerID . "'>" . $answerText . "</div>
<div class='answer-box-user-band'>

<img src='" . base_url() . "assests/icons/user.png' alt='user' style='height: 18px;width: 18px;float: left'>
<a href='#' style='color: white;text-decoration: none;font-weight: bold'>
<span style='margin-left: 3px;'>" . $owner . "</span>
</a>

" . $delete . "
" . $edit . "

<a href='#' style='color: white;'>
<span style='margin-left: 3px;margin-right: 15px;float: right'>0</span>
<img src='" . base_url() . "assests/icons/chat.png' alt='user' style='height: 18px;width: 18px;float: right'>
</a>

<a href='#' style='color: white;'>
<span style='margin-left: 3px;margin-right: 10px;float: right'>" . $dislikes . "</span>
<img src='" . base_url() . "assests/icons/dislike.png' alt='user' style='height: 18px;width: 18px;float: right'>
</a>

<a href='#' style='color: white;'>
<span style='margin-left: 3px;margin-right: 10px;float: right'>" . $likes . "</span>
<img src='" . base_url() . "assests/icons/like.png' alt='user' style='height: 18px;width: 18px;float: right'>
</a>

</div>
<div class='answer-box-edit-band' hidden id='edit-band-" . $answerID . "'>
<form onsubmit='onEditFormSubmit(event," . $answerID . ")' style='text-align: right' id='edit-form-" . $answerID . "'>
<textarea rows='5' form='edit-form-" . $answerID . "' name='answer_text' style='resize: none;width: 100%;font-size: 14px'>" . str_replace("</br>", "\r\n", $answerText) . "</textarea>
 <br>
    <input type='submit' value='Edit Answer' class='form-button'>
</form>
</div>
</div>";
		return $answerView;
	}
}
