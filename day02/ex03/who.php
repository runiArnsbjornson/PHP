#!/usr/bin/php
<?PHP

date_default_timezone_set('Europe/Paris');

$buf = file_get_contents("/var/run/utmpx");
$ret = [];
while ($buf != "")
{
	$tar = unpack("A256user/A4id/A32ttyname/ipid/itype/lloginsec/lloginus/A256host/A64pad", $buf);
	if ($tar['type'] == 7)
		$ret[] = $tar['user']." ".$tar['ttyname']."  ".strftime("%b %e %R", $tar['loginsec']);
	$buf = substr($buf, 628);
}
sort($ret);
foreach ($ret as $disp)
{
	print $disp.PHP_EOL;
}

?>
