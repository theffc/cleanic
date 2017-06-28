'use strict';

function ContactAdd($holder) {
	this.$holder = $($holder || document.body);
	this.service = new ContactAddService();
	this.helper = new HelperFs();
};

ContactAdd.prototype = {

	onContactAddError: function(message) {
		$('#error-modal').modal('show');
	},

	onContactAddSuccess: function(data) {
		$('#success-modal').modal('show');
	},

	doContactAdd: function($form) {
		var params;
		params = JSON.stringify(this.helper.serializeFormJson($form));

		this.service.addContact(params)
			.then($.proxy(this.onContactAddSuccess, this), $.proxy(this.onContactAddError, this));
	},

	onSubmitNewContact: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
		this.doContactAdd($element);
	},

	bindEvents: function() {
		this.$holder.on('submit', '[data-contact-add-form]', $.proxy(this.onSubmitNewContact, this));
	},

	init: function() {
		this.bindEvents();
	}
};