'use strict';

function ListEmployees($holder) {
	this.$holder = $($holder || document.body);
	this.$listEmployeesElement = null;
};

ListEmployees.prototype = {

	onClickListEmployeesTab: function() {
		//TODO populate table
		//Initialize Loader
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-list-employees-button]', $.proxy(this.onClickListEmployeesTab, this));
	},

	setListEmployeesElement: function() {
		this.$listEmployeesElement = this.$holder.find('[data-list-employees-table]');
	},

	init: function() {
		this.setListEmployeesElement();
		this.bindEvents();
	}
};