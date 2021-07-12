$("#print_js").click(function(e) {
    var t = $("#print-title").text();
    $(".printable").print({
        globalStyles: true,
        mediaPrint: true,
        stylesheet: null,
        noPrintSelector: ".no-print",
        iframe: true,
        append: null,
        prepend: null,
        manuallyCopyFormValues: true,
        deferred: $.Deferred(),
        timeout: 7500,
        title: t,
        doctype: '<!doctype html>'
    });
});

$("#plc-offset").change(function(e) {
    $("#table-signature").css("margin-top", $(this).val() + "px")
});