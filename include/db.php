<?php

class DB{
	private $dbh;

	public function __construct(){ // SQL connection
		$this->dbh = new PDO('sqlite:db/systemDB.db');
		if (!($this->dbh)){
			exit("Database Connection Error.");
		}
	}
	
	public function closeDB(){
		$this->dbh = null;
	}

	
	public function getAllQuestionLink($setId){
	$counter=1;
		foreach ($this->dbh->query('SELECT * FROM Question where setId = '.$setId.' limit 20') as $row)
		{
			echo '<audio id="player'.$counter.'">'.
				'<source src="'.$row[3].'.mp3" type="audio/mpeg">'.
				'<source src="'.$row[3].'.wav" type="audio/wav">'.
				'</audio>';
			//echo '<audio id="player'.$row[0].'" src="'.$row[3].'" type="audio/wav"/>'; // TODO
			$counter++;
		}
	}
	
	public function getAllQuestionAns($setId){
		echo "<script>var ans = [";
		foreach ($this->dbh->query('SELECT cantonese FROM Question where setId = '.$setId.' limit 20') as $row)
		{
			echo "'".$row[0]."',";
		}
		echo "];</script>";
	}
	
	public function getAllQuestionInTable($setId){
	$counter=1;
		foreach ($this->dbh->query('SELECT * FROM Question where setId = '.$setId.' limit 20') as $row)
		{
			echo "<tr>";
			echo "<td>".$counter."</td>";
			if ($row[2]=="T")
				echo "<td>Cantonese</td>";
			else
				echo "<td>Mandarin</td>";
			echo "<td id='correctRow".$counter."'></td>";
			echo "<td id='timeRow".$counter."'></td>";
			echo "</tr>";
			$counter++;
		}
	}
}

?>