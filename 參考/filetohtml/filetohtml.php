<?php
    $file = fopen("file.txt", "r") or exit("Unable to open file!");
    $company = array();
    $i = 0;
    while(!feof($file))
    {
        $str = fgets($file);
        /*echo $str. "<br>";*/
        $company[$i] = mb_split("\s",$str);
        $i++;
    }
    fclose($file);
    /*print_r($company);*/
    if(file_exists('output_file.txt')){
        unlink('output_file.txt');
    }
    $output_file = fopen("output_file.txt", "a");
    error_reporting(0);
    for ( $j = 0 ; $j < $i-1 ; $j++ ) {      
        echo $company[$j][2]. "<br>";
        $out_str= '<div class="col-lg-3 col-md-6 col-xs-12 mix '.$company[$j][2].'">'.PHP_EOL.
        '    <div class="portfolio-item">
        <div class="shot-item">
            <div class="companyname">'.$company[$j][1].'</div>
        <img src="img/aaa/logo/'.$company[$j][0].'.jpg" alt="" />
        <div class="single-content">
        <div class="fancy-table">
          <div class="table-cell">
            <div class="zoom-icon">
            <a class="lightbox" href="img/aaa/job/'.$company[$j][0].'.pdf"target="_blank"><i class="lni-zoom-in item-icon"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>               
  </div>
</div>'.PHP_EOL;
        echo $out_str. "<br>";
        fwrite($output_file, $out_str);
    }
    fclose($output_file);
?>