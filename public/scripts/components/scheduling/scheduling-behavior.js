'use strict';

function SchedulingBehavior($holder) {
	this.$holder = $($holder || document.body);
};

SchedulingBehavior.prototype = {

	bindEvents: function() {

	},

	init: function() {
		this.bindEvents();
	}
};