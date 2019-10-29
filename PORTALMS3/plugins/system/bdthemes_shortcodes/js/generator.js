jQuery(document).ready(function($) {
	"use strict";
	
	// Prepare data
	var $generator = $('#su-generator'),
		$search = $('#su-generator-search'),
		$filter = $('#su-generator-filter'),
		$filters = $filter.children('a'),
		$choices = $('#su-generator-choices'),
		$choice = $choices.find('span'),
		$settings = $('#su-generator-settings'),
		$prefix = $('#su-compatibility-mode-prefix'),
		$result = $('#su-generator-result'),
		$selected = $('#su-generator-selected'),
		mce_selection = '';                
		window.setTimeout(function() {
			$search.focus();
		}, 200);

	// Hotkey
	if (typeof $.hotkeys == 'object' && $.hotkeys.version === '(beta)(0.0.3)' && su_generator.hotkey) {
		$.hotkeys.add(su_generator.hotkey, function() {
			$('.su-generator-button').trigger('click');
		});
	}

	// Filters
	$filters.click(function(e) {
		// Prepare data
		var filter = $(this).data('filter');
		// If filter All, show all choices
		if (filter === 'all') $choice.css({
			opacity: 1
		}).removeClass('su-generator-choice-first');
		// Else run search
		else {
			var regex = new RegExp(filter, 'gi');
			// Hide all choices
			$choice.css({
				opacity: 0.2
			});
			// Find searched choices and show
			$choice.each(function() {
				// Get shortcode name
				var group = $(this).data('group');
				// Show choice if matched
				if (group.match(regex) !== null) $(this).css({
					opacity: 1
				}).removeClass('su-generator-choice-first');
			});
		}
		e.preventDefault();
	});

	// Go to home link
	$('#su-generator').on('click', '.su-generator-home', function(e) {
		// Clear search field
		$search.val('');
		// Hide settings
		$settings.html('').hide();
		// Remove narrow class
		$generator.removeClass('su-generator-narrow');
		// Show filters
		$filter.show();
		// Show choices panel
		$choices.show();
		$choice.show();
		// Clear selection
		mce_selection = '';
		// Focus search field
		$search.focus();
		e.preventDefault();
	});

	// Search field
	$search.on({
		focus: function() {
			// Clear field
			$(this).val('');
			// Hide settings
			$settings.html('').hide();
			// Remove narrow class
			$generator.removeClass('su-generator-narrow');
			// Show choices panel
			$choices.show();
			$choice.css({
				opacity: 1
			}).removeClass('su-generator-choice-first');
			// Show filters
			$filter.show();
		},
		blur: function() {},
		keyup: function(e) {
			// Prepare vars
			var $first = $('.su-generator-choice-first:first'),
				val = $(this).val(),
				regex = new RegExp(val, 'gi'),
				best = 0;
			// Hotkey action
			if (e.keyCode === 13 && $first.length > 0) {
				e.preventDefault();
				$(this).val('').blur();
				$first.trigger('click');
			}
			// Hide all choices
			$choice.css({
				opacity: 0.2
			}).removeClass('su-generator-choice-first');
			// Loop and highlight choices
			$choice.each(function() {
				// Get choice data
				var data = $(this).data(),
					id = data.shortcode,
					name = data.name,
					desc = data.desc,
					group = data.group,
					matches = ([id, name, desc, group].join(' ')).match(regex);
				// Highlight choice if matched
				if (matches !== null) {
					// Highlight current choice
					$(this).css({
						opacity: 1
					});
					// Check for exact match
					if (val === id) {
						// Remove primary class from all choices
						$choice.removeClass('su-generator-choice-first');
						// Add primary class to the current choice
						$(this).addClass('su-generator-choice-first');
						// Prevent selecting by matches number
						best = 999;
					}
					// Check matches length
					else if (matches.length > best) {
						// Remove primary class from all choices
						$choice.removeClass('su-generator-choice-first');
						// Add primary class to the current choice
						$(this).addClass('su-generator-choice-first');
						// Save the score
						best = matches.length;
					}
				}
			});
			// Remove primary class if search field is empty
			if (val === '') $choice.removeClass('su-generator-choice-first');
		}
	});

	// Click on shortcode choice
	$choice.on('click', function(e) {
		// Prepare data
		var shortcode = $(this).data('shortcode');
		var shortcodea = $(this).data('shortcode');
              
		// Load shortcode options
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'su_generator_settings',
				shortcode: shortcode
			},
			beforeSend: function() {
				// Hide preview box
				$('#su-generator-preview').hide();
				// Hide choices panel
				$choices.hide();
				// Show loading animation
				$settings.addClass('su-generator-loading').show();
				// Add narrow class
				$generator.addClass('su-generator-narrow');
				// Hide filters
				$filter.hide();
			},
			success: function(data) {
				// Hide loading animation
				$settings.removeClass('su-generator-loading');
				// Insert new HTML
				$settings.html(data);
				// Apply selected text to the content field
				if (typeof mce_selection !== 'undefined' && mce_selection !== '') $('#su-generator-content').val(mce_selection);
				// Init range pickers
				$('.su-generator-range-picker').each(function(index) {
					var $picker = $(this),
						$val = $picker.find('input'),
						min = $val.attr('min'),
						max = $val.attr('max'),
						step = $val.attr('step');
					// Apply noUIslider
					$val.simpleSlider({
						snap: true,
						step: step,
						range: [min, max]
					});
					$val.show();
					$val.on('keyup blur', function(e) {
						$val.simpleSlider('setValue', $val.val());
					});
				});

				// Init color pickers
				$('.su-generator-select-color').each(function(index) {
					$(this).find('.su-generator-select-color-wheel').filter(':first').farbtastic('.su-generator-select-color-value:eq(' + index + ')');
					$(this).find('.su-generator-select-color-value').focus(function() {
						$('.su-generator-select-color-wheel:eq(' + index + ')').show();
					});
					$(this).find('.su-generator-select-color-value').blur(function() {
						$('.su-generator-select-color-wheel:eq(' + index + ')').hide();
					});
				});
				// Init image sourse pickers
				$('.su-generator-isp').each(function() {
					var $picker = $(this),
						$sources = $picker.find('.su-generator-isp-sources'),
						$source = $picker.find('.su-generator-isp-source'),
						$add_media = $picker.find('.su-generator-isp-add-media'),
						$images = $picker.find('.su-generator-isp-images'),
						$srcdir = $picker.find('.su-generator-isp-directory'),
						$cats = $picker.find('.su-generator-isp-categories'),
						$k2cats = $picker.find('.su-generator-isp-k2-categories'),
						$taxes = $picker.find('.su-generator-isp-taxonomies'),
						$terms = $('.su-generator-isp-terms'),
						$val = $picker.find('.su-generator-attr'),
						frame;
					// Update hidden value
					var update = function() {
						var val = 'none',
							ids = '',
							source = $sources.val();
						// Media library
						if (source === 'media') {
							// Sort images
							$images.sortable({
                                update: function(event, ui) {
                                    update();
                                }
                            });
											
							var images = [];
							$images.find('span').each(function(i) {
								images[i] = $(this).data('id');
							});
							if (images.length > 0) ids = images.join(',');
						}
						// Category
						else if (source === 'directory') {
							var srcdir = $srcdir.val() || [];
							ids = srcdir;
						}
						// Category
						else if (source === 'category') {
							var categories = $cats.val() || [];
							if (categories.length > 0) ids = categories.join(',');
						}
						// k2 Category
						else if (source === 'k2-category') {
							var k2_categories = $k2cats.val() || [];
							if (k2_categories.length > 0) ids = k2_categories.join(',');
						}
						// Taxonomy
						else if (source === 'taxonomy') {
							var tax = $taxes.val() || '',
								terms = $terms.val() || [];
							if (tax !== '0' && terms.length > 0) val = 'taxonomy: ' + tax + '/' + terms.join(',');
						}
						// Deselect
						else if (source === '0') {
							val = 'none';
						}
						// Other options
						else {
							val = source;
						}
						if (ids !== '') val = source + ': ' + ids;
						$val.val(val).trigger('change');
					}
					// Switch source
					$sources.on('change', function(e) {
						var source = $(this).val();
						e.preventDefault();
						$source.removeClass('su-generator-isp-source-open');
						if (source.indexOf(':') === -1) $picker.find('.su-generator-isp-source-' + source).addClass('su-generator-isp-source-open');
						update();
					});
					// Remove image
					$images.on('click', 'span i', function() {
						$(this).parent('span').css('border-color', '#f03').fadeOut(300, function() {
							$(this).remove();
							update();
						});
					});
					// Add image
					$add_media.click(function(e) {
						e.preventDefault();
					});
					// Select categories and terms
					$srcdir.on('change', update);
					$cats.on('change', update);
					$k2cats.on('change', update);
					$terms.on('change', update);
					// Select taxonomy
					$taxes.on('change', function() {
						var $cont = $(this).parents('.su-generator-isp-source'),
							tax = $(this).val();
						// Remove terms
						$terms.hide().find('option').remove();
						update();
						// Taxonomy is not selected
						if (tax === '0') return;
						// Taxonomy selected
						else {
							var ajax_term_select = $.ajax({
								url: ajaxurl,
								type: 'post',
								dataType: 'html',
								data: {
									'action': 'su_generator_get_terms',
									'tax': tax,
									'class': 'su-generator-isp-terms',
									'multiple': true,
									'size': 10
								},
								beforeSend: function() {
									if (typeof ajax_term_select === 'object') ajax_term_select.abort();
									$terms.html('').attr('disabled', true).hide();
									$cont.addClass('su-generator-loading');
								},
								success: function(data) {
									$terms.html(data).attr('disabled', false).show();
									$cont.removeClass('su-generator-loading');
								}
							});
						}
					});
				});
				
				// Init icon pickers
				$('.su-generator-icon-picker-button').each(function() {
					var $button = $(this),
						$field = $(this).parents('.su-generator-field-container'),
						$val = $field.find('.su-generator-attr'),
						$picker = $field.find('.su-generator-icon-picker'),
						$filter = $picker.find('input:text');

					$button.click(function(e) {
						$('.su-generator-licon-picker-visible').removeClass('su-generator-licon-picker-visible');
						$picker.toggleClass('su-generator-icon-picker-visible');
						$filter.val('').trigger('keyup');
						if ($picker.hasClass('su-generator-icon-picker-loaded')) return;
						// Load icons
						$.ajax({
							type: 'post',
							url: ajaxurl,
							data: {
								action: 'su_generator_get_icons'
							},
							dataType: 'html',
							beforeSend: function() {
								// Show loading animation
								$picker.addClass('su-generator-loading');
								// Add loaded class
								$picker.addClass('su-generator-icon-picker-loaded');
							},
							success: function(data) {
								$picker.append(data);
								var $icons = $picker.children('i');
								$icons.click(function(e) {
									$val.val('icon: ' + $(this).attr('title'));
									$picker.removeClass('su-generator-icon-picker-visible');
									$val.trigger('change');
									e.preventDefault();
								});
								$filter.on({
									keyup: function() {
										var val = $(this).val(),
											regex = new RegExp(val, 'gi');
										// Hide all choices
										$icons.hide();
										// Find searched choices and show
										$icons.each(function() {
											// Get shortcode name
											var name = $(this).attr('title');
											// Show choice if matched
											if (name.match(regex) !== null) $(this).show();
										});
									},
									focus: function() {
										$(this).val('');
										$icons.show();
									}
								});
								$picker.removeClass('su-generator-loading');
							}
						});
						e.preventDefault();
					});
				});

				$('.su-generator-image-picker-button').click(function(){
				     $('.su-generator-icon-picker-visible').removeClass('su-generator-icon-picker-visible');
				     $('.su-generator-licon-picker-visible').removeClass('su-generator-licon-picker-visible');
				})

				// Init Line icon pickers
				$('.su-generator-licon-picker-button').each(function() {
					var $button = $(this),
						$field = $(this).parents('.su-generator-field-container'),
						$val = $field.find('.su-generator-attr'),
						$picker = $field.find('.su-generator-licon-picker'),
						$filter = $picker.find('input:text');

					$button.click(function(e) {
						$('.su-generator-icon-picker-visible').removeClass('su-generator-icon-picker-visible');
						$picker.toggleClass('su-generator-licon-picker-visible');
						$filter.val('').trigger('keyup');
						if ($picker.hasClass('su-generator-licon-picker-loaded')) return;
						// Load icons
						$.ajax({
							type: 'post',
							url: ajaxurl,
							data: {
								action: 'su_generator_get_licons'
							},
							dataType: 'html',
							beforeSend: function() {
								// Show loading animation
								$picker.addClass('su-generator-loading');
								// Add loaded class
								$picker.addClass('su-generator-licon-picker-loaded');
							},
							success: function(data) {
								$picker.append(data);
								var $icons = $picker.children('i');
								$icons.click(function(e) {
									$val.val('licon: ' + $(this).attr('title'));
									$picker.removeClass('su-generator-licon-picker-visible');
									$val.trigger('change');
									e.preventDefault();
								});
								$filter.on({
									keyup: function() {
										var val = $(this).val(),
											regex = new RegExp(val, 'gi');
										// Hide all choices
										$icons.hide();
										// Find searched choices and show
										$icons.each(function() {
											// Get shortcode name
											var name = $(this).attr('title');
											// Show choice if matched
											if (name.match(regex) !== null) $(this).show();
										});
									},
									focus: function() {
										$(this).val('');
										$icons.show();
									}
								});
								$picker.removeClass('su-generator-loading');
							}
						});
						e.preventDefault();
					});
				});
				// Init switches
				$('.su-generator-switch').click(function(e) {
					// Prepare data
					var $switch = $(this),
						$value = $switch.parent().children('input'),
						is_on = $value.val() === 'yes';
					// Disable
					if (is_on) {
						// Change value
						$value.val('no').trigger('change');
					}
					// Enable
					else {
						// Change value
						$value.val('yes').trigger('change');
					}
					e.preventDefault();
				});
				$('.su-generator-switch-value').on('change', function() {
					// Prepare data
					var $value = $(this),
						$switch = $value.parent().children('.su-generator-switch'),
						value = $value.val();
					// Disable
					if (value === 'yes') $switch.removeClass('su-generator-switch-no').addClass('su-generator-switch-yes');
					// Enable
					else if (value === 'no') $switch.removeClass('su-generator-switch-yes').addClass('su-generator-switch-no');
				});
				// Init tax_term selects
				$('select#su-generator-attr-taxonomy').on('change', function() {
					var $taxonomy = $(this),
						tax = $taxonomy.val(),
						$terms = $('select#su-generator-attr-tax_term');
					// Load new options
					window.su_generator_get_terms = $.ajax({
						type: 'POST',
						url: ajaxurl,
						data: {
							action: 'su_generator_get_terms',
							tax: tax,
							noselect: true
						},
						dataType: 'html',
						beforeSend: function() {
							// Check previous requests
							if (typeof window.su_generator_get_terms === 'object') window.su_generator_get_terms.abort();
							// Show loading animation
							$terms.parent().addClass('su-generator-loading');
						},
						success: function(data) {
							// Remove previous options
							$terms.find('option').remove();
							// Append new options
							$terms.append(data);
							// Hide loading animation
							$terms.parent().removeClass('su-generator-loading');
						}
					});
				});
				// Init shadow pickers
				$('.su-generator-shadow-picker').each(function(index) {
					var $picker = $(this),
						$fields = $picker.find('.su-generator-shadow-picker-field input'),
						$hoff = $picker.find('.su-generator-sp-hoff'),
						$voff = $picker.find('.su-generator-sp-voff'),
						$blur = $picker.find('.su-generator-sp-blur'),
						$color = {
							cnt: $picker.find('.su-generator-shadow-picker-color'),
							value: $picker.find('.su-generator-shadow-picker-color-value'),
							wheel: $picker.find('.su-generator-shadow-picker-color-wheel')
						},
						$val = $picker.find('.su-generator-attr');
					// Init color picker
					$color.wheel.farbtastic($color.value);
					$color.value.focus(function() {
						$color.wheel.show();
					});
					$color.value.blur(function() {
						$color.wheel.hide();
					});
					// Handle text fields
					$fields.on('change blur keyup', function() {
						$val.val($hoff.val() + 'px ' + $voff.val() + 'px ' + $blur.val() + 'px ' + $color.value.val()).trigger('change');
					});
					$val.on('keyup', function() {
						var value = $(this).val().split(' ');
						// Value is correct
						if (value.length === 4) {
							$hoff.val(value[0].replace('px', ''));
							$voff.val(value[1].replace('px', ''));
							$blur.val(value[2].replace('px', ''));
							$color.value.val(value[3]);
							$fields.trigger('keyup');
						}
					});
				});
				// Init border pickers
				$('.su-generator-border-picker').each(function(index) {
					var $picker = $(this),
						$fields = $picker.find('.su-generator-border-picker-field input, .su-generator-border-picker-field select'),
						$width = $picker.find('.su-generator-bp-width'),
						$style = $picker.find('.su-generator-bp-style'),
						$color = {
							cnt: $picker.find('.su-generator-border-picker-color'),
							value: $picker.find('.su-generator-border-picker-color-value'),
							wheel: $picker.find('.su-generator-border-picker-color-wheel')
						},
						$val = $picker.find('.su-generator-attr');
					// Init color picker
					$color.wheel.farbtastic($color.value);
					$color.value.focus(function() {
						$color.wheel.show();
					});
					$color.value.blur(function() {
						$color.wheel.hide();
					});
					// Handle text fields
					$fields.on('change blur keyup', function() {
						$val.val($width.val() + 'px ' + $style.val() + ' ' + $color.value.val()).trigger('change');
					});
					$val.on('keyup', function() {
						var value = $(this).val().split(' ');
						// Value is correct
						if (value.length === 3) {
							$width.val(value[0].replace('px', ''));
							$style.val(value[1]);
							$color.value.val(value[2]);
							$fields.trigger('keyup');
						}
					});
				});
				// Remove skip class when setting is changed
				$settings.find('.su-generator-attr').on('change keyup blur', function() {
					var $cnt = $(this).parents('.su-generator-field-container'),
						_default = $cnt.data('default'),
						val = $(this).val();
					// Value is changed
					if (val != _default) $cnt.removeClass('su-generator-skip');
					else $cnt.addClass('su-generator-skip');
				});
				// Init value setters
				$('.su-generator-set-value').click(function(e) {
					$(this).parents('.su-generator-field-container').find('input').val($(this).text()).trigger('change');
				});
				// Save selected value
				$selected.val(shortcode);
                                data = localStorage.getItem('last_used' + shortcode);
                                if(data){
                                set(data);
                            }
                            //for default insert problems
                             $('.su-generator-attr').trigger('change');
			     var shortcode_pre = localStorage.getItem(shortcodea);
                
		if(shortcode_pre){
		 	var $list = $('.su-gp-list'),
				id = new Date().getTime();
			   try{
				var test = jQuery.parseJSON(shortcode_pre);
			       for(var name in test){
  			  // Ask for preset name
			  // Name is entered
				  if (name !== '' && name !== null) {
					  // Hide default text
					  $list.find('b').hide();
					  // Add new option
					  $list.append('<span data-id="' + name + shortcodea + '"><em>' + test[name] + '</em><i class="fa fa-times"></i></span>');
					  // Perform AJAX request
				  }
			       }
			   }catch(e){
				localStorage.removeItem(shortcodea);
			   }
	    		}

			},
			dataType: 'html'
		});
	});

	// Insert shortcode
	$('#su-generator').on('click', '.su-generator-insert', function(e) {
		// Prepare data
		var shortcode = parse();

		// for saving shortcode
		add_preset('last_used', "Last used settings", shortcode);

		//for inserting shortcode
		//if (window.parent) window.parent.jInsertEditorText(shortcode, "editor");
		if (window.parent) window.parent.jInsertEditorText(shortcode, $(this).data('sueid'));

		// Close popup
		window.parent.SqueezeBox.close(); 
		// Save shortcode to div
		$result.text(shortcode);
		// Prevent default action
		e.preventDefault();
	});

	// Preview shortcode
	$('#su-generator').on('click', '.su-generator-toggle-preview', function(e) {
		// Prepare data
		var $preview = $('#su-generator-preview'),
			$button = $(this);
                         localStorage.setItem("show_shortcod", 2); 
		// Hide button
		//$button.hide();
		// Show preview box
		$preview.addClass('su-generator-loading').show();
		// Bind updating on settings changes
        bindOnChange();
		// Update preview box
		update_preview(true);
		// Prevent default action
		e.preventDefault();
	});

	// Show short code
	$('#su-generator').on('click', '.su-generator-shortcode-preview', function(e) {
		// Prepare data
		var $preview = $('#su-generator-preview'),
			$button = $(this); 
            localStorage.setItem("show_shortcod", 1);

		// Show preview box
		$preview.addClass('su-generator-loading').show();
        bindOnChange();
		// Update preview box
		show_shortcode(true);
		// Prevent default action
		e.preventDefault();
	});

	var gp_hover_timer;

	// Presets manager - mouseenter
	$('#su-generator').on('mouseenter click', '.su-generator-presets', function() {
		clearTimeout(gp_hover_timer);
		$('.su-gp-popup').show();
	});
	// Presets manager - mouseleave
	$('#su-generator').on('mouseleave', '.su-generator-presets', function() {
		gp_hover_timer = window.setTimeout(function() {
			$('.su-gp-popup').fadeOut(200);
		}, 600);
	});
	// Presets manager - add new preset
	$('#su-generator').on('click', '.su-gp-new', function(e) {
		// Prepare data
		var $container = $(this).parents('.su-generator-presets'),
			$list = $('.su-gp-list'),
			id = new Date().getTime();
		var shortcodea = $selected[0].value;

		// Ask for preset name
		var name = prompt('Please enter a name for new preset', 'New preset');
		// Name is entered
		if (name !== '' && name !== null) {
			// Hide default text
			$list.find('b').hide();
			// Add new option
			$list.append('<span data-id="' + id + shortcodea + '"><em>' + name + '</em><i class="fa fa-times"></i></span>');
			// Perform AJAX request
			add_preset(id, name);
		}
	});
	// Presets manager - load preset
	$('#su-generator').on('click', '.su-gp-list span', function(e) {
		// Prepare data
		var shortcode = $('.su-generator-presets').data('shortcode'),
			id = $(this).data('id'),
            data = localStorage.getItem(id);
	        if(data) {
	        	set(data);
	        }
            // Hide popup
		$('.su-gp-popup').hide();
                
		// Disable hover timer
		clearTimeout(gp_hover_timer);
		// Prevent default action
		e.preventDefault();
		e.stopPropagation();
	});
	// Presets manager - remove preset
	$('#su-generator').on('click', '.su-gp-list i', function(e) {
		// Prepare data
		var $list = $(this).parents('.su-gp-list'),
			$preset = $(this).parent('span'),
			id = $preset.data('id');
		// Remove DOM element
		$preset.remove();
		// Show default text if last preset was removed
		if ($list.find('span').length < 1) $list.find('b').show();
		// Perform ajax request
		remove_preset(id);
		// Prevent <span> action
		e.stopPropagation();
		// Prevent default action
		e.preventDefault();
	});
	function bindOnChange(){    
	    // Bind updating on settings changes
	    $settings.find('input, textarea, select').on('change keyup blur', function() {
	         var showShortcode = localStorage.getItem("show_shortcod");
	         if(showShortcode != undefined && showShortcode == 1){
	            show_shortcode();
	        }else{
	            update_preview();
	        }
	    });
	}
	/**
	 * Create new preset with specified name from current settings
	 */
	function add_preset(id, name) {
		// Prepare shortcode name and current settings
		var settings = get();
        var json_text = JSON.stringify(settings, null, 2);
        var shortcodea = $selected[0].value;
        localStorage.setItem(id + shortcodea , json_text);
		var su_ap = localStorage.getItem(shortcodea);
		
		if(su_ap){
        	var su_ap = jQuery.parseJSON(su_ap)
		}else{
		 var su_ap = {};
		}
        su_ap[id] = name;       
        su_ap = JSON.stringify(su_ap, null, 2)
        localStorage.setItem(shortcodea , su_ap);
	}

	/**
	 * Remove preset by ID
	 */
	function remove_preset(id) {
		// Get current shortcode name
		var shortcode = $('.su-generator-presets').data('shortcode');
		var shortcodea = $selected[0].value;
		// Perform AJAX request
		var shortcode_pre = localStorage.getItem(shortcodea);
		localStorage.removeItem(shortcodea);

		if(shortcode_pre){
			var su_rp = jQuery.parseJSON(shortcode_pre.toString());
			localStorage.removeItem(id);
			id=  String(id).replace(shortcodea,"")
			delete su_rp[id];
			su_rp = JSON.stringify(su_rp, null, 2)
            localStorage.setItem(shortcodea , su_rp);
		}
	}

	function parse() {
		// Prepare data
		var query = $selected.val(),
			prefix = $prefix.val(),
			$settings = $('#su-generator-settings .su-generator-field-container:not(.su-generator-skip) .su-generator-attr'),
			content = $('#su-generator-content').val(),
			result = new String('');
		// Open shortcode
		result += '[' + prefix + query;
		// Add shortcode attributes
		$settings.each(function() {
			// Prepare field and value
			var $this = $(this),
				value = '';
			// Selects
			if ($this.is('select')) value = $this.find('option:selected').val();
			// Other fields
			else value = $this.val();
			// Check that value is not empty
			if (value == null) value = '';
			else if (typeof value === 'array') value = value.join(',');
			// Add attribute
			if (value !== '') result += ' ' + $(this).attr('name') + '="' + $(this).val().toString().replace(/"/gi, "'") + '"';
		});
		// End of opening tag
		result += ']';
		// Wrap shortcode if content presented
		if (content != 'false') result += content + '[/' + prefix + query + ']';
		// Return result
		return result;
	}

	function get() {
		// Prepare data
		var query = $selected.val(),
			$settings = $('#su-generator-settings .su-generator-attr'),
			content = $('#su-generator-content').val(),
			data = {};
		// Add shortcode attributes
		$settings.each(function(i) {
			// Prepare field and value
			var $this = $(this),
				value = '',
				name = $this.attr('name');
			// Selects
			if ($this.is('select')) value = $this.find('option:selected').val();
			// Other fields
			else value = $this.val();
			// Check that value is not empty
			if (value == null) value = '';
			// Save value
			data[name] = value;
		});
		// Add content
		data['content'] = content.toString();
		// Return data
		return data;
	}

	function set(data) {
            data = jQuery.parseJSON(data);
		// Prepare data
		var $settings = $('#su-generator-settings .su-generator-attr'),
			$content = $('#su-generator-content');
		// Loop through settings
		$settings.each(function() {
			var $this = $(this),
				name = $this.attr('name');
			// Data contains value for this field
			if (data.hasOwnProperty(name)) {
				// Set new value
				$this.val(data[name]);
				$this.trigger('keyup').trigger('change').trigger('blur');
			}
		});
		// Set content
		if (data.hasOwnProperty('content')) $content.val(data['content']).trigger('keyup').trigger('change').trigger('blur');
		// Update preview
		update_preview();
	}

	var update_preview_timer,
		update_preview_request;

	function update_preview(forced) {
        var $button = $('#su-generator .su-generator-toggle-preview')
                      
		// Prepare data
		var $preview = $('#su-generator-preview'),
			shortcode = parse(),
			previous = $result.text();
		// Check forced mode
		forced = forced || false;
		// Break if preview box is hidden or preivew stopped (preview isn't enabled)
		if (!$preview.is(':visible')) return;
                    
		// Check shortcode is changed is this is not a forced mode
		if (shortcode === previous && !forced) return;
		// Run timer to filter often calls
		window.clearTimeout(update_preview_timer);
		update_preview_timer = window.setTimeout(function() {
			update_preview_request = $.ajax({
				type: 'POST',
				url: ajaxurl,
				cache: false,
				data: {
					action: 'su_generator_preview',
					shortcode: shortcode
				},
				beforeSend: function() {
					// Abort previous requests
					if (typeof update_preview_request === 'object') update_preview_request.abort();
					// Show loading animation
					$preview.addClass('su-generator-loading').html('');
				},
				success: function(data) {
					// Hide loading animation and set new HTML
					$preview.html(data).removeClass('su-generator-loading');
				},
				dataType: 'html'
			});
		}, 300);
		// Save shortcode to div
		$result.text(shortcode);
	}

	var show_shortcode_timer,
		show_shortcode_request;

	function show_shortcode(forced) {
        var $button = $('#su-generator .su-generator-shortcode-preview')
                      
		// Prepare data
		var $preview = $('#su-generator-preview'),
			shortcode = parse(),
			previous = $result.text();
		// Check forced mode
		forced = forced || false;
		// Break if preview box is hidden or preivew stopped (preview isn't enabled)
		if (!$preview.is(':visible')) return;
                    
		// Check shortcode is changed is this is not a forced mode
		if (shortcode === previous && !forced) return;
		// Run timer to filter often calls
		window.clearTimeout(show_shortcode_timer);
		show_shortcode_timer = window.setTimeout(function() {
			show_shortcode_request = $.ajax({
				type: 'POST',
				url: ajaxurl,
				cache: false,
				data: {
					action: 'su_generator_show_shortcode',
					shortcode: shortcode
				},
				beforeSend: function() {
					// Abort previous requests
					if (typeof show_shortcode_request === 'object') show_shortcode_request.abort();
					// Show loading animation
					$preview.addClass('su-generator-loading').html('');
				},
				success: function(data) {
					// Hide loading animation and set new HTML
					$preview.html(data).removeClass('su-generator-loading');
				},
				dataType: 'html'
			});
		}, 300);
		// Save shortcode to div
		$result.text(shortcode);
	}

});