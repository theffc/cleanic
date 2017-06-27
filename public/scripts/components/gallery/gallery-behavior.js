'use strict';

function GalleryBehavior($holder) {
	this.$holder = $($holder || document.body);
	this.$galleryElements = [];
};

GalleryBehavior.prototype = {

	onMouseLeave: function(event) {
		var element = event.target;
		element.classList.remove('gallery-0001__item--active');
	},

	onMouseEnter: function(event) {
		var element = event.target;
		element.classList.add('gallery-0001__item--active');
	},

	bindEvents: function() {
		var _this = this;

		$.each(this.$galleryElements, function(index, element) {
			element.addEventListener('mouseenter', _this.onMouseEnter);
			element.addEventListener('mouseleave', _this.onMouseLeave);
		});
	},

	setGalleryElements: function() {
		this.$galleryElements = this.$holder.find('[data-gallery-item]');
	},

	init: function() {
		this.setGalleryElements();
		this.bindEvents();
	}
};