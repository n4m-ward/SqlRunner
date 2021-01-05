$(function() {
    var queryForm = document.getElementById('queryInput');
    var query = localStorage.getItem("queryOnLocalStorage") ? localStorage.getItem("queryOnLocalStorage") : '';
    ace.require("ace/ext/language_tools");

    $('textarea[data-editor]').each(function() {
        var textarea = $(this);
        textarea.css('display', 'none');
        var editor = ace.edit("aceEditor");
        editor.renderer.setShowGutter(textarea.data('gutter'));
        editor.getSession().setValue(query);
        editor.getSession().setMode("ace/mode/sql");
        editor.setTheme("ace/theme/dracula");
        editor.setShowPrintMargin(false);
        editor.setOptions({
            fontSize: "14pt",
            enableBasicAutocompletion: true,
            enableSnippets: true,
            enableLiveAutocompletion: true
        });

        textarea.closest('form').submit(function() {
            textarea.val(editor.getSession().getValue());
        })
    });
});
var editor = ace.edit("aceEditor");
function setLocalStorage(){
        localStorage.setItem("queryOnLocalStorage", editor.getValue());
        
}