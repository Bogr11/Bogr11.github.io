<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet/less" type="text/css" href="style.less">
    <script src="less.js" type="text/javascript"></script>
</head>
<body>

<?php
echo '<div class="line">
        <div class="bg-img"><img style="width: 100%" src="background.jpg"></div>
        <div class="filler">
        <header>'
   //    <div class="svg"></div>

        .'
        <div class="svg">  
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><defs><style>.cls-1{fill:#00a99d;}</style></defs><title>logo</title><path class="cls-1" d="M66,46H3V62.31H3V88.44H3V99H66V46h0Zm-3,4v6H55V50h8ZM50,50v6H42V50h8ZM39,50v6H30V50h9ZM26,50v6H19V50h7ZM6,50h9v6H6V50ZM6,60H63V86H6V60ZM6,91h9v5H6V91Zm13,5V91h7v5H19Zm11,0V91h9v5H30Zm12,0V91h8v5H42Zm13,0V91h8v5H55Z"/><path class="cls-1" d="M85.21,72.39l-1.28,2.42v8.12H79.77V56.5h4.15V67.94H84L89.36,56.5h4.15L87.74,68.28l5.78,14.65H89.25Z"/><path class="cls-1" d="M108.84,82.92h-4.19l-0.72-4.79h-5.1l-0.72,4.79H94.31L98.54,56.5h6.08Zm-9.48-8.38h4l-2-13.36h-0.08Z"/><path class="cls-1" d="M110.77,56.5h6.57c4.15,0,6.19,2.3,6.19,6.53V76.39c0,4.23-2,6.53-6.19,6.53h-6.57V56.5Zm4.15,3.78V79.15h2.34c1.32,0,2.11-.68,2.11-2.57V62.84c0-1.89-.79-2.57-2.11-2.57h-2.34Z"/><path class="cls-1" d="M134.85,82.92a8.13,8.13,0,0,1-.38-3.25V75.52c0-2.45-.83-3.36-2.72-3.36h-1.43V82.92h-4.15V56.5h6.27c4.3,0,6.15,2,6.15,6.08v2.08c0,2.72-.87,4.45-2.72,5.32v0.08c2.08,0.87,2.76,2.83,2.76,5.59v4.08a7.77,7.77,0,0,0,.45,3.21h-4.23Zm-4.53-22.65v8.12h1.62c1.55,0,2.49-.68,2.49-2.79V63c0-1.89-.64-2.72-2.11-2.72h-2Z"/></svg>
        </div>
        
        <form action="index.php"  method="post" id="searchForm">
            <input type="text" id="searchTextArea" name="search" placeholder="search"/><input
             type="submit" alt="go"  name="submit" id="searchBut" value=" " />
       </form>

        </header>
        
        
        <div class="wrapper">
        
        ';
if(isset($_POST['submit'])){
    include 'search.php';
}
echo '</div></div></div>';

?>


</body>
</html>

