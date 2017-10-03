#!/usr/bin/php
<?PHP

print("Enter a number : ");
$handle = fopen('php://stdin', 'r');
while (($var = fgets($handle)) !== false)
{
	$var = rtrim($var, PHP_EOL);
	if (is_numeric($var) && strpos($var, ".") == FALSE)
	{
		if ($var % 2 == 0)
			print("The number $var is even"."\n");
		else
			print("The number $var is odd\n");
	}
	else
		print ("'$var' is not a number\n");
	print("Enter a number : ");
}
print "^D\n";
exit(0);

?>
