<?php

$file_feedback_text = "Data/Feedback/feedback.txt";


if(file_exists($file_feedback_text))
{
	$file_feedback = fopen($file_feedback_text,"r");
}
else
{
	$file_feedback = fopen($file_feedback_text, "w");
}

$feedback_html_location = "iframe-folder/feedback.html";

	$feedback_file_html = fopen($feedback_html_location, "w");
	fwrite($feedback_file_html,"<h2>Clients Feedback</h2>");
	while($row = fgets($file_feedback)) {
		list( $Date, $Name, $Feedback, $Position, $Person ) = explode( ":", $row );
		fwrite($feedback_file_html,"<p>Date: " . $Date . "</p>");
		fwrite($feedback_file_html,"<p>Client: " . $Name . "</p>");
		fwrite($feedback_file_html,"<p>Feedback to: " . $Position  . $Person . "</p>");
		fwrite($feedback_file_html,"<p>Message: " . $Feedback . "</p>");
		fwrite($feedback_file_html,"<hr />");
		fwrite($feedback_file_html,"<br />");
	}
	fclose($feedback_file_html);
	fclose($file_feedback);

echo "<script>window.location.assign('client-page.html')</script>";
?>