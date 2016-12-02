var md = window.markdownit();

var fill = function (dir, files, id, name) {
    $('#menu').append('<strong>' + name + ':</strong><div id="menu_' + id + '"></div><hr>');
    $('#content').append('<h2 style="margin-top: 60px">' + name + ':</h2><div id="content_' + id + '"></div>');

    var $menu = $('#menu').find('#menu_' + id);
    var $content = $('#content').find('#content_' + id);

    for (var i in files) {
        var url = dir + files[i] + '.md';

        loadContent(url, id + '_' + files[i], $menu, $content);
    }
};

var loadContent = function (url, containerId, $menu, $content) {
    $menu.append('<a href="#' + containerId + '" id="menu_' + containerId + '"></a><br>');
    $content.append('<div id="' + containerId + '" class="section"></div>');

    $.get(url, function(data) {
        var i = data.indexOf('===') - 1;
        var name = data.substr(0, i);
        var html = md.render(data);
        console.log(containerId, name);

        $menu.find('#menu_' + containerId).html(name);
        $content.find('#' + containerId).html(html);
    });
};
