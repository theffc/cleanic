'use strict';

function LoginBehavior($holder) {
	this.$holder = $($holder || document.body);
	this.$loginForm = null;
	this.service = new LoginService();
};

LoginBehavior.prototype = {

	onLoginError: function() {

	},

	onLoginSuccess: function() {

	},

	onSubmitLogin: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
		//TODO chamada de serviço
	},

	bindEvents: function() {
		this.$loginForm.on('submit', $.proxy(this.onSubmitLogin, this));
	},

	setLoginForm: function() {
		this.$loginForm = this.$holder.find('[data-login-form]');
	},

	init: function() {
		this.setLoginForm();
		this.bindEvents();
	}
};