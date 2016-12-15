/*
*	Author: Guille Rodriguez Gonzalez (guille.rodriguez.gonzalez@gmail.com)
*	Date: 20/07/2016
*	Description: Library for print the length of an input or textarea like bootstrap-maxlength library do, but with this library bootstrap is not needed. Just jQuery
*	License: MIT
*/
(function($){
	$.fn.extend({
		charcounter: function(inputConfig) {
			// Setting configuration
			var defaultConfig = {
				normalClass: 'charcounter-success ',
				warningClass: 'charcounter-warning ',
				limitReachedClass: 'charcounter-danger ', 
				createDefaultClasses: true,
				placement: 'bottom',
				fontfamily: 'Tahoma',
				fontsize: '10px',
				fontbold: true,
				fontcolor: '#FFFFFF',
				separator: ' / ',
				ccDebug: false,
				changeBorderColor: false,
				warningBorderColorClass: 'charcounter-warning-border',
				errorBorderColorClass: 'charcounter-error-border',
				showLimitOrWarning: 'limit'
			};
			var config = $.extend(defaultConfig, inputConfig);
			if (config.ccDebug) { console.log("Loaded config"); }
			
			// Creating default styles
			if ( config.createDefaultClasses === true ) {
				var cssClasses = ".charcounter-success { background-color: #4CAE4C; } ";
					cssClasses+= ".charcounter-warning { background-color: #FF9C00; } ";
					cssClasses+= ".charcounter-danger { background-color: #FF0100; } ";
					cssClasses+= ".charcounter-warning-border { border-color: #FF9C00 !important;}";
					cssClasses+= ".charcounter-error-border { border-color: #FF0100 !important;}";
				
				var style = document.createElement('style');
				style.type = 'text/css';
				style.innerHTML = cssClasses;
				
				document.getElementsByTagName('head')[0].appendChild(style);
				if ( config.ccDebug ) { console.log("Created default styles: "+style.innerHTML);}
			}
			
			if (config.ccDebug) { console.log("Loaded styles"); }
			// Creating label and setting config if label not exists (length == 0)
 			if ( $("#charcounter-label").length == 0 ) {
				$('body').append("<span id='charcounter-label' style='display:none; position: absolute; z-index: 2000; vertical-align:middle; text-align: center; padding: 3px 3px 3px 3px; border-radius: 2.5px; '></span>");
				$("#charcounter-label").css('font-family',config.fontfamily);
				$("#charcounter-label").css('font-size',config.fontsize);
				$("#charcounter-label").css('color',config.fontcolor);
				
				if (config.fontbold) { $("#charcounter-label").css('font-weight','bold'); }
				if (config.ccDebug) { console.log("Loaded label"); }				
			}
			
			function ccUpdatePosition($ccField) {
				// Generating new position
				var newAbsolutePositionTop = "";
				var newAbsolutePositionLeft= "";
				
				switch(config.placement) {
					case 'bottom':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) + parseFloat($ccField.height()) + 5 ;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) - (parseFloat($ccField.width())/2) - (parseFloat($("#charcounter-label").width())/2) + 3 ;
					break;
					case 'top':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) - parseFloat($("#charcounter-label").height()) - 5;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) - (parseFloat($ccField.width())/2) - (parseFloat($("#charcounter-label").width())/2) + 3 ;
					break;
					
					case 'left':
						newAbsolutePositionTop = parseFloat($ccField.offset().top);
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) - parseFloat($("#charcounter-label").width()) - 7;
					break;
					case 'right':
						newAbsolutePositionTop = parseFloat($ccField.offset().top);
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) + 5;
					break;
					
					case 'bottom-right':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) + parseFloat($ccField.height()) + 5 ;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) - parseFloat($("#charcounter-label").width()) - 2;
					break;
					
					case 'bottom-left':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) + parseFloat($ccField.height()) + 5 ;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left);
					break;
					
					case 'top-left':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) - parseFloat($("#charcounter-label").height()) - 5;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left);
					break;
					
					case 'top-right':
						newAbsolutePositionTop = parseFloat($ccField.offset().top) - parseFloat($("#charcounter-label").height()) - 5;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) - parseFloat($("#charcounter-label").width()) - 2;
					break;
					default:
						newAbsolutePositionTop = parseFloat($ccField.offset().top) + parseFloat($ccField.height()) + 5 ;
						newAbsolutePositionLeft= parseFloat($ccField.offset().left) + parseFloat($ccField.width()) - (parseFloat($ccField.width())/2) - (parseFloat($("#charcounter-label").width())/2) + 3 ;
					break;
				}
				
				if (config.ccDebug) { 
					console.log("Field top = "+$ccField.offset().top+" left = "+$ccField.offset().left+" width = "+$ccField.width()+" height = "+$ccField.height());
					console.log("Label width = "+$("#charcounter-label").width()+" height = "+$("#charcounter-label").height()+" --> Placement top = "+newAbsolutePositionTop+" , left = "+newAbsolutePositionLeft); 
				}
				
				// Setting new position 
				$("#charcounter-label").css('top',newAbsolutePositionTop);
				$("#charcounter-label").css('left',newAbsolutePositionLeft);
			}

			function ccUpdate($ccField) {
				
				var maxlengthDefined = $ccField.prop('maxlength');
				var warnlengthDefined= $ccField.attr('warnlength');
				var valueLength = $ccField.val().length;
				
				// Setting value
				var showLabel = false;
				if ( maxlengthDefined != null && maxlengthDefined !== undefined && maxlengthDefined != -1 ) {
					if (config.showLimitOrWarning == 'warning' && warnlengthDefined != null && warnlengthDefined !== undefined && warnlengthDefined!=-1) {
						$("#charcounter-label").text(valueLength + config.separator + warnlengthDefined);
					} else {
						$("#charcounter-label").text(valueLength + config.separator + maxlengthDefined);
					}
					showLabel = true;
				} else if ( warnlengthDefined != null && warnlengthDefined !== undefined && warnlengthDefined != -1) {
					$("#charcounter-label").text(valueLength + config.separator + warnlengthDefined);
					showLabel = true;
				}
				// Update position
				ccUpdatePosition($ccField);
				// Setting colors
				if ( maxlengthDefined != null && maxlengthDefined !== undefined && maxlengthDefined != -1 && valueLength >= maxlengthDefined ) {
					$("#charcounter-label").removeClass();
					$("#charcounter-label").addClass(config.limitReachedClass);
					if( config.changeBorderColor === true ) { 
						if (valueLength > maxlengthDefined) {
							$ccField.addClass(config.errorBorderColorClass); 
						}
					}
				} else if ( warnlengthDefined != null && warnlengthDefined !== undefined && warnlengthDefined != -1 && valueLength > warnlengthDefined ) {
					$("#charcounter-label").removeClass();
					$("#charcounter-label").addClass(config.warningClass);
					if( config.changeBorderColor === true ) { $ccField.addClass(config.warningBorderColorClass); }
				} else {
					$("#charcounter-label").removeClass();
					$("#charcounter-label").addClass(config.normalClass);
					if( config.changeBorderColor === true ) { $ccField.removeClass(config.warningBorderColorClass); $ccField.removeClass(config.errorBorderColorClass); }
				}

				if ( showLabel ) { $("#charcounter-label").show(); }
			}
			
			return this.each( function() {
				var $this = $(this);
				var warnlength = $this.attr('warnlength');
				var maxlength = $this.prop('maxlength');
				var value = $this.val();
				if (config.ccDebug) { console.log("Found new element "+$this.prop('name')+" warnlength == "+warnlength+ " maxlength == "+maxlength); }
				
				// Check if need to show charcounter
				if ( (warnlength != null && warnlength !== undefined && warnlength != -1 ) || (maxlength != null && maxlength !== undefined && maxlength != -1 ) ) {
					//
					$this.keypress( function() {
						ccUpdate($this);
					});
					$this.keyup( function() {
						ccUpdate($this);
					});
					$this.focus( function() {
						ccUpdate($this);
					});
					$this.blur( function() {
						$("#charcounter-label").hide();
					});
					
					// Lets change bordercolor to tell user the status of the input when input has text before apply library (~ edit a form with data)
					if( config.changeBorderColor === true ) {
						if (config.ccDebug) { console.log("Checking class for input with value = " +value+" maxlength = "+maxlength+" warnlength = "+warnlength); }
						if ( maxlength != null && maxlength !== undefined && maxlength != -1 && value != null && value != undefined && value.length > maxlength ) {
							$this.addClass(config.errorBorderColorClass);
							if (config.ccDebug) { console.log("Setting border color error"); }
						} else if (warnlength != null && warnlength !== undefined && warnlength != -1 && value != null && value != undefined && value.length > warnlength) {
							$this.addClass(config.warningBorderColorClass); 
							if (config.ccDebug) { console.log("Setting border color warning"); }
						}
					}
				}
			});
			if (config.ccDebug) { console.log("jQuery plugin `charcounter` loaded correctly ");}
		}
	});
}(jQuery));