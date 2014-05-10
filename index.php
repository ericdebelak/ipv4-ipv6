<!DOCTYPE html>

<html>
<head>
    <title>IP address fun!</title>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="http://malsup.github.com/min/jquery.form.min.js"></script>
</head>

<body>
    <form id="ipv6" method="post" action="ipvx_proc.php">
    <button type="submit">Write your IP address to a database!</button>
    </form>
    <div id="info"></div>
    <script> 
        $(document).ready(function() 
        { 
            var options = 
            {
            	target:        	"#info",
        	success:       	showResponse,
            	url:		'ipvx_proc.php',
            	type: 		'post',
            };
            
            $("#ipv6").submit(function()
            { 
                $(this).ajaxSubmit(options);
                return false; 
            }); 
        
	    function showResponse(responseText, statusText, xhr, $form)  
	    { 
  			
  	    } 
	});
	    
    </script>
</body>
</html>
