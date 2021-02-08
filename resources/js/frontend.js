$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.cart-table').on('blur', '.cart-quantity', function (e) {
    var id = $(e.currentTarget).closest('tr').data('id');
    var quantity = $(e.currentTarget).val();
    var action = '/carts/update/' + id;
    if (quantity > 0) {
        $.post(action, { quantity: quantity, })
            .done(function (data) {
                window.location.reload();
            });
    }
});