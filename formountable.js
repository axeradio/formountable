function loadItem(el, id)
{
    $(el).parent().addClass('loading');
    form = $('<table />');
    $('#form').slideUp('fast', function()
    {
        $.getJSON('engine/blimey.php?item=' + id, function(data)
        {
            $.each(data, function(key, value)
            {
                $('<tr />')
                    .append($('<th />').html(value.name))
                    .append($('<td />').html(value.value))
                    .appendTo(form);
            });
            $('#form').html(form);
            $('#form').slideDown('fast');
            $(el).parent().removeClass('loading');
        });
    });
}

function listItems(el, id)
{
    $(el).parent().addClass('loading');
    $('#form-' + id + ' ul').slideUp('normal', function()
    {
        $('#form-' + id + ' ul').html('');
        $.getJSON('engine/blimey.php?items&form=' + id, function(data)
        {
            $.each(data, function(key, value)
            {
                $('#form-' + id + ' ul').append(
                    $('<li> />')
                        .attr('id', 'item-' + value.id)
                        .html(
                            $('<a />')
                                .attr('href', '#item-' + value.id)
                                .html(value.name + ' <span class="date">' + value.created_at + '</span>')
                                .click(function()
                                {
                                    loadItem(this, value.id);
                                })));
            });
            $('#form-' + id + ' ul').slideDown('normal');
            $(el).parent().removeClass('loading');
        });
    });
}

$(document).ready(function()
{
    $.getJSON('engine/blimey.php?forms', function(data)
    {
        $.each(data, function(key, value)
        {
            $('<li />')
                .attr('id', 'form-' + value.id)
                .append($('<a />')
                    .attr('href', '#form-' + value.id)
                    .html(value.name)
                    .click(function()
                    {
                        listItems(this, value.id);
                    }))
                .append($('<ul />'))
                .appendTo('#forms');
        });
    });
});
