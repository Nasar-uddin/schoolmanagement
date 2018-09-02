document.addEventListener('DOMContentLoaded', function(){
    var p_title = document.getElementById('post_title');
    var p_body = document.getElementById('post_body');
    var select = document.querySelectorAll('select');
    if(select!=null){
        M.FormSelect.init(select);
    }
    if(p_body!=null){
        M.textareaAutoResize(p_title);
        M.textareaAutoResize(p_body);
    }
    // $('.slider').slider({
    //     indicators:true,
    //     height:600,
    //     transition:500,
    //     interval:3000
    // });
    $('.carousel-slider').carousel({
        fullWidth:true,
        indicators:true
    });
});