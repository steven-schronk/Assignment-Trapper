<?php

function humanTiming ($time)
{
    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}

function absHumanTiming($time)
{
	$out = '';
	$now_date = date("U", time());
	$time = strtotime($time);

	if($now_date < $time) {
		$time = ($time - $now_date); // number of seconds into the future
		$time = $now_date - $time;   // subtract difference from current time
		$out .= humanTiming($time)." left";
	} else {
		$out .= humanTiming($time)." ago";
	}
	return $out;
}

function tab2space($text, $spaces = 4)
{
    // Explode the text into an array of single lines
    $lines = explode("\n", $text);
    
    // Loop through each line
    foreach ($lines as $line)
    {
        // Break out of the loop when there are no more tabs to replace
        while (false !== $tab_pos = strpos($line, "\t"))
        {
            // Break the string apart, insert spaces then concatenate
            $start = substr($line, 0, $tab_pos);
            $tab = str_repeat(' ', $spaces - $tab_pos % $spaces);
            $end = substr($line, $tab_pos + 1);
            $line = $start . $tab . $end;
        }
        
        $result[] = $line;
    }
    
    return implode("\n", $result);
}

?>
