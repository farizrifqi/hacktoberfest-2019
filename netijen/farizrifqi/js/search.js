function fill(Value) {
    $('#search').val(Value);
    $('#display').hide();

}
$(document).ready(function() {
	$('#switchService').click(function(){
        wowId = $(this).data('info');
alert(wowId);
					$.ajax({
            type: 'POST',
            url: './lib/functions/request.php',
            data: {
                switchService: true,
                sId: wowIds
            },
            dataType: 'json',
            success: function(data) {
                if (data['success'] == '1') {

                    		$('#suksesSwitch').fadeIn('slow', function() {
                        $('#suksesSwitch').delay(2500).fadeOut();
                    });
                } else {
                    $('#gagalSave').fadeIn('slow', function() {
                        $('#gagalSave').delay(2500).fadeOut();
                    });
                }
            }
        });
	});
    $('#saveService').click(function(e) {
        wowId = $(this).data('info');
        $.ajax({
            type: 'POST',
            url: './lib/functions/request.php',
            data: {
                saveService: true,
                sId: wowId,
                des: $('#deskripsi').val(),
                nama_layanan: $('input[name=nama_layanan]').val(),
                harga: $('input[name=harga]').val(),
                provider: $('#provider option:selected').val()
            },
            dataType: 'json',
            success: function(data) {
                if (data['success'] == '1') {

                    $('#suksesSave').fadeIn('slow', function() {
                        $('#suksesSave').delay(2500).fadeOut();
                    });
                } else {
                    $('#gagalSave').fadeIn('slow', function() {
                        $('#gagalSave').delay(2500).fadeOut();
                    });
                }
            }
        });
    });
    $('#editLayanan').on('show.bs.modal', function(e) {
        var sId = $(e.relatedTarget).data('id');
        var regex = /<br\s*[\/]?>/gi;

        $.ajax({
            type: 'POST',
            url: './lib/functions/request.php',
            data: {
                id: sId
            },
            dataType: 'json',
            success: function(data) {
                $('.modal-title').html('Edit layanan: ' + data['id']);
                $('input[name=id]').val(data['id']);
                $('input[name=nama_layanan]').val(data['nama_layanan']);
                $('input[name=harga]').val(data['harga']);
                $('textarea[name=deskripsi]').val(data['deskripsi'].replace(regex, ''));
                $('#provider').val(data['provider']);
                $('#saveService').attr('data-info', data['id']);

            }
        });
    });
    $("#tambah").click(function(e) {
        $("#baru").slideToggle();
        $(this).toggleClass("btn-light");
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
                url: "./lib/functions/search.php",
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