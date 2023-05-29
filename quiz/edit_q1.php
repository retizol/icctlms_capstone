<div class="qDivSelect" id="1">
	<?php
	$num = array(1,2,3,4);
	//print_r ($num);
	//echo "<pre>"; var_dump($num); echo "</pre>";

	$sql = "SELECT * FROM answer WHERE quiz_question_id=$quiz_question_id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($rows = $result->fetch_assoc()) {
	$ans[] = $rows['answer_text'];
	$choice[] = $rows['choices'];
	$answer_id = $rows['answer_id'];
	//echo "<pre>"; var_dump($answer_id); echo "</pre>";
	//$answers[] = $ans;
	//$choices[] = $choice;
}

$answer1 = 'hey';
$answer2 = 'you';
$answer3 = 'are';
$answer4 = 'hoi';

$arrayu = array($answer1, $answer2, $answer3, $answer4);
$qui = "SELECT answer_id FROM answer WHERE quiz_question_id=$quiz_question_id";
$state = $conn->prepare($qui);
$state->execute();
$resultz = $state->get_result();

while ($rams = $resultz->fetch_assoc()) {
//$answer_ids = $rams['answer_id'];
$ramie = $rams['answer_id'];
$str = (string) $ramie;
//echo $ramie;
//$arraye  = array_map('intval', str_split($ramie));
//echo "<pre>"; var_dump($str); echo "</pre>";
//$listss = array($ramie);
//echo implode($listss);
//echo "<pre>"; var_dump($listss); echo "</pre>";
// outputs: foo, bar, baz
//echo json_encode($listss);
//print_r ($listss);

//echo "<pre>"; var_dump($arraye); echo "</pre>";
}

//echo "<pre>"; var_dump($arrayu); echo "</pre>";
//print_r($arrayu);



	//$stuff = array('A', 'B', 'C', 'D');
	//echo "<pre> answer "; var_dump($answers); echo "</pre>";
	//echo "<pre> choice "; var_dump($choices); echo "</pre>";
	//foreach (array_combine($answers, $choices) as $ans => $choice) {

	//foreach (array_map(NULL, $answers, $choices, $num) as $x) {
		//list($answers, $choices, $num) = $x;
	//	echo "$answers, $choices, $num";

	foreach (array_map(NULL, $ans, $choice, $num) as $x) {
	//foreach (array_map(NULL, (!empty($ans)), (!empty($choice)), (!empty($num))) as $x) {
		//list($ans, $choice, $num) = $x;
		list($ans, $choice, $num) = $x;
		//echo "$ans, $choice, $num";
?>
<div class="input-group mb-2">
	<div class="input-group-prepend">
		<div class="input-group-text">
			<input type="radio" name="answer" value="<?php echo $choice; ?>" <?php if(!empty($row['answer'] == $choice)): echo 'checked'; endif;?>>
		</div>
	</div>
	<input class="form-control" type="text" name="ans<?php echo $num;?>" value="<?php echo $ans;?>">
</div>
<?php } ?>
</div>
