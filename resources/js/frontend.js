$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.cart-table').on('blur', '.cart-quantity', function (e) {
    let id = $(e.currentTarget).closest('tr').data('id');
    let quantity = $(e.currentTarget).val();
    let skuId = $(e.currentTarget).closest('tr').data('skuid');
    let action = '/carts/update/' + id + '/' + skuId;
    if (quantity > 0) {
        $.post(action, { quantity: quantity, })
            .done(function (data) {
                window.location.reload();
            });
    }
});

$('.addToCart').on('click', function (e) {
    let quantity = $('#demo0').val();
    let spec = $('.spec').find(':selected').data('id');
    let id = $(e.currentTarget).data('id');
    let action = '/carts/add-quantity/' + id;
    $.post(action, { quantity: quantity, spec: spec })
        .done(function (data) {
            window.location.reload();
        });
});