'use strict';

function CepService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(CepService.prototype, Service.prototype, {

	getCepInfo: function(params) {

		var serviceUrl = '/cleanic/public/api/cep-search.php',
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