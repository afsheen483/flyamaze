function showDefaultModal(clickevent) {
    var dataId = $(clickevent).attr("data-id");
    var url = $('#assign').attr("data-request-url");
    url = url.replace("-1", dataId);
    $.get(url, function (data) {
        $("#assign").html(data);
        $("#assign").modal('show');
    }).fail(function () { alert("Error!") });
}
function showResponseStatusModal(clickevent) {
    var dataId = $(clickevent).attr("data-id");
    var url = $('#response').attr("data-request-url");
    url = url.replace("-1", dataId);
    $.get(url, function (data) {
        $("#response").html(data);
        $("#response").modal('show');
    }).fail(function () { alert("Error!") });
}
function changeStatus(clickevent) {
    var dataId = $(clickevent).attr("data-id");
    var url = $(clickevent).attr("data-request-url");
    url = url.replace("-1", dataId);
    $.ajax({
        url: url,
        dataType: 'Json',
        type: 'POST',
        success: function (data) {
            location.reload();
        },
        error: function (err) {
            alert(error.arguments);
        }
    });
}
// function UpdateVisaSalePrice() {
//     var psf = parseFloat(document.getElementById('VisaPSF').value) / 100;
//     var amount = parseFloat(document.getElementById('VisaAmount').value);
//     document.getElementById('VisaSalePrice').value = parseFloat(amount + (amount * psf));
// };
// function UpdateTransportSalePrice() {
//     var psf = parseFloat(document.getElementById('TransportPSF').value) / 100;
//     var rate = parseFloat(document.getElementById('TransportRatePerHour').value);
//     var days = parseInt(document.getElementById('TransportDays').value);
//     document.getElementById('TransportSalePrice').value = (rate + (rate * psf)) * days;
// };
// function showMultiAssign(clickevent) {
//     var dataId = $(clickevent).attr("data-id");
//     var url = $('#multiAssign').attr("data-request-url");
//     url = url.replace("-1", dataId);
//     $.get(url, function (data) {
//         $("#multiAssign").html(data);
//         $("#multiAssign").modal('show');
//     }).fail(function () { alert("Error!") });
// };
function reindex() {
    $('.tblProducts').each(function (index1, index2, index3) {
        index1 = 0;
        index2 = 0;
        index3 = 0;

        $(this).find(".txtname").each(function () {
            var prefixName = "Products[" + index1 + "].ProductId";
            this.name = this.name.replace(/Products\[\d+\].ProductId/, prefixName);
            index1++;
        });
        $(this).find(".txtquantity").each(function () {
            var prefixQuantity = "Products[" + index2 + "].Quantity";
            this.name = this.name.replace(/Products\[\d+\].Quantity/, prefixQuantity);
            index2++;
        });
        $(this).find(".txtrate").each(function () {
            var prefixRate = "Products[" + index3 + "].Rate";
            this.name = this.name.replace(/Products\[\d+\].Rate/, prefixRate);
            index3++;
        });
    });
};

// $('#importBtn').click(function () {
//     $('#uploadCSV').trigger('click');
// });
// $('#uploadCSV').change(function () {
//     var fileUpload = $("#uploadCSV").get(0);
//     var files = fileUpload.files;
//     var fileData = new FormData();
//     for (var i = 0; i < files.length; i++) {
//         fileData.append(files[i].name, files[i]);
//     }

