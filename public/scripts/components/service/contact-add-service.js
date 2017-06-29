'use strict';

function ContactAddService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ContactAddService.prototype, Service.prototype, {

	addContact: function(params) {

		var serviceUrl = 'http://cleanic.scienceontheweb.net/cleanic/public/api/contact-add.php',
			dfd = $.Deferred(),
			_this = this;

		this.$loader.show();

		this.request(serviceUrl, params, { method: 'POST' }).then(function(res) {

			_this.$loader.hide();

			if (res.wasSuccessful) {
				dfd.resolve(res.data);
			}
			else {
				dfd.reject(res.message);
			}
		});

		return dfd.promise();
	}
});