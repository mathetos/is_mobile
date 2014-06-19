// Small script to detect mobile browsers and toggle the visibility of specified elements.
		(function($){
			var isMobile = function(_, ua){
				_.Android = ua.match(/Android/i);
				_.BlackBerry = ua.match(/BlackBerry/i);
				_.iOS = ua.match(/iPhone|iPad|iPod/i);
				_.Opera = ua.match(/Opera Mini/i);
				_.Windows = ua.match(/IEMobile/i);
				_.Palm = ua.match(/webOS/i);
				_.any = _.Android || _.BlackBerry || _.iOS || _.Opera || _.Windows || _.Palm;
				_.selector = {
					hide: '.is-desktop',
					show: '.is-mobile'
				};
				_.show = function(){
					$(_.selector.hide).hide();
					$(_.selector.show).show();
				};
				_.hide = function(){
					$(_.selector.show).hide();
					$(_.selector.hide).show();
				};
				_.toggle = function(clause){
					clause = typeof clause !== 'boolean' ? _.any : clause;
					if (clause) _.show();
					else _.hide();
				};
				return _;
			}({}, navigator.userAgent);
		})(jQuery);