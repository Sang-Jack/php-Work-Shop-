<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<title>HTML5 Form Example </title>

<style>
body {
  margin: 20px auto;
  font-family: Georgia, serif;
  font-weight: 500;
  font-size: 16px;
  margin-left: 12px;
}

h4 {
    font-family: sans-serif;
    font-size: 20px;
    color: #214252;
}

form{
  margin: 20px;
}

p.note {
  font-size: 1rem;
  color: red;
}
input, textarea, select {
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-left: 20px;
  padding: 8px;
  margin-bottom: 8px;
  font-family: sans-serif;;
  font-size: 16px;
  width: 240px;
  vertical-align: middle;
}
label {
  font-family: sans-serif;
  font-size: 16px;
  width: 146px;
  display: inline-block;
}
input[type=submit] {
  background-color: #214252;
  color: white;
  width: 120px;
  padding: 8px 20px;
  font-size: 18px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  margin-left: -4px;
}

input[type=submit]:hover {
  background-color: #92817a;
}
          </style>
      </title>
</head>

<body>
      <div>
    <h4>Enter a new quote:</h4>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="quote">quote: </label>
  <textarea id="quote" name="quote" placeholder="A specific quote ..." minlength="8" 
    maxlength="2048" required="required"></textarea>
  <br>

  <label for="source">source: </label>
  <input type="text" id="source" name="source" placeholder="Joe Bloggs" minlength="4" maxlength="32" required="required">
  <br>

  <label for="dob">dob: </label>
  <input type="text" id="dob" name="dob" placeholder="237 BC" maxlength="12" required="required">
  <br>

  <label for="dod">dod: </label>
  <input type="text" id="dod" name="dod" placeholder="2020" maxlength="12">
  <br>

  <label for="wplink">wplink: </label>
  <input type="url" id="wplink" name="wplink" placeholder="https://en.wikipedia.org/wiki/" pattern="https:\/\/en\.wikipedia\.org\/wiki\/([a-zA-z0-9\-_\.]+)" required="required">
  <br>

  <label for="wpimg">wpimg: </label>
  <input type="url" id="wpimg" name="wpimg" placeholder="https://upload.wikimedia.org/" required="required">
  <br/>

  <label for="">category:</label>
  <select name="category" id="category">
    <option value="romantic">romantic</option>
    <option value="political">political</option>
    <option value="humerous">humerous</option>
    <option value="philosphical">philosophical</option>
  </select>
  <br/><br/>

  <input type="submit" value="submit">
</form>
</div>
<br/><br/>

<?php
if (!empty($_POST['quote'])) {
   	
	$rec = implode('|', $_POST).PHP_EOL;
    
	$write = file_put_contents('query_result.csv', $rec, FILE_APPEND | LOCK_EX);
    
	if ($write) {
		echo '<p>Thank you - the following record was saved:</p>';
		echo '<table class="table table-striped table-bordered" style="width:600px">';
    
		foreach($_POST as $k=>$v) {
			echo '<tr>';
			echo '<td><strong>';
			echo $k;
			echo ': </strong></td>';
			echo '<td>';
			echo $v;
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo '<p>Sorry ... there appears to be a file write error.</p>';
	}
}
?>
</body>
</html>