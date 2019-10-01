function fill(Value) {
    $('#search').val(Value);
    $('#display').hide();

}
$(document).ready(function() {
    const formatters = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    })

    $('#detailLayanan').on('show.bs.modal', function(e) {
        var sId = $(e.relatedTarget).data('id');
        $.ajax({
            type: 'POST',
            url: './lib/functions/request.php',
            data: {
                id: sId
				},
            dataType: 'json',
            success: function(data) {
                $('.fetched-deskripsi').html('<p>' + data['deskripsi'] + '</p>');
                $('.fetched-provider').html('<h5>[' + data['provider'].toUpperCase() + ']</h5>');
                $('.fetched-harga').html('<b>Harga: ' + formatters.format(data['harga']) + '</b>');
                $('.modal-title').html(data['nama_layanan']);
            }
        });
    });
    $("#tambah").click(function() {
        $("#baru").slideToggle();
    });
    $("#aktif-layanan").click(function() {
        $("#x").hide();
    });
    $("#search").keyup(function() {
        var name = $('#search').val();
        if (name == "") {
            $("#display").html("");
            $('#show').show();
        } else {
            $('#show').hide();
            $.ajax({
                type: "POST",
                url: "./lib/functions/ajax.php",
                data: {
                    search: name
                },
                success: function(html) {
                    $("#display").html(html).show();
                }
            });
        }
    });
});