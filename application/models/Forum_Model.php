<?php

/**
 * Created by IntelliJ IDEA.
 * User: hiruu
 * Date: 6/16/19
 * Time: 2:39 PM
 */
class Forum_Model extends CI_Model
{

	public function readAnswers($qYear, $qNumber, $qSubjectCode)
	{

		return $this->db
			->from('answers')
			->where('question_year', $qYear)
			->where('question_number', $qNumber)
			->where('question_subject_code', $qSubjectCode)
			->get()
			->result();
	}

	public function insertAnswer($row)
	{
		return $this->db->insert('answers', $row);
	}

	public function updateAnswer($row, $id)
	{
		return $this->db->update('answers', $row, 'answer_id=' . $id);
	}

	public function deleteAnswer($id)
	{
		$this->db->delete('answers', array('answer_id' => $id));

	}
}
