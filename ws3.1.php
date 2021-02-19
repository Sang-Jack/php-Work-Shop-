<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Quotes HTML table from CSV data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/2.0.3/pure-min.css">
<style>
     body {
       margin-left:12px;
       margin-top:12px;
       margin-top:8px;
       font-size:17px;
	   font-family: "Candara";
    }
    h4  {
        font-size: 18px;
        font-weight: 600;
        color: #804000;
    }
    td {
        vertical-align: top;
    }
    a {
        color: #804000;
        font-weight: 500;
    }
</style>
</head>

<body>
    <h4>Quotes from CSV data:</h4>
    <table class="pure-table pure-table-horizontal pure-table-striped" style="width:840px;">
    
	<?php
# always include this line
@date_default_timezone_set("GMT"); 

$file = fopen("quotes.csv","r");
$count = 1;
$rno = 1;

$xml = '<records>';

while(! feof($file)) {
            
        $rec = fgetcsv($file, 2000 ,'|');
        
        if ($count == 1) {
            $elms = $rec;
            $count++;
        }
        else {
            
            $xml .= '<record id="' .  $rno . '">';
            
            for ($i=0; $i < count($elms); $i++) {
                
                $xml .= '<' . $elms[$i] . '>' . $rec[$i] . '</' . $elms[$i] . '>';
                
            }
            $xml .= '</record>';
            $rno++;
        }
   
  }

fclose($file);
$xml .= "</records>";

header("Content-type: text/xml");
echo $xml;
?>
		
    </table>
</body>
</html>