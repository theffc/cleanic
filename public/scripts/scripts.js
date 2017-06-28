'use strict';

$(document).ready(function() {

	function initializeComponents(components) {
		$.each(components, function(index, component) {
			(new component()).init();
		});
	};

	function init() {
		var components = [
			MainPaginator,
			GalleryBehavior,
			SchedulingBehavior,
			LoginBehavior,
			RegisterEmployee,
			ListEmployees,
			ListContacts,
			ListSchedules
		];

		initializeComponents(components);
	};

	init();
});