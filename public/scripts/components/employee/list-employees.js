'use strict';

function ListEmployees($holder) {
	this.$holder = $($holder || document.body);
	this.$listEmployeesElement = null;
	this.$listEmployeesBody = null;
	this.service = new ListEmployeesService();
};

ListEmployees.prototype = {

	insertRow: function(index, element) {
		var $tr = $('<tr></tr>');

		$tr.append('<td>' + element['nomeCliente'] + '</td>');
		$tr.append('<td>' + element['emailCliente'] + '</td>');
		$tr.append('<td>' + element['motivoContato'] + '</td>');
		$tr.append('<td>' + element['mensagemContato'] + '</td>');

		this.$listEmployeesBody.append($tr);
	},

	resetListEmployeesData: function() {
		this.$listEmployeesBody.empty();
	},

	populateEmployeesTable: function(data) {
		this.resetListEmployeesData();
		$.each(data, $.proxy(this.insertRow, this));
	},

	onGetListEmployeesError: function(message) {
		console.log(message);
	},

	onGetListEmployeesSuccess: function(data) {
		this.populateEmployeesTable(data);
	},

	getListEmployeesParams: function() {
		return {};
	},

	onClickListEmployeesTab: function() {
		var params = this.getListEmployeesParams();
		this.service.getEmployees(params)
			.then($.proxy(this.onGetListEmployeesSuccess, this), $.proxy(this.onGetListEmployeesError, this));
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-list-employees-button]', $.proxy(this.onClickListEmployeesTab, this));
	},

	setListEmployeesBody: function() {
		this.$listEmployeesBody = this.$listEmployeesElement.find('tbody');
	},

	setListEmployeesElement: function() {
		this.$listEmployeesElement = this.$holder.find('[data-list-employees-table]');
	},

	init: function() {
		this.setListEmployeesElement();
		this.setListEmployeesBody();
		this.bindEvents();
	}
};