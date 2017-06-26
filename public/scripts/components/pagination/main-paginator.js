'use strict';

function MainPaginator($holder) {
	this.$holder = $($holder || document.body);
	this.$navElements = [];
	this.$mainElements = [];
};

MainPaginator.prototype = {

	setNewPage: function(anchor) {
		this.$mainElements.map(function(index, element) {
			var $element = $(element);

			if ('#' + $element.attr('id') === anchor) {
				$element.data('main-paginator', 'shown');
				$element.addClass('main-0001--active');
			}
		});
	},

	resetPages: function() {
		this.$mainElements.map(function(index, element) {
			var $element = $(element);

			if ($element.data('main-paginator') === 'shown') {
				$element.data('main-paginator', 'hidden');
				$element.removeClass('main-0001--active');
			}
		});
	},

	setNav: function(anchor) {
		this.$navElements.map(function(index, element) {
			var $element = $(element),
				$holder = $element.closest('[data-nav-holder-paginator]');

			if ($element.attr('href') === anchor) {
				$holder.addClass('active');
			}
		});
	},

	resetNav: function() {
		this.$navElements.map(function(index, element) {
			var $element = $(element),
				$holder = $element.closest('[data-nav-holder-paginator]');

			if ($holder.hasClass('active')) {
				$holder.removeClass('active');
			}
		});
	},

	paginate(anchor) {
		this.resetNav();
		this.setNav(anchor);
		this.resetPages();
		this.setNewPage(anchor);
	},

	onClickPaginator: function(event) {
		var $element,
			anchor;

		event.preventDefault();
		$element = $(event.target);
		anchor = $element.attr('href');
		this.paginate(anchor);
	},

	bindEvents: function() {
		this.$holder.on(
			'click', '[data-nav-paginator]', $.proxy(this.onClickPaginator, this)
		);
	},

	setNavElements: function() {
		this.$navElements = this.$holder.find('[data-nav-paginator]');
	},

	setMainElements: function() {
		this.$mainElements = this.$holder.find('[data-main-paginator]');
	},

	setElements: function() {
		this.setMainElements();
		this.setNavElements();
	},

	init: function() {
		this.setElements();
		this.bindEvents();
	}
};