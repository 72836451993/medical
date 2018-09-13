$(document).ready( function() {
    $(document).on('submit','#add_medicine',function (e) {
        var medicine = $('#medicine').val();
        var wieght = $('#medicine_weight').val();
        var weightRGEX = /^[0-9]*$/
        var medicineRGEX =/^[a-zA-Z0-9]*$/;
        var medicineResult = medicineRGEX.test(medicine);
        var weightResult = weightRGEX.test(wieght);
        if(medicineResult == false ){
            e.preventDefault();
            $('#medicine').addClass('error');
        }
        else{
            $('#medicine').removeClass('error');
        }
        if(weightResult ==false){
            e.preventDefault();
            $('#medicine_weight').addClass('error');
        }
        else{
            $('#medicine_weight').removeClass('error');
        }
        var a =$(".validate").map(function(){
            return $(this).val().trim() ? true : false
        }).get();
        if(a.includes(true)){
            console.log('pass')
            $("#img_text").removeClass('error');
        }
        else{
            e.preventDefault();
            $("#img_text").addClass('error');
        }
    });
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
});
