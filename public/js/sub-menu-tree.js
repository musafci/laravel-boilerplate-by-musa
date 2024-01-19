$(function() {
// this will get the full URL at the address bar
    var url = window.location.href;
// passes on every "a" tag
    $(".treeview-menu a").each(function () {
        if (url == (this.href)) {
            $(this).addClass("active");
            $(this).parents().find(".treeview-menu").css("display", "block");
        }
    });

    $(".treeview-menu-profile a").each(function () {
        if (url == (this.href)) {
            $(this).addClass("active");
            $(this).parents().find(".treeview-menu-profile").css("display", "block");
        }
    });
});
