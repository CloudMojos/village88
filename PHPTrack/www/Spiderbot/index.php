<?php
	// http://simplehtmldom.sourceforge.net/
	// MANUAL: http://simplehtmldom.sourceforge.net/manual.htm

	require("simple_html_dom.php");
	$html = file_get_html('https://www.bing.com/search?q=food&form=QBLH&sp=-1&ghc=1&lq=0&pq=food&sc=11-4&qs=n&sk=&cvid=854F5B25A286430B9113860675CBFB20&ghsh=0&ghacc=0&ghpl=');

	// Find result
	$result = $html->find('#b_results > li.b_algo > h2 > a');
	$i = 0;
	while ($i < 5 && isset($result[$i])) {
		$link = $result[$i]->href;
		$text = $result[$i]->innertext;
		echo '<h2>';
		echo $i + 1 . '. ' . $text;
		echo '</h2>';
		echo "<a href=\"$text\">";
		echo "$link";
		echo "</a>";
		$i++;
	}
?>