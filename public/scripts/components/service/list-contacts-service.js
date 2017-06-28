'use strict';

function ListContactsService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ListContactsService.prototype, Service.prototype, {

	getContacts: function(params) {

		var serviceUrl = '/cleanic/public/api/contact-list.php',
			dfd = $.Deferred(),
			_this = this;

		this.$loader.show();

		this.request(serviceUrl, params, {}).then(function(res) {

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