(function ($, Drupal, drupalSettings) {

  var cache_shortcode = [];

  $.fn.outerHTML = function() {
    return $('<div />').append(this.eq(0).clone()).html();
  };

  orig_allowInteraction = $.ui.dialog.prototype._allowInteraction;
  $.ui.dialog.prototype._allowInteraction = function(event) {
    if ($(event.target).closest('.cke_dialog').length) {
      return true;
    }
    return orig_allowInteraction.apply(this, arguments);
  };

  $.fn.removeClassPrefix = function(prefix) {
      this.each(function(i, el) {
          var classes = el.className.split(" ").filter(function(c) {
              return c.lastIndexOf(prefix, 0) !== 0;
          });
          el.className = classes.join(" ");
      });
      return this;
  };

  var global_counter = 0;
	nd_visualshortcodes_del_img = function(){
		// console.log("alo");
		$("#edit-style-background-image").removeClass('hidden'); 
		 $(".preview-image").html("");
	}
	
	nd_visualshortcodes_upload_img = function(input){
	var formElement = document.getElementById("ajax-dackend-image-form"); 
    var data = new FormData(formElement);
	// data.append('image', $("#edit-style-background-image")[0].files[0]); 
	$(".loading").removeClass('hidden');

    $.ajax({
        url: Drupal.url('ajax/nd_visualshortcodes/upload_img'),
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if( data.id >0)
            {
				// $("#edit-style-background-image").addClass('hidden'); 
                // $("#nd-visualshortcodes-shortcode-media-images").html("");
				$.post(Drupal.url('ajax/nd_visualshortcodes/media_upload_image') , {}, function(result) {
				  $('#nd-visualshortcodes-shortcode-media-images').html(result);
				  
				});
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
			$(".loading").addClass('hidden');
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}

	
  function nd_visualshortcodes_add_overlay() {
    $('body').append('<div class = "nd-visualshortcodes-overlay"><i class="fa fa-refresh fa-spin"></i></div>');
  } 

  function nd_visualshortcodes_remove_overlay() {
    $('.nd-visualshortcodes-overlay').remove();
  }

  /**
   * Ajax delivery command to open shortcode settings form
   */
  Drupal.AjaxCommands.prototype.shortcode_settings = function (ajax, response, status) {
	  // console.log(response.data);
    if (response.data) {
		// console.log(response.data);
      $("#nd-visualshortcodes-shortcode-settings").html(response.data);
      $("#nd-visualshortcodes-shortcode-settings").dialog('open');
    }
    nd_visualshortcodes_remove_overlay();
  };

  Drupal.behaviors.nd_visualshortcodes_delete_saved = {
    attach: function (context, settings) {
      $('.delete-saved-shortcode', context).click(function() {
        var id = $(this).parent().find('select').val();
        $(this).parent().find('select option[value="' + id + '"]').remove();
        $.post(Drupal.url('ajax/nd_visualshortcodes/ajax_backend_delete_saved'), {'id': id});
        return false;
      });
    }
  }
  
  Drupal.behaviors.nd_visualshortcodes = {
    attach: function (context, settings) {
	// console.log($('.nd_visualshortcodes_links').attr('class'));
	// console.log(context);
      // $('.nd_visualshortcodes_links:not(.default-hide-processed)', context).once('default-hide').hide();
	  // console.log($('.nd_visualshortcodes_links').attr('class'));
 // return;
      // Load Visual Shortcodes layout
      $('.nd_visualshortcodes_links:not(.nd-visual-shortcodes-processed)', context).once('nd-visual-shortcodes').click(function() {

        if(!drupalSettings.nd_visualshortcodes.formats[$(this).data('format')]) {
          // console.log("return : " +Drupal.settings.nd_visualshortcodes.formats[$(this).data('format')]);
		  return;
        }
		 
        // Remove the old Layout
        $('#' + $(this).attr('data-id')).prev('.nd_visualshortcodes').remove();
        // Upload Visual Shortcodes if Enable text clicked
		// console.log($(this).text() +" - " + $(this).attr('data-enable-text') );
        if($(this).text() == $(this).attr('data-enable-text')) {
          var shortcode = $('#' + $(this).attr('data-id')).val();
          $(this).parent().find('> .fa-spin').show();
          $this = $(this);
          $.ajax({
            async: false,
            type: 'POST',
            url: Drupal.url('ajax/nd_visualshortcodes/ajax_backend_layout') ,
            data: {
              code: shortcode,
              format : $(this).data('format')
            },
            dataType: 'html',
            success: function(layout) {
				
              $('#' + $this.attr('data-id')).before(layout);
              $this.parent().find('> .fa-spin').hide();
              nd_visualshortcodes_link_text_update($this);
			  // console.log($('#' + $this.attr('data-id')).prev());
			  // console.log(drupalSettings);
			  Drupal.behaviors.nd_visualshortcodes.attach($('#' + $this.attr('data-id')).prev(), drupalSettings)
              // Drupal.attachBehaviors($('#' + $this.attr('data-id')).prev(), drupalSettings);
            }
          });
        }
        else {
          nd_visualshortcodes_link_text_update($(this));
        }
        return false;
      });

      // Shortcode Copy
      $('.nd-visualshortcodes-copy:not(.nd-visualshortcodes-processed)', context).once('nd-visualshortcodes').click(function() {
        var clone = $(this).closest('.shortcode-processed').outerHTML();
        $(this).closest('.shortcode-processed').after(clone);
        $(this).closest('.shortcode-processed').next().find('.nd-visualshortcodes-processed').removeClass('nd-visualshortcodes-processed');
        Drupal.behaviors.nd_visualshortcodes.attach($(this).closest('.shortcode-processed').parent(), drupalSettings);
        nd_visualshortcodes_save($(this).closest('.nd_visualshortcodes').next());
      });

      function nd_visualshortcodes_collect_attrs($this) {
        var attributes = $this.length ? $this.prop("attributes") : {};
        var attrs_array = {};
        $.each(attributes, function() {
          if(this.name != 'shortcode') {
            // Convert "{${" to "[", "}$}" to "]", "|{" to "<" and "|}" to ">"
            attrs_array[this.name] = this.value.replace(/\|LS\|/g, '[').replace(/\|RS\|/g, ']').replace(/\|LF\|/g, '{').replace(/\|RF\|/g, '}').replace(/\|\{/g, '<').replace(/\|\}/g, '>');
          }
        });
        return attrs_array;
      }

      // Show the Shortcode Settings Form
      $('.shortcode-settings:not(.nd-visualshortcodes-processed)', context).once('nd-visualshortcodes').click(function(event) {        
        nd_visualshortcodes_add_overlay();
        $this = $(this).closest('.shortcode-processed');
        $(this).parents('.nd_visualshortcodes').addClass('nd_active_layout');
        $('.shortcode-opened-settings').removeClass('shortcode-opened-settings');
        // Mark shortcode which opened the Settings Form
        $this.addClass('shortcode-opened-settings');
        var attributes = $this.prop("attributes");
		// console.log("attributes");
		// console.log(attributes);
		
        var attrs_array = nd_visualshortcodes_collect_attrs($this);
		// console.log(attrs_array);
		
        var html = $this.find('.hidden:first').html();
        if(typeof(html) == 'string') {
          // Allow to add "[" and "]" to HTML shortcode
          html = html.replace(/\|LS\|/g, '[').replace(/\|RS\|/g, ']').replace(/\|LF\|/g, '{').replace(/\|RF\|/g, '}');
        }
		
        // Load the Settings form via default Drupal AJAX request
		var self_settings =  {
						url: Drupal.url('admin_ajax/nd_visualshortcodes/ajax_backend_shortcode'),
						base: false ,
						element:  '#doesnt-matter'						
					};
        // var ajax = new Drupal.ajax(false, '#doesnt-matter', {url :Drupal.url('admin_ajax/nd_visualshortcodes/ajax_backend_shortcode') });
        var ajax =  Drupal.ajax(self_settings);
		
		
        ajax.beforeSerialize = function (element_settings, options) {
          options['data']['shortcode'] = $this.attr('shortcode');
          options['data']['attrs'] = attrs_array;
          options['data']['text'] = html;
          return options;
        };
		// console.log(ajax.beforeSerialize());
        // Run ajax request
        ajax.eventResponse(ajax,event);
		 // ajax.success(response, status);
		// ajax.execute();
      });
// Add new shortcode form
      $('.nd-visualshortcodes-save:not(.nd-visualshortcodes-processed)', context).once('nd-visualshortcodes').click(function() {
        nd_visualshortcodes_save_form($(this));
      });

     
      // Add new shortcode form
      $('.nd_visualshortcodes_add:not(.nd-visualshortcodes-processed)', context).once('nd-visualshortcodes').click(function() {
        nd_visualshortcodes_add_form($(this));
      });

      $('.nd_visualshortcodes_enabled_links:not(.nd-visualshortcodes-processed) a', context).once('nd-visualshortcodes').click(function() {
        $('.nd_visualshortcodes_enabled_links .active').removeClass('active');
        $(this).addClass('active');
        return false;
      });

      // Search on the Add Shortcode Form
      $('.nd_visualshortcodes_enabled_list_search input:not(.nd-visualshortcodes-processed)', context).once('nd-visualshortcodes').keyup(function() {
        nd_visualshortcodes_add_form_search($(this));
      });
      $('.nd_visualshortcodes_enabled_list_search input', context).keyup();

      // Update Visual Shortcode status upon Textarea format is changed
      $('.filter-list:not(.nd-visual-shortcodes-format-processed)', context).once('nd-visual-shortcodes-format').change(function() {

        // Disable visual shortcodes if they enabled because the text format is changed
        var text_link = $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links:first').text(),
            text_disable_link = $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links').data('disable-text'),
            format_link = $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links').data('format');
        if(text_link == text_disable_link && format_link != $(this).val()) {
          $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links').click();
		  
        }

        if(typeof(drupalSettings.nd_visualshortcodes.formats) != 'undefined' && typeof(drupalSettings.nd_visualshortcodes.formats[$(this).val()]) != 'undefined' && drupalSettings.nd_visualshortcodes.formats[$(this).val()]) {
          // Setup the format for easy use then Layout will be rendered
          $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links').data('format', $(this).val());
          $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links, .nd_visualshortcodes').show();
		
        }
        else {
          $(this).parents('.text-format-wrapper').find('.nd_visualshortcodes_links, .nd_visualshortcodes').hide();
          $(this).parents('.text-format-wrapper').find('.form-textarea').show();
		  
        }

      });

			$('.filter-list').change();

      // Update all Visual Shortcode link status
      nd_visualshortcodes_link_text_update($('.nd_visualshortcodes_links', context));

      // Autostart
      if(drupalSettings.nd_visualshortcodes.autostart) {
        $('.nd_visualshortcodes_links:not(.autostart-processed)', context).once('autostart').click();

      }

      // Sortable Layout
      $('.nd_visualshortcodes:not(.sort-processed)').once('sort').sortable({
        containerSelector: '.nd-visualshortcodes-parent',
        containerPath: '> .border-style',
        delay: 200,
        onDrop:function ($item, container, _super, event) {
          $item.removeClass("dragged").removeAttr("style");
          $("body").removeClass("dragging");
          nd_visualshortcodes_save($item.parents('.nd_visualshortcodes').next());
        }
      });

      $('.nd-visualshortcodes-parent').disableSelection();
	
      // Setup correct classes for COL shortcode
      $('[shortcode="col"]', context).each(function() {
        $(this).removeClassPrefix('col');
        var classes = {'phone' : 'xs', 'tablet' : 'sm', 'desktop' : 'md', 'wide' : 'lg'};
        for (i in classes) {
          if ($(this).attr(i)) {
            $(this).addClass('col-' + classes[i] + '-' + $(this).attr(i));
          }
        }
      });

      $('.colorpicker-enable:not(.color-processed)', context).once('color').colorpicker();
		
    } // End of attach behaviour
  }; // End behaviour


  // Handle the Media Upload
  Drupal.behaviors.nd_visualshortcodes_media_images = {
    attach: function (context, settings) {			
		$('.vc-gallery-images-select', context).once('nd_media').click(function() {
				// .addClass('active');
				$(this).parents(".image-gallery-upload").addClass("upload_image_processed");
				nd_visualshortcodes_add_overlay();
				$.post(Drupal.url('ajax/nd_visualshortcodes/media_upload_image') , {}, function(result) {
				  $('#nd-visualshortcodes-shortcode-media-images').html(result);
				  $('#nd-visualshortcodes-shortcode-media-images').dialog('open');
				  nd_visualshortcodes_remove_overlay();
				});
				// $('#nd-visualshortcodes-shortcode-save-form').dialog('open');
				return false;
		});
	
		  $(".image-gallery-upload .gallery-remove ").on("click", function() {
			 
							var elem=$(this).parents('.image-gallery-upload');
							elem.removeClass('has_image');
							elem.find('input').val("");
							elem.find('.preview-image').html("");
							$('.upload_image_processed').removeClass('upload_image_processed');
				return false;
			});
			$('#nd-visualshortcodes-shortcode-media-images').on('click', 'a.gallery-links', function() {
				$('.nd-visualshortcodes-gallery-links a.active').removeClass('active');
				$(this).addClass('active');
				return false;
			});
		  // $(".nd-visualshortcodes-gallery-links a.gallery-links").on("click", function() {
				// $('.nd-visualshortcodes-gallery-links a.active').removeClass('active');
				// $(this).addClass('active');
				// return false;
			// });

    } // End of attach behaviour
  }; // End behaviour

  // Add styles to Checkboxes
  Drupal.behaviors.styling_form = {
    attach: function (context, settings) {

      $('.form-checkbox:not(.styled-processed)', context).addClass('styled-processed').each(function() {
        if($(this).parents('.ui-dialog').length) {
          var switchery = new Switchery(this);
        }
      });
		
    } // End of attach behaviour
  }; // End behaviour


  /**
  * Save Visual Shortcodes to textarea value
  */
  function nd_visualshortcodes_save($textarea) {
    var shortcode = '<div class = "hidden nd_visualshortcodes_save_render">' + $textarea.prev('.nd_visualshortcodes').html() + '</div>';
    $('body').append(shortcode);
    // Process NoChilds tag, remove 'hidden' wrapped tag
    $('.nd_visualshortcodes_save_render .border-style > .hidden').each(function() {
      //$(this).parent().html($(this).html().replace(/\{\$\{/g, '[').replace(/\}\$\}/g, ']'));
      $(this).parent().html($(this).html().replace(/\[/g, '|LS|').replace(/\]/g, '|RS|').replace(/\{/g, '|LF|').replace(/\}/g, '|RF|'));
    });

    // Remove styling tags
    $('.nd_visualshortcodes_save_render').find('.border-style').each(function() {
      _nd_visualshortcodes_remove_borders($(this));
    });
    $('.nd_visualshortcodes_save_render').find('.nd-visualshortcodes-settings-links, .nd-visualshortcodes-remove, .nd_backend_preview').remove();

    $('.nd_visualshortcodes_save_render').find('.shortcode-processed').removeClass('shortcode-processed nd-visualshortcodes-parent-wrap row shortcode-opened-settings nd-visualshortcodes-sortable nd-visualshortcodes-parent sort-processed ui-sortable').removeClassPrefix('col').removeClassPrefix('nd-visualshortcodes');
    // Replace tag name with shortcode name
    $('.nd_visualshortcodes_save_render > [shortcode!=""]').each(function() {
      prepare_to_shortcodes($(this));
    });
    var html = $('.nd_visualshortcodes_save_render').html().replace(/(\r\n|\n|\r)/gm, "");

    html.replace(/(<(ndvs_([^0-9]+)[0-9]*))([^>]*)>(.*)(<\/\2>)/g, '[$3$4]\n$5\n[/$3]\n', "g");
    html.replace("\u2028", "\\u2028").replace("\u2029", "\\u2029");
    while(html.indexOf('<ndvs_') >= 0) {
      html = html.replace(/(<(ndvs_([^0-9]+)[0-9]*))([^>]*)>(.*)(<\/\2>)/g, '\n[$3$4]$5[/$3]\n', "g");
    }
    html = html.replace(/[ ]+/g, ' ').replace(/^([^\S]*)/, '').replace(/\]([^\S\[]*)\[/g, ']\n[').replace(/[\n]+/g, '\n');
    $textarea.val(html);
    $('.nd_visualshortcodes_save_render').remove();
    return false;
  }


  function _nd_visualshortcodes_remove_borders($this) {
    $this.find('.border-style').each(function() {
      _nd_visualshortcodes_remove_borders($(this));
    });
    $this.parent().html($this.html());
  }

  function _shortcode_form_to_settings($target_form) {
    $target_form.submit();
    settings = {};
    $target_form.find(':input').each(function() {
      if($(this).attr('type') == 'hidden' && !$(this).hasClass('.form-textarea') && !$(this).hasClass('.hidden')) {
        return;
      }
	  if(  $(this).attr('type') == 'file'){
		  return;
	  }
      var value = '';
      if($(this).attr('type') == 'checkbox') {
        value = $(this).is(':checked') ? 1 : 0;
      }
      else if($(this).attr('type') == 'radio') {
        value = $(this).closest('.form-radios').find('input[type="radio"]:checked').val();
      }
      else {
        value = $(this).val();
      }
      settings[$(this).attr('name')] = value;
    });    
	
    return settings;
  }
	// console.log(settings);
  function _settings_to_shortcode_attrs(settings, $shortcode) {
    for (i in settings) {
      // Process HTML shortcode text value 
      if(i.indexOf('text') == 0 && i.indexOf('[value]') > -1) {
        // Allow to add "[" and "]" to HTML shortcode
        $shortcode.find('h3').next().html(settings[i].replace(/\[/g, '|LS|').replace(/\]/g, '|RS|').replace(/\{/g, '|LF|').replace(/\}/g, '|RF|'));
      }
      else if(i.indexOf('text') == 0 && i.indexOf('[format]') > -1) {
        $shortcode.attr('format', settings[i]);
      }
      else if(!settings[i] && settings[i] !== 0) {
        $shortcode.removeAttr(i);
      }
      else {
        if (typeof(settings[i]) == 'string') {
          // Allow to add "[", "]", "<" and ">" to attributes
          settings[i] = settings[i].replace(/\[/g, '|LS|').replace(/\]/g, '|RS|').replace(/\{/g, '|LF|').replace(/\}/g, '|RF|').replace(/\</g, '|{').replace(/\>/g, '|}').replace(/"/g, "'");
        }
        $shortcode.attr(i, settings[i]); 
      }
    };
  }

  function get_from_cache(html) {
    for(i in cache_shortcode) {
      if(cache_shortcode[i].raw == html) {
        return cache_shortcode[i].rendered;
      }
    }
    return '';
  }

  function prepare_to_shortcodes($this) {
    var html = $this.outerHTML();
    // Search for this string in the cache
    //var rendered = get_from_cache(html);
    global_counter++;
    if(typeof($this.attr('shortcode')) == 'undefined') {
      return;
    }
    $this.find('[shortcode!=""]').each(function() {
      prepare_to_shortcodes($(this));
    });
    if($this.attr('class') == '') {
      $this.removeAttr('class');
    }
    var attributes = $this.prop("attributes");
    var attrs_string = '';
    $.each(attributes, function() {
      attrs_string += this.name != 'shortcode' ? (' ' + this.name + '="' + this.value + '"') : '';
    });
    // Remove required for sortable plugin tags
    if($this.find('> .nd-visualshortcodes-parent').length) {
      $this.html($this.find('> .nd-visualshortcodes-parent').html());
    }
    // Save in the cache
    //cache_shortcode.push({'raw': html, 'rendered': rendered});
    rendered = '<ndvs_' + $this.attr('shortcode') + global_counter + attrs_string + '>' + $this.html() +'</ndvs_' + $this.attr('shortcode') + global_counter + '>';
    $this.replaceWith(rendered);
  }

  function nd_visualshortcodes_link_text_update($this) {
    if($('#' + $this.attr('data-id')).prev('.nd_visualshortcodes').length) {
      $this.text($this.attr('data-disable-text'));
	  // console.log($this.attr('data-id') + " hide");
      $('#' + $this.attr('data-id')).hide();
      //$('#' + $this.attr('data-id')).parents('.text-format-wrapper').find('.filter-wrapper').hide();
    }
    else {
      $this.text($this.attr('data-enable-text'));
      $('#' + $this.attr('data-id')).show();
	  // console.log($this.attr('data-id') + " show");
      //$('#' + $this.attr('data-id')).parents('.text-format-wrapper').find('.filter-wrapper').show();
    }
  }
  function nd_visualshortcodes_save_form($this) {
    var id = $this.parents('.nd_visualshortcodes').next().attr('id');
    var data_format = $('.nd_visualshortcodes_links[data-id="' + id +'"]').data('format');
    var data_shortcode = $this.parents('.shortcode-processed').attr('shortcode');
    $('.nd_visualshortcodes_add_link_active').removeClass('nd_visualshortcodes_add_link_active');
    // Mark the link which have opened the Save Form
    $this.addClass('nd_visualshortcodes_add_link_active');
    // Get the raw code
    var code = $this.closest('.shortcode-processed').outerHTML();
    $('#nd-visualshortcodes-shortcode-save-form textarea').val(code);
    $('#nd-visualshortcodes-shortcode-save-form').dialog('open');
  }
  function nd_visualshortcodes_add_form($this) {
    nd_visualshortcodes_add_overlay();
    var id = $this.parents('.nd_visualshortcodes').next().attr('id');
    var data_format = $('.nd_visualshortcodes_links[data-id="' + id +'"]').data('format');
    var data_shortcode = $this.parents('.shortcode-processed').attr('shortcode');
    $('.nd_visualshortcodes_add_link_active').removeClass('nd_visualshortcodes_add_link_active');
    // Mark the link which have opened the Add Form, so will know there to insert the shortcode
    $this.addClass('nd_visualshortcodes_add_link_active');
    $.post(Drupal.url('ajax/nd_visualshortcodes/shortcodes_list') , {format: data_format, shortcode: data_shortcode}, function(result) {
      $('#nd-visualshortcodes-shortcode-add-form').html(result);
      $('#nd-visualshortcodes-shortcode-add-form').dialog('open');
      nd_visualshortcodes_remove_overlay();
    });
  }

  function nd_visualshortcodes_add_form_search($this) {
    if(!$this.val()) {
      $this.parents('.nd_visualshortcodes_enabled_list').find('.nd_visualshortcodes_enabled_links a').show();
    }
    else {
      $this.parents('.nd_visualshortcodes_enabled_list').find('.nd_visualshortcodes_enabled_links a').hide();
      if($this.attr('data-exactly')) {
        $this.parents('.nd_visualshortcodes_enabled_list').find('.nd_visualshortcodes_enabled_links a[data-title="' + $this.val().toLowerCase() + '"]').show(); 
        $this.removeAttr('data-exactly');
      }
      else {
        $this.parents('.nd_visualshortcodes_enabled_list').find('.nd_visualshortcodes_enabled_links a[data-title*="' + $this.val().toLowerCase() + '"]').show();   
      }
    }
  }

  function nd_visualshortcodes_remove_image($this) {
    var fid = $this.closest('.form-item').find('input').val();
    $this.closest('.form-item').find('.preview-image').html('');
    $this.closest('.form-item').find('input').val('');
    $this.closest('#nd-visualshortcodes-shortcode-settings').find('.fid-old-field').val('');
    $this.hide();
  }

  function nd_visualshortcodes_upload_image($this) {
    globalOptions = {};
    Drupal.media.popups.mediaBrowser(function (mediaFiles) {
      if (mediaFiles.length < 0) {
        return;
      }
      var mediaFile = mediaFiles[0];
      // Set the value of the filefield fid (hidden).
      $this.closest('.form-item').find('input').val(mediaFile.fid);
      $this.closest('.form-item').find('.preview-image').html(mediaFile.preview);
      $this.closest('.form-item').find('.media-remove').show();
    }, globalOptions);
    return false;
  }

  $(document).ready(function() {
	$('#nd-visualshortcodes-shortcode-settings .filter-list').change();

    // Dialog Shortcode Settings Form
    $('body').append('<div id = "nd-visualshortcodes-shortcode-settings" title = "' + Drupal.t('Shortcode Settings') + '"></div>');
    $('#nd-visualshortcodes-shortcode-settings').dialog({
      autoOpen: false,
      width: 1000,
      modal: true,
      // position: ['middle', 100],
      open: function() {
        Drupal.attachBehaviors($("#nd-visualshortcodes-shortcode-settings").context, drupalSettings);
        $(this).dialog('option', 'position', ['middle', 100]);
      },
      buttons: {
        "Save": function() {
		
          nd_visualshortcodes_add_overlay();
          // Run change() method so WYSIWYG editors will update textarea values with current values from WYSIWYG layout
          // $('#nd-visualshortcodes-shortcode-settings .filter-list').change();
          if(typeof CKEDITOR != 'undefined') {
            for(var instanceName in CKEDITOR.instances)
      				CKEDITOR.instances[instanceName].updateElement();
          }
          // Load form values to array
          var settings = _shortcode_form_to_settings($('#nd-visualshortcodes-shortcode-settings'));
		
          // Load settings to shortcode text and attributes values
          _settings_to_shortcode_attrs(settings, $('.shortcode-opened-settings'));
          // If this is not child element - upload the preview
          if($('.shortcode-opened-settings > .border-style').hasClass('border-none')) {
            $.post(Drupal.url('ajax/nd_visualshortcodes/ajax_backend_shortcode_preview') , {attrs: settings, shortcode: $('.shortcode-opened-settings').attr('shortcode')}, function(data) {
              if($('.shortcode-opened-settings').attr('shortcode') == 'a_nd_saved') {
                var textarea = $('.shortcode-opened-settings').parents('.nd_visualshortcodes').next();
                // Remove processed class from saved shortcode, so new behaviours can be attached
                data = $(data).first().addClass('Drupal-behaviour-please');
                $('.shortcode-opened-settings').replaceWith(data).addClass('Drupal-behaviour-please');
                $('.Drupal-behaviour-please').find('.nd-visualshortcodes-processed').removeClass('nd-visualshortcodes-processed');
                Drupal.attachBehaviors($('.Drupal-behaviour-please').context, drupalSettings);
                $('.Drupal-behaviour-please').removeClass('Drupal-behaviour-please');
                nd_visualshortcodes_save(textarea);
              }
              else {
                $('.shortcode-opened-settings .nd_backend_preview').remove();
                $('.shortcode-opened-settings .border-style').append(data);
              }
            });
          }
          // Attach Drupal behaviours to updated element to allow scripts made some custom works
          Drupal.attachBehaviors($('.shortcode-opened-settings').parent().context, drupalSettings);
          $('.shortcode-opened-settings').find('.nd-visualshortcodes-settings-links:first').css('display', 'block').prepend('<span class = "saving-info btn btn-xs btn-success">' + Drupal.t('Saved.') + '</span>')
          setTimeout(function() {
            $('.saving-info').animate({opacity: 0}, 1500, function() {
              $(this).parent('.nd-visualshortcodes-settings-links').removeAttr('style');
              $(this).remove();
            });
            nd_visualshortcodes_remove_overlay();
          }, 1000);
          // We already saved this before
          if($('.shortcode-opened-settings').attr('shortcode') != 'a_nd_saved') {
            // Save updated shortcodes to textarea code
			// console.log($('.shortcode-opened-settings').parents('.nd_visualshortcodes').next());
            nd_visualshortcodes_save($('.shortcode-opened-settings').parents('.nd_visualshortcodes').next());
          }
          $(this).dialog( "close" );
          return false;
        },
        "Delete": function() {
          if (!drupalSettings.nd_visualshortcodes.confirm_delete || confirm(Drupal.t('Delete shortcode?'))) {
            $('.shortcode-opened-settings').closest('.nd_visualshortcodes').addClass('nd_visualshortcodes_active');
            $('.shortcode-opened-settings').remove();
            nd_visualshortcodes_save($('.nd_visualshortcodes_active').next());
            $(this).dialog( "close" ); 
          }
          return false;
        },
        "Cancel": function() {
          $(this).dialog( "close" );
          return false;
        }
      },
    });

    // Dialog Shortcode Settings Form
    $('body').append('<div id = "nd-visualshortcodes-shortcode-add-form" title = "' + Drupal.t('Add Shortcode') + '"></div>');
    $('#nd-visualshortcodes-shortcode-add-form').dialog({
      autoOpen: false,
      width: 1000,
      modal: true,
      open: function() {
        Drupal.attachBehaviors($("#nd-visualshortcodes-shortcode-add-form").context, drupalSettings);
      },
      buttons: {
        "Add": function() {
          nd_visualshortcodes_add_overlay();
          var data_shortcode = $('.nd_visualshortcodes_enabled_links .active').attr('data-shortcode');
          $.post(Drupal.url('ajax/nd_visualshortcodes/shortcodes_list_add'), {shortcode: data_shortcode}, function(result) {
            $('.nd-visualshortcodes-added-shortcode').removeClass('nd-visualshortcodes-added-shortcode');
            // If this is main ADD button appear at the begining of the layout
            if($('.nd_visualshortcodes_add_link_active').parent().hasClass('nd-visualshortcodes-main-add')) {
              $('.nd_visualshortcodes_add_link_active').parent().parent().find('.end-layout').before(result);
              $('.nd_visualshortcodes_add_link_active').parent().parent().find('> .shortcode-processed:last').addClass('nd-visualshortcodes-added-shortcode');
            }
            else {
              $('.nd_visualshortcodes_add_link_active').closest('.shortcode-processed').find('.nd-visualshortcodes-parent:first').append(result);
              $('.nd_visualshortcodes_add_link_active').closest('.shortcode-processed').find('.nd-visualshortcodes-parent:first > .shortcode-processed:last').addClass('nd-visualshortcodes-added-shortcode');
            }
            $('.nd_visualshortcodes_add_link_active').closest('.nd_visualshortcodes').remove('sort-processed');
            // Attach Drupal behaviours to updated element to allow scripts made some custom works
			// console.log($('.nd_visualshortcodes_add_link_active').closest('.nd_visualshortcodes'));
            Drupal.attachBehaviors($('.nd_visualshortcodes_add_link_active').closest('.nd_visualshortcodes').context, drupalSettings);
            // Open the settings form
            $('.nd-visualshortcodes-added-shortcode .shortcode-settings:first').click();
            // Save updates shortcodes to textarea code
			
            nd_visualshortcodes_save($('.nd_visualshortcodes_add_link_active').closest('.nd_visualshortcodes').next());
            // nd_visualshortcodes_remove_overlay();
          });
          $(this).dialog( "close" );
          // Show the user notification
          $('.nd_visualshortcodes_add_link_active').before('<span class = "saving-info btn btn-xs btn-success">' + Drupal.t('Saved.') + '</span>')
          setTimeout(function() {
            $('.saving-info').animate({opacity: 0}, 1500, function() {
              $(this).remove();
            });
          }, 1000);
        },
        Cancel: function() {
          $(this).dialog( "close" );
        }
      },
    });
	$('body').append('<div id = "nd-visualshortcodes-shortcode-save-form" title = "' + Drupal.t('Save Structure') + '"><label>' + Drupal.t('Name:') + '</label><input class = "form-control" type = "text" name = "shortcodes_save"><textarea class = "hidden"></textarea></div>');
    $('#nd-visualshortcodes-shortcode-save-form').dialog({
      autoOpen: false,
      width: 1000,
      modal: true,
      open: function() {
        Drupal.attachBehaviors($("#nd-visualshortcodes-shortcode-save-form").context, drupalSettings);
      },
      buttons: {
        "Save": function() {
          $.post(Drupal.url('ajax/nd_visualshortcodes/shortcodes_save')  , {
            'name': $('#nd-visualshortcodes-shortcode-save-form input').val(),
            'code': $('#nd-visualshortcodes-shortcode-save-form textarea').val()
          });
          $(this).dialog( "close" );

          // Show the user notification
          $('.nd_visualshortcodes_add_link_active').before('<span class = "saving-info btn btn-xs btn-success">' + Drupal.t('Saved.') + '</span>')
          setTimeout(function() {
            $('.saving-info').animate({opacity: 0}, 1500, function() {
              $(this).remove();
            });
          }, 1000);
        },
        Cancel: function() {
          $(this).dialog( "close" );
        }
      },
    });
	
		//--------------- uPLOAD iMAGES LIST
			$('body').append('<div id = "nd-visualshortcodes-shortcode-media-images" title = "' + Drupal.t('Save Structure') + '"><label>' + Drupal.t('Name:') + '</label><input class = "form-control" type = "text" name = "shortcodes_save"><textarea class = "hidden"></textarea></div>');
			$('#nd-visualshortcodes-shortcode-media-images').dialog({
			  autoOpen: false,
			  width: 1000,
			  modal: true,
			  open: function() {
				Drupal.attachBehaviors($("nd-visualshortcodes-shortcode-media-images").context, drupalSettings);
			  },
			  buttons: {
				"Add": function() {
							// nd_visualshortcodes_add_overlay();
							var file = $('.nd-visualshortcodes-gallery-links a.active').attr('data-id');
							var lnk = $('.nd-visualshortcodes-gallery-links a.active').attr('data-link');
							$('.image-gallery-upload.upload_image_processed input').val(file);
							$('.image-gallery-upload.upload_image_processed .preview-image').html('<img src="'+lnk+'">');
							$('.upload_image_processed').addClass('has_image');
							$('.upload_image_processed').removeClass('upload_image_processed');
							
							 $(this).dialog( "close" );
						},
					Cancel: function() {
					  $(this).dialog( "close" );
					}
			  },
			});
		
		//--------------- and iMAGES LIST
		$("a.nd_visualshortcodes_del_img").click(function() {
			nd_visualshortcodes_del_img();
			// alert("sqd");
		});
		
		 // $('#nd-visualshortcodes-shortcode-media-images #list-item-images').paginate({itemsPerPage: 2});
  }); // end doc ready 


})(jQuery, Drupal, drupalSettings);


 