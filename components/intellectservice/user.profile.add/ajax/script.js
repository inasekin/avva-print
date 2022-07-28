//var app=app||{};$(document).ready(function(){$(".vtip").tipTip({defaultPosition:"right",maxWidth:"340px",delay:100}),$(".profile-info input[type=radio]").change(function(){var i=$(this).data("url");$.ajax({url:i,method:"get"}).done(function(i){var t=$(i).find(".profile-input-block").children(),p=$(".profile-input-block");p.children().remove(),p.append(t),$(".vtip").tipTip({defaultPosition:"right",maxWidth:"340px",delay:100})})})});


var app = app || {};
$(document).ready(function () {
    $(".vtip").tipTip({ defaultPosition: "right", maxWidth: "340px", delay: 100 }),
        $(".profile-info input[type=radio]").change(function () {
            var i = $(this).data("url");
            $.ajax({ url: i, method: "get" }).done(function (i) {
                var t = $(i).find(".profile-input-block").children(),
                    p = $(".profile-input-block");
                p.children().remove(), p.append(t), $(".vtip").tipTip({ defaultPosition: "right", maxWidth: "340px", delay: 100 });
                var ob = BX.processHTML(i);
                BX.ajax.processScripts(ob.SCRIPT);
            });

        });

    $('.profile_add_btn').click(function(e){
        var form = $('form.profile_add_form');
        var url = "/local/ajax/addUserProfile.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            dataType: 'json',
            success: function(result){
                console.log(result);
                $('.msg-header').html(result.message);
                $(".msg-header").addClass(result.MSG_PROFILE_TYPE);
                if(result.status=='success'){
                    $(".profile_add_form").addClass('bx-d-none');
                    setTimeout(function(){
                        var site   = window.location.origin;
                        console.log(site+'/personal/profiles/');
                        window.location.href = site+'/personal/profiles/';
                    }, 1000);
                }
                if(result.status == 'error'){
                    $('.requare-input input').each(function(){
                        if($(this).val()=='') {
                            $(this).addClass('hasError');
                        } else {
                            $(this).removeClass('hasError');
                        }
                    });
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
        e.preventDefault();
        return false;
    });
});
