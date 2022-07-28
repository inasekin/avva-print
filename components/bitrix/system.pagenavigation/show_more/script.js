$(document).ready(function(){

    $(document).on('click', '.btn-more', function(){

        var targetContainer = $('.catalog-top .catalog__listing'),          //  Контейнер, в котором хранятся элементы
            url =  $('.btn-more').attr('data-url');    //  URL, из которого будем брать элементы

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){

                    //  Удаляем старую навигацию
                    $('.btn-more').remove();

                    var elements = $(data).find('.catalog__listing--product'),  //  Ищем элементы
                        pagination = $(data).find('.btn-more');//  Ищем навигацию

                    targetContainer.append(elements);   //  Добавляем посты в конец контейнера
                    $('.catalog-top').append(pagination); //  добавляем навигацию следом

                }
            })
        }

    });

});
