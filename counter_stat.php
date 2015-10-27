<?php
	function setLog($vCount, $refURL)
	{
		$file="cgi-bin/visitor_log.txt";
		$opfile=fopen($file, "a") 
			or die("Couldn't open $file");
		$newRec=$vCount."<!s!>";
		$newRec.=$_SERVER['REMOTE_ADDR']."<!s!>";
		$newRec.=date("M j Y H:i:s")."<!s!>";
		$newRec.=$refURL."<!s!>";
		$newRec.=$_SERVER['SCRIPT_NAME']."\n";	
		fputs($opfile, $newRec);
		fclose($opfile);
		////////////////////////////
		$numRec=0;
		$newRec="";
		$opfile=fopen($file, "r") 
			or die("Couldn't open $file");
		while(!feof($opfile))
		{
			$line=fgets($opfile, 1024);
			if($numRec>500)
			{
				$newRec.=$line;
			}
			$numRec++;
		}
		fclose($opfile);
		
		if($numRec>1000)
		{
			$opfile=fopen($file, "w") 
				or die("Couldn't open $file");
			fputs($opfile, $newRec);
			fclose($opfile);		
		}	
	}
	//////since date
	$file="cgi-bin/since_date.txt";
	$opfile=fopen($file, "r") or die("Couldn't open $file");
	$sinceDate=fgets($opfile,1024);
	fclose($opfile);
	
	//////visitor counter
	$file="cgi-bin/visitor_counter.txt";
	$opfile=fopen($file, "r") or die("Couldn't open $file");
	$vCount=fgets($opfile,1024);
	$vCount=(int)$vCount;
	fclose($opfile);
	if(!$_SERVER['HTTP_REFERER'])
	{
		$vCount++;
		setLog($vCount, "Direct Hit");
	}
	else
	{
		if(substr_count($_SERVER['HTTP_REFERER'],"http://www.unioncrafts.com")==0)
		{		
			$vCount++;
			setLog($vCount, $_SERVER['HTTP_REFERER']);
		}
	}
	$opfile=fopen($file, "w") 
		or die("Couldn't open $file");
	fputs($opfile,$vCount);
	fclose($opfile);
	
	//////hit counter
	$file="cgi-bin/hit_counter.txt";
	$opfile=fopen($file, "r") or die("Couldn't open $file");
	$hCount=fgets($opfile,1024);
	$hCount=(int)$hCount;
	fclose($opfile);
		$hCount++;
	$opfile=fopen($file, "w");
	fputs($opfile,$hCount);
	fclose($opfile);
	print "\n\n";
	print"_____________________________________________\n";
	print "Counter Start since $sinceDate:\n";
	print " Visitor Counter: $vCount\n";
	print " Hit Counter: $hCount\n";
	print"_____________________________________________\n\n";
?>