$(document).ready(function(){
    /// dasar sektor
    $('#header').css('text-align','center');  // mengubah align teks
    $('li').css('margin','5px');
 
    // sektor atribut
    $('img[alt="alumni1"]').css('border','2px solid red');
 
    // sektor hirarki
    $('#alumniList li').css('font-size','18px');
 
    // sektor filter
    $('li:even').css('color','blue');
    $('.featured').addClass('highlight');
 
    // event handling
    $('.gallery img').on('click', function(){
        var src = $(this).attr('src');
        $('#modalImage').attr('src', src);  // set src pada modal image
        $('#myModal').fadeIn();  // menampilkan modal
    });

    // menutup modal saat tombol close diklik
    $('.modal .close').on('click', function(){
        $('#myModal').fadeOut();  // menyembunyikan modal
    });

    // menutup modal saat area luar modal diklik
    $(window).on('click', function(event){
        if ($(event.target).is('#myModal')) {
            $('#myModal').fadeOut();  // menyembunyikan modal
        }
    });
});
