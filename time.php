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

?>
