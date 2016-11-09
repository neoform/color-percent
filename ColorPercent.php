<?php

	function hexpercent($from_hex, $to_hex, $percent) {
							
		if ($percent > 100) {
			$percent = 100;
		} else if ($percent < 0) {
			$percent = 0;
		}
		
		$from = array(
			base_convert(substr($from_hex, 0, 2), 16, 10),
			base_convert(substr($from_hex, 2, 2), 16, 10),
			base_convert(substr($from_hex, 4, 2), 16, 10),
		);
		
		$to = array(
			base_convert(substr($to_hex, 0, 2), 16, 10),
			base_convert(substr($to_hex, 2, 2), 16, 10),
			base_convert(substr($to_hex, 4, 2), 16, 10),
		);
		
		$r = base_convert(round(($to[0] - $from[0]) / 100 * $percent + $from[0]), 10, 16);
		$g = base_convert(round(($to[1] - $from[1]) / 100 * $percent + $from[1]), 10, 16);
		$b = base_convert(round(($to[2] - $from[2]) / 100 * $percent + $from[2]), 10, 16);
		
		if (strlen($r) === 1) {
			$r = '0' . $r;
		}
		if (strlen($g) === 1) {
			$g = '0' . $g;
		}
		if (strlen($b) === 1) {
			$b = '0' . $b;
		}
		
		return $r . $g . $b;
	}