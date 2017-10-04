#!/usr/bin/php
<?PHP

function get_img($url, $saveto)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$raw = curl_exec($ch);
	curl_close($ch);
	if (file_exists($saveto))
		unlink($saveto);
	$fd = fopen($saveto, 'x');
	fwrite($fd, $raw);
	fclose($fd);
}

if (isset($argv[1]))
{
	$url = $argv[1];
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$s = curl_exec($ch);
	curl_close($ch);
	$pattern = "/<img src=\"([^\"]*)\"/";
	preg_match_all($pattern, $s, $matches);
	$matches = $matches[1];
	if (isset($matches))
	{
		# create dir
	}

	$pattern = "/(http[s]?:\/\/[^\/]*\/|^\/)/";
	foreach ($matches as $str)
	{
		$path[] = $url."/".preg_replace($pattern, "", $str);
	}
	$pattern1 = "/(http[s]?:\/\/)/";

	$dir = preg_replace($pattern1, "", $url);
	print $dir.PHP_EOL;
	foreach ($path as $img)
	{
		preg_match_all("/([^\/]*$)/", $img, $match);
		$name[] = $match[0][0];
	}
	print_r($name);

	foreach ($path as $key => $file)
	{
		print ($dir."/".$name[$key].PHP_EOL);
		// get_img($img, $dir."/".$name[$key]);
	}

}

?>
