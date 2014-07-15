function divClicked() {
    var divHtml = $(this).html();
    var editableText = $("<textarea />");
    var originalHeight = $(this).height()
    
    editableText.val(divHtml);
    $(this).replaceWith(editableText);
    editableText.focus();
    // setup the blur event for this new textarea
    editableText.blur(editableTextBlurred);
    editableText.height(originalHeight);

}

function editableTextBlurred() {
    var html = $(this).val();
    var viewableText = $("<div id='CV'>");
    viewableText.html(html);
    $(this).replaceWith(viewableText);
    // setup the click event for this new div
    viewableText.click(divClicked);
}

$(document).ready(function() {
    $("#CV").click(divClicked);
});