(function() {
    tinymce.create("tinymce.plugins.tabs_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button
            ed.addButton("tabs", {
                title : "Ajouter un onglet",
                cmd : "tabs_command",
                image : "https://cdn2.iconfinder.com/data/icons/function_icon_set/tabs_48.png"
            });

            //button functionality.
            ed.addCommand("tabs_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = '[onglet titre="Entrer_le_titre_ici"]' + selected_text + "[/onglet]";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Tabs Button",
                author : "Jordan Beziau",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("tabs_button_plugin", tinymce.plugins.tabs_button_plugin);
})();
