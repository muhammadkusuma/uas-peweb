
        $(document).ready(function() {
            $('#tombol-cari').hide();

            $('#keyword').on('keyup', function() {
                $('.loader').show();
                // $('#container').load('../ajax/ajax_cari.php?keyword=' + $('#keyword').val());
                $.get('../dashboard/cari.php?keyword=' + $('#keyword').val(), function(data) {
                    $('#container').html(data);
                    $('.loader').hide();
                });
            });

        });