/**
 * wtNav navigation jQuery plugin.
 *
 * @author WingArt Team
 * @version 1.0
 * @required Modernizr
 */
;(function($){

	'use strict';

	/**
	 * Base plugin configuration.
	 *
	 * @var private Object _baseConfig
	 */
	var _baseConfig = {
		cssPrefix: '',
		mobileBreakpoint: 1140,
		classes: {
			desktopActive: 'selected',
			tabletActive: 'tapped',
			mobileActive: 'tapped',
			reverse: 'reverse'
		},
		mobileAnimation: {
			easing: 'easeOutQuint',
			speed: 350
		}
	}

	/**
	 * Contains info about text derection.
	 *
	 * @var private Boolean _isRTL
	 */
	var _isRTL = getComputedStyle(document.body).direction === 'rtl';

	/**
	 * Adds class, if the sub-menu is not placed into the container.
	 *
	 * @param jQuery subMenu
	 * @param String reverseClass
	 *
	 * @return undefined
	 */
	function smartPosition(subMenu, reverseClass){

		var width = subMenu.outerWidth(),
			wWidth = $(window).width();

		if(_isRTL){

			if(subMenu.offset().left <= 0) subMenu.addClass(reverseClass);

		}
		else{

			var offset = subMenu.offset().left;

			if(offset + width > wWidth) subMenu.addClass(reverseClass);

		}

	}

	/**
	 * Navigation Constructor function.
	 *
	 * @param Object options
	 * @param jQuery $element
	 *
	 */
	function Navigation(options, $element){

		var _w = $(window),
			_self = this;

		this.config = $.extend({}, _baseConfig, options);

		Object.defineProperties(this, {

			element : {

				get: function(){

					return $element;

				}

			}

		});

		_w.on('resize.wtNav', function(){

			if(_self.timeOutId) clearTimeout(_self.timeOutId);

			_self.timeOutId = setTimeout(function(){

				_self._refresh();

			}, 100);

		});

		this._refresh();

	}

	/**
	 * Initialize or refresh the navigation.
	 *
	 * @return undefined
	 */
	Navigation.prototype._refresh = function(){

		if($(window).width() <= this.config.mobileBreakpoint){

            if (this.state) this.state.destroy();

            this.state = new MobileState(this.config, this.element);
            this.state.init();

        } else {
            if (this.state) this.state.destroy();
            this.state = new DesktopState(this.config, this.element);
            this.state.init();

        }

    }


	/**
	 * AbstractState constructor function. Defines base properties for all of the states.
	 *
	 * @param Object config
	 * @param jQuery $element
	 *
	 */
	function AbstractState(config, $element){

		Object.defineProperties(this, {

			/**
			 * Defines active class for the current state.
			 *
			 * @var public string
			 */
			activeClass: {

				get: function(){

					return this.prefix + config.classes.desktopActive;

				},
				configurable: true,
				enumerable: true

			},

			/**
			 * Defines reverse class for the current state.
			 *
			 * @var public string
			 */
			reverseClass: {

				get: function(){

					return this.prefix + config.classes.reverse;

				},
				configurable: true,
				enumerable: true

			},

			/**
			 * Link to the main navigation jQuery element.
			 *
			 * @var public jQuery
			 */
			element: {

				get: function(){

					return $element;

				},
				configurable: false,
				enumerable: false

			},

			/**
			 * Defines css prefix.
			 *
			 * @var public string
			 */
			classPrefix: {

				get: function(){

					return '.' + config.cssPrefix;

				},
				configurable: false,
				enumerable: false

			},

			/**
			 * Defines css prefix.
			 *
			 * @var public string
			 */
			prefix: {

				get: function(){

					return config.cssPrefix;

				}

			},

			/**
			 * Link to the configuration object.
			 *
			 * @var public string
			 */
			config: {

				get: function(){

					return config;

				},
				configurable: false,
				enumerable: false

			}

		});

	}

	/**
	 * DesktopState constructor function.
	 *
	 * @param Object config
	 * @param jQuery $element
	 *
	 */
	function DesktopState(config, $element){

		AbstractState.call(this, config, $element);

	}

	/**
	 * Initialization of Desktop navigation state.
	 *
	 * @return undefined
	 */
	DesktopState.prototype.init = function(){

		var _self = this;

		_self.element.on('mouseenter.wtNavDesktop', _self.classPrefix + 'has-children, .menu-item-has-children', function(e){

			var $this = $(this),
				subMenu = $this.children(_self.classPrefix + 'sub-menu, .sub-menu');

			if(!$this.hasClass(_self.activeClass)){

				if(subMenu.length){

					if(subMenu.data('timeOutId')) clearTimeout(subMenu.data('timeOutId'));

					smartPosition(subMenu, _self.reverseClass);
				}

				$this.addClass(_self.activeClass);

			}

			e.stopPropagation();
			e.preventDefault();

		});

		_self.element.on('mouseleave.wtNavDesktop', _self.classPrefix + 'has-children.' + _self.activeClass + ', .menu-item-has-children.' + _self.activeClass, function(e){

			var $this = $(this);

			$this.removeClass(_self.activeClass);

			e.preventDefault();

		});

		_self.element.on('mouseleave.wtNavDesktop', function(e){

			$(this).find(_self.classPrefix + 'has-children.' + _self.activeClass + ', .menu-item-has-children.' + _self.activeClass)
					.removeClass(_self.activeClass);

			$(this).find('.' + _self.reverseClass).each(function(i, el){

				var $this = $(el);

				$this.data('timeOutId', setTimeout(function(){

					$this.removeClass(_self.reverseClass);

				}, 350));

			});

			e.stopPropagation();
			e.preventDefault();

		});

	}

	/**
	 * Destroy-function for the Desktop state.
	 *
	 * @return undefined.
	 */
	DesktopState.prototype.destroy = function(){

		this.element.off('.wtNavDesktop');
		this.element.find(this.classPrefix + this.activeClass).removeClass(this.activeClass);

	}


	/**
	 * TabletState constructor function.
	 *
	 * @param Object config
	 * @param jQuery $element
	 *
	 */
	function TabletState(config, $element){

		AbstractState.call(this, config, $element);

		/**
		 * Defines active class for the Tablet state.
		 *
		 * @var
		 */
		Object.defineProperty(this, 'activeClass', {

			get: function(){

				return this.prefix + config.classes.tabletActive;

			},
			configurable: false

		});

	}

	/**
	 * Initialization of the Tablet navigation state.
	 *
	 * @return undefined
	 */
	TabletState.prototype.init = function(){

		var _self = this,
			_nav = this.element,
			preventedClass = this.prefix + 'prevented';

		_nav.on('click.wtNavTablet', this.classPrefix + 'has-children > a, .menu-item-has-children > a', function(e){

			var $link = $(this);

			_self.closeAllSubMenus($link.parents('.' + _self.activeClass));

			if(!$link.hasClass(preventedClass)){

				$link.addClass(preventedClass);

				var $this = $link.parent(),
					subMenu = $this.children(_self.classPrefix + 'sub-menu, .sub-menu');

				if(!$this.hasClass(_self.activeClass)){

					if(subMenu.length){

						if(subMenu.data('timeOutId')) clearTimeout(subMenu.data('timeOutId'));
						smartPosition(subMenu, _self.reverseClass);

					}

					$this.addClass(_self.activeClass);

				}

				e.stopPropagation();
				e.preventDefault();

			}

		});

		$(document).on('click.wtNavTablet', function(e){

			e.stopPropagation();

			if(!$(e.target).closest(_self.element).length) _self.closeAllSubMenus();

		});

	}

	/**
	 * It closes all open sub-menus, except sub-menu which is passed as an argument.
	 *
	 * @param jQuery except
	 *
	 * @return undefined
	 */
	TabletState.prototype.closeAllSubMenus = function(except){

		var _self = this,
			selectedItems = _self.element.find('.' + _self.activeClass),
			preventedClass = this.prefix + 'prevented',
			preventedCClass = this.classPrefix + 'prevented';

		if(except) selectedItems = selectedItems.not(except);

		if(selectedItems.length){

			var openedSubMenus = selectedItems.children(_self.classPrefix + 'sub-menu, .sub-menu');

			if(openedSubMenus.length){

				openedSubMenus.each(function(i, el){

					var $currentSubMenu = $(el);

					$currentSubMenu.data('timeOutId', setTimeout(function(){

						$currentSubMenu.removeClass(_self.reverseClass);

					}, 350));

				});

			}

			selectedItems
				.removeClass(_self.activeClass)
				.children(preventedCClass).removeClass(preventedClass);

		}

	}

	/**
	 * Destroy-function for the Tablet state.
	 *
	 * @return undefined
	 */
	TabletState.prototype.destroy = function(){

		this.element.off('.wtNavTablet');
		this.closeAllSubMenus();

	}

	/**
	 * MobileState constructor function.
	 *
	 * @param Object config
	 * @param jQuery $element
	 *
	 */
	function MobileState(config, $element){

		AbstractState.call(this, config, $element);

		/**
		 * Defines active class for the Mobile state.
		 *
		 * @var
		 */
		Object.defineProperty(this, 'activeClass', {

			get: function(){

				return this.prefix + config.classes.mobileActive;

			},
			configurable: false

		});

	}

	/**
	 * Initialization of mobile navigation state.
	 *
	 * @return undefined
	 */
	MobileState.prototype.init = function(){

		var _self = this,
			navBtnClass = _self.prefix + 'mobile-nav-btn';

		_self.element.add(_self.element.find(_self.classPrefix + 'sub-menu, .sub-menu')).hide();

		if(!_self.element.prev('.' + navBtnClass).length){

			var $navBtn = $('<button></button>', {
				class: navBtnClass
			}).insertBefore(_self.element);

			$navBtn.on('click.wtNavMobile', function(e){

				$(this).toggleClass(_self.prefix + 'opened');

				_self.element
					.stop()
					.slideToggle({
						duration: _self.config.mobileAnimation.speed,
						easing: _self.config.mobileAnimation.easing
					});

				e.stopPropagation();
				e.preventDefault();

			});

		}

		_self.element.on('click.wtNavMobile', this.classPrefix + 'has-children > a, .menu-item-has-children > a', function(e){

			var $link = $(this),
				preventedClass = _self.prefix + 'prevented';

			if(!$link.hasClass(preventedClass)){

				$link.addClass(preventedClass);

				var $this = $link.parent();

				$this
					.addClass(_self.activeClass)
					.children(_self.classPrefix + 'sub-menu, .sub-menu')
					.stop()
					.slideDown({
						duration: _self.config.mobileAnimation.speed,
						easing: _self.config.mobileAnimation.easing
					})
					.parent()
					.siblings('.' + _self.activeClass)
					.removeClass(_self.activeClass)
					.children('.' + preventedClass)
					.removeClass(preventedClass)
					.siblings(_self.classPrefix + 'sub-menu, .sub-menu')
					.stop()
					.slideUp({
						duration: _self.config.mobileAnimation.speed,
						easing: _self.config.mobileAnimation.easing
					});

				e.preventDefault();
				e.stopPropagation();

			}

		});

	}

	/**
	 * Destroy-function for the Mobile state.
	 *
	 * @return undefined
	 */
	MobileState.prototype.destroy = function(){

		this.element
			.show()
			.off('.wtNavMobile')
			.prev(this.classPrefix + 'mobile-nav-btn')
			.removeClass(this.prefix + 'opened')
			.end()
			.find('.' + this.activeClass)
			.removeClass(this.activeClass)
			.end()
			.find(this.classPrefix + 'prevented')
			.removeClass(this.prefix + 'prevented')
			.end()
			.find(this.classPrefix + 'sub-menu, .sub-menu')
			.show();

	}


	$.fn.wtNav = function(options){

		return this.each(function(i, el){

			var $this = $(this);

			if(!$this.data('wtNav')){

				$this.data('wtNav', new Navigation(options, $this));

			}

		});

	}

})(jQuery);
