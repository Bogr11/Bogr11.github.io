<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 29-Sep-16
 * Time: 20:43
 */

$search = $_POST['search'];
$search = str_replace(' ', '+', $search);
$data = file_get_contents('http://www.omdbapi.com/?t='.$search);
$data = json_decode($data, true);
$keys = array_keys($data);

if($data['Runtime']!='N/A') {
    $runTime = $data['Runtime'] + 0;
    $runTime = intval($runTime / 60) . 'hour. ' . $runTime % 60 . 'min';
}
else{
    $runTime = 'N/A';
}

$imdbStarWidth = $data['imdbRating'] / 10 * 295;


if($data['Type']=='movie'){
    $imageSource = 'green-star.png';

}
elseif($data['Type']=='series'){
    $imageSource = 'pink-star.png';
}
?>

<script type="text/javascript">
    var result = '<?php echo $imageSource ?>';
    console.log(result);
    if(result == 'green-star.png'){
        document.getElementById("svgPink").innerHTML = " ";
        document.getElementById("searchBut").style.backgroundColor = '#00a99b';
    }
    else {
        document.getElementById("svgGreen").innerHTML=" ";
        document.getElementById("searchBut").style.backgroundColor = '#d3145a';
    }
</script>

<?php
/*foreach ($keys as $key) {
    if ($key != 'Title' && $key != 'Plot' && $key != 'Runtime' && $key != 'Genre' && $key != 'imdbRating' && $key != 'Director'
    && $key != 'imdbVotes' && $key != 'Released' && $key != 'Year') {
        unset($data[$key]);
    }
} */

if ($data['imdbID'] == '' and ($data['Type'] != 'movie' or $data['Type'] != 'series')){
    echo "Wrong Film/Series name or no such Film/Series in database";
    logConsole($data['imdbID']);
    logConsole($data['Type']);
}
else {
    if($data['Poster']!='N/A') {
        echo '<div id="filmTotal"><div id="filmImage">' . '<img src=' . $data['Poster'] . ' style="max-width:80%; height: 384px"></div>';
    }
    echo '<div id="filmText">'
        .'<div id="filmTitle">' . '<span id="title">'.$data['Title'] . '</span><span id="year">(' . $data['Year'] . ')</span></div>'
        . '<div id="filmTime">' . $runTime . '</div><br>'
        . '<div id="filmRate">';
    echo '<div id="stars">';
    putImage($imageSource);
    echo '</div>';
    echo '<div id="starsOver" style="width:'. $imdbStarWidth .'px">';
    putImage($imageSource);
    echo '</div>';
    echo  '<div id="votes">'.$data['imdbVotes'] . ' votes</div></div>'
        . '<div id="filmChar"><p>' . 'Director: ' . $data['Director'] . '</p><p>Genre: ' . $data['Genre'] . '</p><p>Date of Release: ' . $data['Year'] . '</p></div>'
        . '<div id="filmDesc">' . $data['Plot'] . '</div></div></div>';

 /*   $data['Title'] . '  (' . $data['Year'] . ')' . '<br>' . $data['Runtime'] . '<br>' . $data['imdbRating'] . ' ' . $data['imdbVotes'] .
        '<br>Director: ' . $data['Director'] . '<br>Genre: ' . $data['Genre'] . '<br> Date of Release: ' . $data['Year'] . '<br>' .
        $data['Plot'] . '<br>' . '<img src='.$data['Poster'].'>'; */
}







function logConsole($name, $data = NULL, $jsEval = FALSE)
{
    if (! $name) return false;

    $isevaled = false;
    $type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

    if ($jsEval && (is_array($data) || is_object($data)))
    {
        $data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
        $isevaled = true;
    }
    else
    {
        $data = json_encode($data);
    }

    # sanitalize
    $data = $data ? $data : '';
    $search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
    $replace_array = array('"', '', '', '\\n', '\\n');
    $data = preg_replace($search_array,  $replace_array, $data);
    $data = ltrim(rtrim($data, '"'), '"');
    $data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

    $js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script>
JSCODE;

    echo $js;
} # end logConsole

function putImage($src){

    for ($i=0; $i<10; $i++){
        echo '<img src="'. $src . '" style="width:25px; height:25px">';
    }

}