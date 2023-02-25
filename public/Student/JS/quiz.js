$(document).ready(function() {
$('.answer').on('keyup',function () {
    let value=$(this).val();
    // console.log(value);
    let radio=$(this).prev('#answer');
    radio.val(value)
})
})

