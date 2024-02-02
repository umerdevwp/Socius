(function () {
    tinymce.PluginManager.add('sm_mce_dropbutton', function (editor, url) {
        var form_menu_items = [];
        var form_shortcodes = '';
        var form_item_object = '';

        form_shortcodes = JSON.parse(form_shortcode_object);
        
        if( !$.isEmptyObject(form_shortcodes) ) {
            window.form_shortcodes = form_shortcodes;
            for (var property in form_shortcodes) {
                if (form_shortcodes.hasOwnProperty(property)) {
                    var newProp = property;
                    form_menu_items.push({
                        text: form_shortcodes[property],
                        property: newProp,
                        onclick: function () {
                            var index = $(this.$el).index(),
                                    shortcodes = Object.keys(window.form_shortcodes),
                                    shortcode = shortcodes[index];
                            
                            editor.insertContent('[' + shortcode + ']');
                        }
                    });
                }
            }
            
            form_item_object = {
                icon: 'sm-mce-forms',
                text: 'Forms',
                menu: form_menu_items
            };
        }
        
        create_custom_dropdown(editor, form_item_object);
    });
    
    function create_custom_dropdown(editor, form_item_object) {
        editor.addButton('sm_mce_dropbutton', {
            text: 'Design Elements',
            // icon: 'sm-mce-dropdown',
            type: 'menubutton',
            classes: 'sm-mce-dropdown',
            menu: [
                {
                    icon: 'sm-mce-columns',
                    text: 'Columns',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert Columns',
                            classes: 'columns-popup',
                            width: 500,
                            height: 250,
                            body: [{
                                type: 'listbox',
                                icon: 'sm-mce-phone',
                                name: 'xs',
                                label: 'Phone Portrait (col)',
                                margin: '0 0 50 0',
                                value: 'col-12',
                                values: [{
                                    text: 'Full Width',
                                    value: 'col-12'
                                },{
                                    text: '2 Columns',
                                    value: 'col-6'
                                }, {
                                    text: '3 Columns',
                                    value: 'col-4'
                                }, {
                                    text: '4 Columns',
                                    value: 'col-3'
                                }, {
                                    text: '6 Columns',
                                    value: 'col-2'
                                }]
                            },{
                                type: 'listbox',
                                name: 'sm',
                                icon: 'sm-mce-phone-sideways',
                                label: 'Phone Landscape (col-sm)',
                                value: 'col-sm-12',
                                values: [{
                                    text: 'Full Width',
                                    value: 'col-sm-12'
                                },{
                                    text: '2 Columns',
                                    value: 'col-sm-6'
                                }, {
                                    text: '3 Columns',
                                    value: 'col-sm-4'
                                }, {
                                    text: '4 Columns',
                                    value: 'col-sm-3'
                                }, {
                                    text: '6 Columns',
                                    value: 'col-sm-2'
                                }]
                            },{
                                type: 'listbox',
                                name: 'md',
                                icon: 'sm-mce-tablet',
                                label: 'Tablet Portrait (col-md)',
                                value: 'col-md-12',
                                values: [{
                                    text: 'Full Width',
                                    value: 'col-md-12'
                                },{
                                    text: '2 Columns',
                                    value: 'col-md-6'
                                }, {
                                    text: '3 Columns',
                                    value: 'col-md-4'
                                }, {
                                    text: '4 Columns',
                                    value: 'col-md-3'
                                }, {
                                    text: '6 Columns',
                                    value: 'col-md-2'
                                }]
                            }, {
                                type: 'listbox',
                                name: 'lg',
                                icon: 'sm-mce-tablet-sideways',
                                label: 'Tablet Landscape (col-lg)',
                                value: 'col-lg-6',
                                values: [{
                                    text: 'Full Width',
                                    value: 'col-lg-12'
                                },{
                                    text: '2 Columns',
                                    value: 'col-lg-6'
                                }, {
                                    text: '3 Columns',
                                    value: 'col-lg-4'
                                }, {
                                    text: '4 Columns',
                                    value: 'col-lg-3'
                                }, {
                                    text: '6 Columns',
                                    value: 'col-lg-2'
                                }]
                            },{
                                type: 'listbox',
                                name: 'xl',
                                icon: 'sm-mce-laptop',
                                label: 'Small Desktop (col-xl)',
                                value: 'col-xl-6',
                                values: [{
                                    text: 'Full Width',
                                    value: 'col-xl-12'
                                },{
                                    text: '2 Columns',
                                    value: 'col-xl-6',
                                }, {
                                    text: '3 Columns',
                                    value: 'col-xl-4'
                                }, {
                                    text: '4 Columns',
                                    value: 'col-xl-3'
                                }, {
                                    text: '6 Columns',
                                    value: 'col-xl-2'
                                }]
                            }],
                            onsubmit: function (e) {
                                function numberOfColumns(checkThis) {
                                    if( e.data.xs == 'col-' + checkThis || e.data.sm == 'col-sm-' + checkThis || e.data.md == 'col-md-' + checkThis || e.data.lg == 'col-lg-' + checkThis || e.data.xl == 'col-xl-' + checkThis ) {
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
                                var selectedContent = '<br />';
                                if( editor.selection.getContent() ) {
                                    selectedContent = editor.selection.getContent();
                                }
                                var additionalColumns = '';
                                var additionalColumnHTML = '[column class="' + e.data.xs + ' ' + e.data.sm + ' ' + e.data.md + ' ' + e.data.lg + ' ' + e.data.xl + '"]<br /><br />' +
                                    '[/column]<br />' ;
                            if( numberOfColumns( '2' ) ) {
                                    additionalColumns += additionalColumnHTML + additionalColumnHTML + additionalColumnHTML + additionalColumnHTML;
                                }else if( numberOfColumns( '3' ) ) {
                                    additionalColumns += additionalColumnHTML + additionalColumnHTML + additionalColumnHTML;
                                }else if( numberOfColumns( '4' ) ) {
                                    additionalColumns += additionalColumnHTML + additionalColumnHTML;
                                }else if( numberOfColumns( '6' ) ) {
                                    additionalColumns += additionalColumnHTML;
                                }
                                editor.insertContent(
                                    '[row]<br />' +
                                        '[column class="' + e.data.xs + ' ' + e.data.sm + ' ' + e.data.md + ' ' + e.data.lg + ' ' + e.data.xl + '"]<br />' +
                                            selectedContent +
                                        '[/column]<br />' + additionalColumns +
                                    '[/row]'
                                );
                            }
                        });
                    }
                },
                {
                    icon: 'sm-mce-accordion',
                    text: 'Accordion',
                    onclick: function () {
                        editor.insertContent('' +
                            '[accordion class="yourcustomclass"]<br />' +
                            '[toggle title="Toggle 1 Title" show="show"]<br />' +
                            'Toggle 1 Content<br />' +
                            '[/toggle]<br />' +
                            '[toggle title="Toggle 2 Title"]<br />' +
                            'Toggle 2 Content<br />' +
                            '[/toggle]<br />' +
                            '[toggle title="Toggle 3 Title"]<br />' +
                            'Toggle 3 Content<br />' +
                            '[/toggle]<br />' +
                            '[/accordion]');
                    }
                },
                {
                    icon: 'sm-mce-tabs',
                    text: 'Tabs',
                    onclick: function () {
                        editor.insertContent(''+
                        '[tabs class="yourcustomclass"]<br />'+
                            '[tab title="Tab 1 Title" active="active"]<br />'+
                            'Tab 1 Content<br />'+
                            '[/tab]<br />'+
                            '[tab title="Tab 2 Title"]<br />'+
                            'Tab 2 Content<br />'+
                            '[/tab]<br />'+
                            '[tab title="Tab 3 Title"]<br />'+
                            'Tab 3 Content<br />'+
                            '[/tab]<br />'+
                        '[/tabs]');
                    }
                },
                {
                    icon: 'sm-mce-cards',
                    text: 'Card Layout',
                    onclick: function () {
                        editor.insertContent('' +
                            '[card-deck class="card-deck-md"]<br/>' +
                            '[card]<br/>' +
                            '**Images can go here**<br/>' +
                            '[body]<br/>'+
                            'card 1 Content<br/>' +
                            '[/body]<br/>' +
                            '[footer]<br/>' +
                            '<a href="#" class="btn btn-primary">Learn More</a><br/>' +
                            '[/footer]<br/>' +
                            '[/card]<br/>' +
                            '[card]<br/>' +
                            '**Images can go here**<br/>' +
                            '[body]<br/>'+
                            'card 2 Content<br/>' +
                            '[/body]<br/>' +
                            '[footer]<br/>' +
                            '<a href="#" class="btn btn-primary">Learn More</a><br/>' +
                            '[/footer]<br/>' +
                            '[/card]<br/>' +
                            '[card]<br/>' +
                            '**Images can go here**<br/>' +
                            '[body]<br/>'+
                            'card 3 Content<br/>' +
                            '[/body]<br/>' +
                            '[footer]<br/>' +
                            '<a href="#" class="btn btn-primary">Learn More</a><br/>' +
                            '[/footer]<br/>' +
                            '[/card]<br/>' +
                            '[/card-deck]');
                    }
                },
                form_item_object,
                {
                    icon: 'sm-mce-style',
                    text: 'Style Selection',
                    classes: 'second-dropdown',
                    menu: [
                        {
                            icon: 'sm-mce-button',
                            text: 'Default Button',
                            onclick: function () {
                                editor.focus();
                                if( editor.selection.getNode().nodeName == 'A' ) {
                                    var currentClasses = editor.selection.getNode().getAttribute('class');
                                    if( currentClasses.includes('btn-secondary') ) {
                                        editor.dom.removeClass(editor.selection.getNode(), 'btn-secondary');
                                        editor.dom.addClass(editor.selection.getNode(), 'btn-primary');
                                    }
                                }else{
                                    editor.selection.setContent('<a href="#" class="btn btn-primary">' + editor.selection.getContent() + '</a> ');
                                }
                            }
                        },
                        {
                            icon: 'sm-mce-button',
                            text: 'Secondary Button',
                            onclick: function () {
                                editor.focus();
                                if( editor.selection.getNode().nodeName == 'A' ) {
                                    var currentClasses = editor.selection.getNode().getAttribute('class');
                                    if( currentClasses.includes('btn-primary') ) {
                                        editor.dom.removeClass(editor.selection.getNode(), 'btn-primary');
                                        editor.dom.addClass(editor.selection.getNode(), 'btn-secondary');
                                    }
                                }else{
                                    editor.selection.setContent('<a href="#" class="btn btn-secondary">' + editor.selection.getContent() + '</a> ');
                                }
                            }
                        },
                    ]
                },
            ]
        });
    }
    
})();