//     $.ajax({
//         url: '/PhoneBook/ImportContacts',
//         dataType: 'Json',
//         contentType: false,
//         processData: false,
//         data: fileData,
//         type: 'POST',
//         success: function (data) {
//             location.reload();
//         },
//         error: function (err) {
//             alert(err.arguments);
//         }
//     });
// });
$('#Visa').change(function () {
    var dataId = $('#Visa option:selected').val();
    if (!dataId == "") {
        $.ajax({
            url: '/Lead/GetVisaAmount/' + dataId,
            dataType: 'Json',
            type: 'GET',
            success: function (data) {
                document.getElementById('VisaAmount').value = data.Amount;
                UpdateVisaSalePrice();
            },
            error: function (err) {
                alert(err.arguments);
            }
        });
    }
    else {
        document.getElementById('VisaAmount').value = 0;
        UpdateVisaSalePrice();
    }
    
});
$('#VisaPSF').blur(function () {
    UpdateVisaSalePrice();
});
$('#Transport').change(function () {
    var dataId = $('#Transport option:selected').val();
    if (!dataId == "") {
        $.ajax({
            url: '/Lead/GetTransportAmount/' + dataId,
            dataType: 'Json',
            type: 'GET',
            success: function (data) {
                document.getElementById('TransportRatePerHour').value = data.RatePerHour;
                UpdateTransportSalePrice();
            },
            error: function (err) {
                alert(err.arguments);
            }
        });
    }
    else {
        document.getElementById('TransportRatePerHour').value = 0;
        UpdateTransportSalePrice();
    }
});
$('#TransportPSF').blur(function () {
    UpdateTransportSalePrice();
});
$('#TransportDays').blur(function () {
    UpdateTransportSalePrice();
});
$('#addRow').on('click', function () {
    var t = $('.tblProducts');
    var index = $('#index').val();
    var result = AddToCartValidator();

    if (result) {
        t.append("<tr> <td><input type='hidden' class='txtname' name='Products[" + $('#index').val() + "].ProductId' value='" + $('#ProductId').val() + "' />" + $('#ProductId option:selected').text() + "</td>" +
            " <td><input type='hidden' class='txtquantity' name='Products[" + $('#index').val() + "].Quantity' value='" + $('#Quantity').val() + "'/>" + $('#Quantity').val() + "</td>" +
            " <td><input type='hidden' class='txtrate' name='Products[" + $('#index').val() + "].Rate' value='" + $('#Rate').val() + "'/>" + $('#Rate').val() + "</td>" +
            " <td><button type='button' class='btn btn-air-warning btn-sm' style = 'border-radius : 30px''>DELETE</button></td></tr>");

        index = parseInt(index) + 1;
        $('#index').val(index);
        reindex();
    }
});
$(document).on('click', 'button.btn-air-warning', function () {
    $(this).closest('tr').remove();
    reindex();
    return false;
});

!function ($) {
    "use strict";

    var MainApp = function () {
        this.$body = $("body"),
            this.$wrapper = $("#wrapper"),
            this.$btnFullScreen = $("#btn-fullscreen"),
            this.$leftMenuButton = $('.button-menu-mobile'),
            this.$menuItem = $('.has_sub > a')
    };

    MainApp.prototype.intSlimscrollmenu = function () {
        $('.slimscroll-menu').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    },
        MainApp.prototype.initSlimscroll = function () {
            $('.slimscroll').slimscroll({
                height: 'auto',
                position: 'right',
                size: "7px",
                color: '#9ea5ab',
                touchScrollStep: 50
            });
        },

        MainApp.prototype.initMetisMenu = function () {
            //metis menu
            $("#side-menu").metisMenu();
        },

        MainApp.prototype.initLeftMenuCollapse = function () {
            // Left menu collapse
            $('.button-menu-mobile').on('click', function (event) {
                event.preventDefault();
                $("body").toggleClass("enlarged");
            });
        },

        MainApp.prototype.initEnlarge = function () {
            if ($(window).width() < 1025) {
                $('body').addClass('enlarged');
            } else {
                if ($('body').data('keep-enlarged') != true)
                    $('body').removeClass('enlarged');
            }
        },

        MainApp.prototype.initActiveMenu = function () {
            // === following js will activate the menu in left side bar based on url ====
            $("#sidebar-menu a").each(function () {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (this.href == pageUrl) {
                    $(this).addClass("mm-active");
                    $(this).parent().addClass("mm-active"); // add active to li of the current link
                    $(this).parent().parent().addClass("mm-show");
                    $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
                    $(this).parent().parent().parent().addClass("mm-active");
                    $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                    $(this).parent().parent().parent().parent().parent().addClass("mm-active");
                }
            });
        },

        MainApp.prototype.initComponents = function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        },

        //full screen
        MainApp.prototype.initFullScreen = function () {
            var $this = this;
            $this.$btnFullScreen.on("click", function (e) {
                e.preventDefault();

                if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        },



        MainApp.prototype.init = function () {
            this.intSlimscrollmenu();
            this.initSlimscroll();
            this.initMetisMenu();
            this.initLeftMenuCollapse();
            this.initEnlarge();
            this.initActiveMenu();
            this.initComponents();
            this.initFullScreen();
            Waves.init();
        },

        //init
        $.MainApp = new MainApp, $.MainApp.Constructor = MainApp
}(window.jQuery),
    //initializing
    function ($) {
        "use strict";
        $.MainApp.init();
    }(window.jQuery);

//$('#createBtn').click(function () {
//    location.href = 'Create';
//});
//$('#editBtn').click(function () {
//    var dataId = $(this).attr("data-id");
//    location.href = 'Edit/' + dataId;
//});

