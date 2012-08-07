function loadItem(id)
{
    $.getJSON('engine/blimey.php?item=' + id, function(data)
    {
        form = $('<table />');
        $.each(data, function(key, value)
        {
            $('<tr />')
                .append($('<th />').html(value.name))
                .append($('<td />').html(value.value))
                .appendTo(form);
        });
        $('#form').html(form);
    });
}

function listItems(id)
{
    $.getJSON('engine/blimey.php?items&form=' + id, function(data)
    {
        $('#form-' + id + ' ul').html('');
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
                                loadItem(value.id);
                            })));
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
                        listItems(value.id);
                    }))
                .append($('<ul />'))
                .appendTo('#forms');
        });
    });
});