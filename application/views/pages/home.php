<?php

require_once("forum.php");

// temporary hardcode question data
// in $_post carry question number and year as the primary keys of question
// table.then retrieve question and show in here.
// but my part of here is crud of forum.so i hardcode question and answers
$questionYear = 2018;
$questionNumber = 32;
$questionSubjectCode = "phy";

?>

<?php echo createQuestion($questionYear, $questionNumber, $questionSubjectCode) ?>
<div id="answers-container">
</div>
<?php echo createInsertBoard(); ?>
<div style="width: 97%;background-color: #8f8f8f;height: 1px;margin: auto"></div>
<div style="width: 97%;color: #8f8f8f;text-align: center">~ T.M.S.H.Rathnayake - 17001447 ~</div>
<br>
<script>

	function onEditFormSubmit(event, id) {
		event.preventDefault();
		var data = $('#edit-form-' + id).serializeArray();
		data.push({name: 'id', value: id});
		$.ajax({
			url: "<?php echo base_url();?>index.php/forum/updateAnswers",
			method: 'post',
			data: data,
			success: function (res) {
				if (res) {
					document.getElementById("answer-box-answer-text-" + id).innerHTML = data[0]['value'].replace(/\r\n/g, "</br>");
					showHideBand(id);
				} else alert("failed to edit!");
			},
			error: function (e) {
				console.log(e.status);
				console.log(e.message);
				console.log(e.responseText);
			}
		});
	}

	function showHideBand(id) {
		document.getElementById("edit-band-".concat(id)).hidden = !document.getElementById("edit-band-" + id).hidden;
	}

	function deleteAnswer(id) {
		$.ajax({
			url: "<?php echo base_url();?>index.php/forum/deleteAnswers",
			method: 'post',
			data: {id: id},
			success: function (data) {
				if (data)
					document.getElementById("answer-box-" + id).remove();
				else
					alert("error while deleting!");
			},
			error: function (e) {
				console.log(e.status);
			}
		});
	}

	$(document).ready(function () {

		var data = {
			'question_year': <?php echo $questionYear ?>,
			'question_number': <?php echo $questionNumber ?>,
			'question_subject_code': '<?php echo $questionSubjectCode ?>'
		};

		$.ajax({
			url: "<?php echo base_url();?>index.php/forum/getAnswers",
			data: data,
			method: 'get',
			success: function (data) {
				document.getElementById("answers-container").innerHTML += data;
			},
			error: function (e) {
				console.log(e.message);
				console.log(e.status);
				console.log(e.responseText);
			}
		});

		$('#answer-form').on('submit', function (e) {
			e.preventDefault();
			var data = $('#answer-form').serializeArray();
			data.push({name: "owner", value: "<?php echo $username ?>"});
			data.push({name: "question_year", value: "<?php echo $questionYear?>"});
			data.push({name: "question_number", value: "<?php echo $questionNumber ?>"});
			data.push({name: "question_subject_code", value: "<?php echo $questionSubjectCode ?>"});
			$.ajax({
					url: "<?php echo base_url();?>index.php/forum/insertAnswers",
					data: data,
					method: 'post',
					success: function (data) {
						$('#answer-form').trigger('reset');
						document.getElementById("answers-container").innerHTML += data;
					},
					error: function (e) {
						console.log(e.status);
						console.log(e.message);
						console.log(e.responseText);
						alert("error:" + e.message);
					}
				}
			);
		})
	});
</script>
