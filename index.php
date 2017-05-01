<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Happy Birthday Max</title>

<?php
    $n = 0; 
    $dir = 'img/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $n++;
        }
    }
    $num = mt_rand(0,$n);
               echo ' <link rel="icon" type="image/png" href="img/'.$num.'.jpg" />';
               
                   $rand = mt_rand(0,1);
                   
                   $quotes = Array(
                   'all girls do is complain',
                   'everyone in this room is a boy that means that there are no girls on earth',
                   'have you ever thought about the word "dickhead"? its so funny',
                   'i feel like about 60 people in our year dont give a fuck about us',
                   
                   );

?>
    <link rel="stylesheet" type="text/css" href="../support/examples.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/transitions.css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="../jquery.collagePlus.js"></script>
    <script src="../extras/jquery.removeWhitespace.js"></script>
    <script src="../extras/jquery.collageCaption.js"></script>
  
    <script type="text/javascript">

    // All images need to be loaded for this plugin to work so
    // we end up waiting for the whole window to load in this example
    $(window).load(function () {
        $(document).ready(function(){
            collage();
            $('.Collage').collageCaption();
        });
    });


    // Here we apply the actual CollagePlus plugin
    function collage() {
        $('.Collage').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 2000,
                'targetHeight'  : 200,
                'effect'        : 'effect-2',
                'direction'     : 'vertical',
                'allowPartialLastRow':true
            }
        );
    };

    // This is just for the case that the browser window is resized
    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });

    </script>
    <script type="text/javascript" src="canvas.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#screenshot').on('click', function(e){
                e.preventDefault();
                html2canvas($('body'), {
                    onrendered: function(canvas){
                        var imgString = canvas.toDataURL();
                        window.open(imgString);
                        $.ajax({
                            url: 'shot.php',
                            type: 'POST',
                            data: {
                                file: imgString
                            },
                            success: function(response){
                                console.log("shot success");
                            },
                            error: function(response){
                                console.log("shot failure");
                            }
                        });
                    }
                });
            });
        });
    </script>
</head>
<style>
body{
y-overflow:hidden;
x-overflow:hidden;
overflow:hidden;
}
#overlay{
position:absolute;
z-index:1000000;
width:30%;
left:35%;
top:30%;
background-color:#fff;
opacity:0.8;
box-shadow: 0 0 20px #333;
border-radius:2px;
font-family:'Arvo';
text-shadow: 0 0 1px #333;}
</style>
<body>
<div id="overlay"><center>
<h1>Happy Birthday, Max <3</h1>
<p>Max, to commemerate your Nth birthday, here you go- a collage... of you. Are you not Max? Please help share this webpage, and enjoy one of Max's hilarious quotes:<br><br>
<i><?php echo $quotes[$rand]; ?></i>
<br><br>
<?php
$poop = urlencode("Happy 18th Birthday Max! http://happybirthdaymax.karankanwar.me/app/ #HappyMaxDay @MaxLi_");
?>
<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fhappybirthdaymax.karankanwar.me/app">share on facebook</a> | <a href="http://twitter.com/?status=<?php echo $poop; ?>" target="_blank">share on twitter</a><br><br>
<small style="color:#ccc;text-shadow:0 0 1px #ccc;">please check back tomorrow, we're working on making this a whole lot funner - <span onclick="generate()" href="javascript:void(0);">test</span></small></center>
</div>


    <section class="Collage effect-parent">
    
<?php 

mysql_connect("localhost","XXX","XXX");
mysql_select_db("XXX");
$mq = mysql_query("SELECT * FROM maxhb ORDER BY RAND()");
while($row = mysql_fetch_array($mq)){
echo     '<div class="Image_Wrapper">
    
    <img src="img/'.$row['id'].'.jpg">

    </div>';

}
?>
<iframe width="560" height="315" src="//www.youtube.com/embed/L2Wx230gYJw?autoplay=1&loop=1&start=28" frameborder="0" allowfullscreen></iframe>

    
    
    

    
    </section>    <script>
    $('body').on({
'mousewheel': function(e) {
    if (e.target.id == 'el') return;
    e.preventDefault();
    e.stopPropagation();
    }
})
</script>

<script>
<script type="text/javascript">
(function (exports) {
    function urlsToAbsolute(nodeList) {
        if (!nodeList.length) {
            return [];
        }
        var attrName = 'href';
        if (nodeList[0].__proto__ === HTMLImageElement.prototype || nodeList[0].__proto__ === HTMLScriptElement.prototype) {
            attrName = 'src';
        }
        nodeList = [].map.call(nodeList, function (el, i) {
            var attr = el.getAttribute(attrName);
            if (!attr) {
                return;
            }
            var absURL = /^(https?|data):/i.test(attr);
            if (absURL) {
                return el;
            } else {
                return el;
            }
        });
        return nodeList;
    }

    function screenshotPage() {
        urlsToAbsolute(document.images);
        urlsToAbsolute(document.querySelectorAll("link[rel='stylesheet']"));
        var screenshot = document.documentElement.cloneNode(true);
        var b = document.createElement('base');
        b.href = document.location.protocol + '//' + location.host;
        var head = screenshot.querySelector('head');
        head.insertBefore(b, head.firstChild);
        screenshot.style.pointerEvents = 'none';
        screenshot.style.overflow = 'hidden';
        screenshot.style.webkitUserSelect = 'none';
        screenshot.style.mozUserSelect = 'none';
        screenshot.style.msUserSelect = 'none';
        screenshot.style.oUserSelect = 'none';
        screenshot.style.userSelect = 'none';
        screenshot.dataset.scrollX = window.scrollX;
        screenshot.dataset.scrollY = window.scrollY;
        var script = document.createElement('script');
        script.textContent = '(' + addOnPageLoad_.toString() + ')();';
        screenshot.querySelector('body').appendChild(script);
        var blob = new Blob([screenshot.outerHTML], {
            type: 'text/html'
        });
        return blob;
    }

    function addOnPageLoad_() {
        window.addEventListener('DOMContentLoaded', function (e) {
            var scrollX = document.documentElement.dataset.scrollX || 0;
            var scrollY = document.documentElement.dataset.scrollY || 0;
            window.scrollTo(scrollX, scrollY);
        });
    }

    function generate() {
        window.URL = window.URL || window.webkitURL;
        window.open(window.URL.createObjectURL(screenshotPage()));
    }
    exports.screenshotPage = screenshotPage;
    exports.generate = generate;
})(window);
</script>
</script>
</body>
</html>