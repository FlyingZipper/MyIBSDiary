$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileinput = e.target.files[0]; 
            if(fileinput){
                $('label.selected-file').text("").append('<i class="icon-line-paper-clip"></i>').append(fileinput.name);
            }
            else{
                $('label.selected-file').text("").append('<i class="icon-upload-alt"></i>').append("No file as been selected");
            }
            
    });
});
