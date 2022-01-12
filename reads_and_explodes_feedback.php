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
$feedback_html_location_worker = "iframe-folder/feedback_worker.html";

	$feedback_file_html_worker = fopen($feedback_html_location_worker, "w");
	fwrite($feedback_file_html_worker,"<h2>Kunden Feedback</h2>");

	$feedback_file_html = fopen($feedback_html_location, "w");
	fwrite($feedback_file_html,"<h2>Kunden Feedback</h2>");
	while($row = fgets($file_feedback)) {
		list( $Date, $Name, $Feedback, $Person, $Position ) = explode( ":", $row );
		$position = trim($Position);
		if($position == 'Administrator')
		{
			$position = 'Admin';
		}
		fwrite($feedback_file_html,"<p>Datum: " . $Date . "</p>");
		fwrite($feedback_file_html,"<p>Kunde: " . $Name . "</p>");
		fwrite($feedback_file_html,"<p>Feedback zu " . $position . " " . $Person . "</p>");
		fwrite($feedback_file_html,"<p>Feedback: " . $Feedback . "</p>");
		fwrite($feedback_file_html,"<hr />");
		fwrite($feedback_file_html,"<br />");
			if($position == 'Arbeiter')
			{
				$feedback_file_html_worker = fopen($feedback_html_location_worker, "a");
				fwrite($feedback_file_html_worker,"<p>Datum: " . $Date . "</p>");
				fwrite($feedback_file_html_worker,"<p>Kunde: " . $Name . "</p>");
				fwrite($feedback_file_html_worker,"<p>Feedback zu " . $Position . " " . $Person . "</p>");
				fwrite($feedback_file_html_worker,"<p>Feedback: " . $Feedback . "</p>");
				fwrite($feedback_file_html_worker,"<hr />");
				fwrite($feedback_file_html_worker,"<br />");
				fclose($feedback_file_html_worker);
			}
	}
	fclose($feedback_file_html);
	fclose($file_feedback);
	
	

echo "<script>window.location.assign('client-page.html')</script>";
?>