Stripe.setPublishableKey('pk_test_51Gu7CJEmfXiqppLehVPr3uz3zAv2zlDBlK0ftDeNprZHq0B8heRNI2T23NoBh3jESoR1IYvNN0vks2XagAZ2StlD00jURjVsqZ');

var $form = $('#form_checkout');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        number:$('#card_number').val(),
        cvc:$('#card_cvc').val(),
        exp_month:$('#card_expiry_mont').val(),
        exp_year:$('#card_expiry_year').val(),
        name:$('#card_name').val()
    },stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status,response){
    if(response.error){
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
    }else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));       
        $form.get(0).submit();
    }
}