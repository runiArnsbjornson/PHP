#!/usr/bin/php
<?PHP

function get_full_html($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($ch);
	curl_close($ch);
	return $html;
}

function create_dir($url)
{
	$url = preg_replace("/^.*?:\/\//", '', $url);
	if (file_exists($url) && is_dir($url))
		exit();
	mkdir($url);
	return ($url);
}

function get_name($img)
{
	preg_match("/^.*?([^\/]+)$/", $img, $matches);
	if (substr($matches[1], -1) === "\"" || substr($matches[1], -1) === "'")
		return (substr($matches[1], 0, -1));
	return ($matches[1]);
}

function get_img($imgs, $dir)
{
	foreach ($imgs[1] as $img)
	{
		$ch = curl_init($img);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		$raw = curl_exec($ch);
		curl_close($ch);
		$fd = fopen($dir."/".get_name($img), 'x');
		fwrite($fd, $raw);
		fclose($fd);
	}
}

function name_img($html, $url)
{
	preg_match_all("/<img[^>]+src=([^\s>]+)/i", $html, $matches);
	foreach ($matches[1] as $k => $v)
	{
		$matches[1][$k] = trim($v, "\"");
		if (!preg_match("/^http(s?):\/\//", $matches[1][$k]))
		{
			preg_match("/^(http(s?):\/\/)([^\/]+)/", $url, $urlMatches);
			$matches[1][$k] = $urlMatches[1]."".$urlMatches[3]."".$matches[1][$k];
		}
		else
			$matches[1][$k] = $url."".$matches[1][$k];
	}
	return ($matches);
}

if ($argc > 1)
{
	$html = get_full_html($argv[1]);
	$url = $argv[1];
	if (!empty($html))
	{
		$imgs = name_img($html, $url);
		$dir = create_dir($url);
		get_img($imgs, $dir);
	}
}

?>
