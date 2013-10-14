<!DOCTYPE html>  
<html xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en" lang="en">   
<head>   
    <title>Roman Numeral tool</title>  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        $("#convertForm").submit(function( event ) {
            event.preventDefault();

            var check = $('#inputRoman').val()? 'roman':'arabic';
            var input = $('#inputRoman').val()? $('#inputRoman').val():$('#inputArabic').val();

            var response = $.post( "process.php", 
                   { 
                    'check': check, 
                    'input': input, 
                   }) 
            .done(function( data ) {
                var aResp = JSON.parse(data);
            });
        });
    });
    </script>  
</head>  
<body>
    <div id="submit-form">  
        <form id="convertForm" method="post">  
            <div class="formblock">  
                <input type="text" name="inputRoman" id="inputRoman" value="" /> Make Numeric <br>
                <input type="text" name="inputArabic" id="inputArabic" value="" /> Make Roman <br>
            </div>  
            <div id="showData"></div>                  
                              
            <button name="submit" id="formSubmit" type="submit" class="subbutton">Convert!</button>  
        </form>             
    </div>  
                      
    </div><!-- End #contact -->  
</body>
