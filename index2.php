<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	
	
	
	<!--banner-->
<?php include("header.php");?>
         
		

	<!--banner-->
	<div class="row"style="min-height:400px;">
        
        <div class="col-xs-6 col-md-4">
		   
		  		   <?php 
		   include("left_sidebar.php");
		   ?>
		
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
	
            <div id="type"></div>

		 
		</div>
     </div>
	
	
	
	<script>
	$.fn.typer = function(text, options){
    options = $.extend({}, {
        char: ' ',
        delay: 2000,
        duration: 700,
        endless: true
    }, options || text);

    text = $.isPlainObject(text) ? options.text : text;

    var elem = $(this),
        isTag = false,
        c = 0;
    
    (function typetext(i) {
        var e = ({string:1, number:1}[typeof text] ? text : text[i]) + options.char,
            char = e.substr(c++, 1);

        if( char === '<' ){ isTag = true; }
        if( char === '>' ){ isTag = false; }
        elem.html(e.substr(0, c));
        if(c <= e.length){
            if( isTag ){
                typetext(i);
            } else {
                setTimeout(typetext, options.duration/10, i);
            }
        } else {
            c = 0;
            i++;
            
            if (i === text.length && !options.endless) {
                return;
            } else if (i === text.length) {
                i = 0;
            }
            setTimeout(typetext, options.delay, i);
        }
    })(0);
};

            $('#type').typer(['<h1 style="text-align:center;margin-left:-130px;margin-top:100px;padding-bottom:166px;">Welcome <br> To <br> Our Hospital Management System</h1>' ]);



	
	
	</script>
<?php include_once("footer.php");?>