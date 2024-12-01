$(document).ready(function() {
    // 1. Efek fade-in pada gambar saat halaman dimuat
    $('.gallery-item').each(function(index) {
        $(this).delay(index * 300).fadeTo(1000, 1); // Memberikan delay untuk efek fade-in
    });

    // 2. Ketika gambar diklik, tampilkan gambar di modal
    $('.gallery-item').click(function() {
        var imageSrc = $(this).attr('src'); // Ambil URL gambar yang diklik
        $('#modalImage').attr('src', imageSrc); // Set gambar modal dengan gambar yang diklik
        $('#imageModal').fadeIn(); // Tampilkan modal
    });

    // 3. Menutup modal dengan tombol close
    $('.close').click(function() {
        $('#imageModal').fadeOut(); // Sembunyikan modal
    });

    // 4. Menutup modal dengan mengklik area di luar gambar
    $(window).click(function(event) {
        if ($(event.target).is('#imageModal')) {
            $('#imageModal').fadeOut(); // Sembunyikan modal jika klik area luar gambar
        }
    });
});
