'use strict';

function LoginBehavior($holder) {
	this.$holder = $($holder || document.body);
};

LoginBehavior.prototype = {

	bindEvents: function() {

	},

	init: function() {
		this.bindEvents();
	}
};