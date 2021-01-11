var $collectionHolder;

var $addNewItem = $('<a href="#" class="btn btn-info">Add Accessory</a>');

$(document).ready(function() {
    //get the collection holder
    $collectionHolder = $('#accessories_list');

    //append the add new item to the collectionHolder
    $collectionHolder.append($addNewItem);

    $collectionHolder.data('index', $collectionHolder.find('.panel').length);

    //add remove button
    $collectionHolder.find('.panel').each(function() {
        addRemoveButton($(this));
    });

    //handle the click event for addNewItem
    $addNewItem.click(function(e) {
        e.preventDefault();
        //create a new form and append it to the collectionHolder
        addNewForm();
    })
});

function addNewForm() {
    //getting the prototype
    var prototype = $collectionHolder.data('prototype');

    //get the index
    var index = $collectionHolder.data('index');

    //create the form
    var newForm = prototype;
    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index+1);

    //create the panel
    $panel = $('<div class="panel panel-warning"><div class="panel-heading"></div></div>');

    //create the panel body and append the form to it
    var $panelBody = $('<div class="panel-body"></div>').append(newForm);

    //append the body to the panel
    $panel.append($panelBody);

    //append removeButton to the new panel
    addRemoveButton($panel);

    //append the panel to the addNewItem
    $addNewItem.before($panel);
}


function addRemoveButton($panel) {
    //create remove button
    var $removeButton = $('<a href="#" class="btn btn-danger btn-sm">Remove</a>');

    //appending the remove button to panel footer
    var $panelFooter = $('<div class="panel-footer"></div>').append($removeButton);

    //handle the click event of the remove button
    $removeButton.click(function(e) {
        e.preventDefault();
        $(e.target).parents('.panel').slideUp(1000, function() {
            $(this).remove();
        });
    });

    //append the footer to the panel
    $panel.append($panelFooter);
}
