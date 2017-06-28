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
			LoginBehavior,
			ListEmployees,
			ListContacts,
			ListSchedules,
			EmployeeAdd,
			ContactAdd,
			ScheduleAdd
		];

		initializeComponents(components);
	};

	init();
});