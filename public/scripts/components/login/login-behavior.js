'use strict';

function LoginBehavior($holder) {
	this.$holder = $($holder || document.body);
	this.$loginForm = null;
	this.service = new LoginService();
	this.helper = new HelperFs();
};

LoginBehavior.prototype = {

	onLoginError: function(message) {
		console.log(message);
	},

	onLoginSuccess: function() {
		window.location.href = '/cleanic/public/admin';
	},

	doLogin: function($form) {
		var params;
		params = JSON.stringify(this.helper.serializeFormJson($form));

		this.service.loginUser(params)
			.then($.proxy(this.onLoginSuccess, this), $.proxy(this.onLoginError, this));
	},

	onSubmitLogin: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
		this.doLogin($element);
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