<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function createQuestion($questionYear, $questionNumber, $questionSubjectCode)
{

	//just hard coded question
	//because question and answer tables come from database.but my scope is to implement forum section
	$questionSubject = $questionSubjectCode == "phy" ? "Physics" : "other";
	$question = "What is equal to 1111 base 2 in decimal?";
	$answer1 = "8";
	$answer2 = "23";
	$answer3 = "16";
	$answer4 = "15";
	$answer5 = "17";

	//rendering question view from question data
	$qestionView = "<div class='question-box'>
    <div class='question-header'>" . $questionSubject . " " . $questionYear . " - " . $questionNumber . "</div>
<div class='question'> " . $question . " </div>
<ol>
    <li>
        <div class='answer'>" . $answer1 . "</div>
    </li>
    <li>
        <div class='answer'>" . $answer2 . "</div>
    </li>
    <li>
        <div class='answer'>" . $answer3 . "</div>
    </li>
    <u><b>
    <li>
        <div class='answer'>" . $answer4 . "</div>
    </li>
    </b></u>
    <li>
        <div class='answer'>" . $answer5 . "</div>
    </li>
</ol>
</div>";

	return $qestionView;
}

function createInsertBoard()
{

	//creating the post box
	$insertView = "<div class='answer-box'>
    <div style='background-color: #454545;color: white;font-size: 18px;padding: 2px 7px'>Add new Comment</div>
    <form id='answer-form' style='padding: 10px;text-align: right'>
    <textarea rows='5' form='answer-form' name='answer_text' style='resize: none;width: 100%;font-size: 14px'></textarea>
    <br>
    <input type='submit' value='Add answer' class='form-button'>
</form>
</div>";
	return $insertView;
}
