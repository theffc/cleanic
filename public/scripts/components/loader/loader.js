'use strict';

function Loader(selector) {
	this.$loader = $(selector);
};

Loader.prototype = {

	show: function() {
		this.$loader.removeClass('hidden');
	},

	hide: function() {
		this.$loader.addClass('hidden');
	}
};