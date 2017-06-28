'use strict';

function Service() {

}

Service.prototype = {

	requestFailed: function() {
		//TODO
	},

	wrapParams: function(data) {
		return data;
	},

	request: function(url, data, ajaxOptions) {

		var defaultOptions = {
			url: url,
			data: this.wrapParams(data),
			dataType: 'json'
		};

		return $.ajax($.extend(defaultOptions, ajaxOptions))
				.fail($.proxy(this.requestFailed, this));
	}
};