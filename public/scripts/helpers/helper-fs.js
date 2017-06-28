'use strict';

function HelperFs() {

};

HelperFs.prototype = {

	serializeFormJson: function($form) {
		var obj = {},
			formArray = $form.serializeArray();

		for (var i = 0; i < formArray.length; i++) {
			obj[formArray[i]['name']] = formArray[i]['value'];
		}
		return obj;
	}
};