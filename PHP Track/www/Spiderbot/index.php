<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_html_dom.php");
    $html = file_get_html('https://www.bing.com/search?q=food&form=QBLH&sp=-1&ghc=1&lq=0&pq=food&sc=11-4&qs=n&sk=&cvid=854F5B25A286430B9113860675CBFB20&ghsh=0&ghacc=0&ghpl=');

    // Find all images 
    foreach($html->find('img') as $element) {
      echo "Image <br>";
      echo $element->src . '<br>';
    }

    // Find all links 
    foreach($html->find('a') as $element) {
      echo $element->href . '<br>';
    } 
?>