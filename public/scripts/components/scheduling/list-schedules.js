'use strict';

function ListSchedules($holder) {
	this.$holder = $($holder || document.body);
	this.$listSchedulesElement = null;
	this.$listSchedulesBody = null;
	this.service = new ListSchedulesService();
};

ListSchedules.prototype = {

	insertRow: function(index, element) {
		var $tr = $('<tr></tr>');

		$tr.append('<td>' + element['nomeMedico'] + '</td>');
		$tr.append('<td>' + element['especialidadeMedico'] + '</td>');
		$tr.append('<td>' + element['dataConsulta'] + '</td>');
		$tr.append('<td>' + element['horaConsulta'] + '</td>');
		$tr.append('<td>' + element['nomePaciente'] + '</td>');
		$tr.append('<td>' + element['telPaciente'] + '</td>');

		this.$listSchedulesBody.append($tr);
	},

	resetListSchedulesData: function() {
		this.$listSchedulesBody.empty();
	},

	populateSchedulesTable: function(data) {
		this.resetListSchedulesData();
		$.each(data, $.proxy(this.insertRow, this));
	},

	onGetListSchedulesError: function(message) {
		console.log(message);
	},

	onGetListSchedulesSuccess: function(data) {
		this.populateSchedulesTable(data);
	},

	getListSchedulesParams: function() {
		return {};
	},

	onClickListSchedulesTab: function() {
		var params = this.getListSchedulesParams();
		this.service.getSchedules(params)
			.then($.proxy(this.onGetListSchedulesSuccess, this), $.proxy(this.onGetListSchedulesError, this));
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-list-schedules-button]', $.proxy(this.onClickListSchedulesTab, this));
	},

	setListSchedulesBody: function() {
		this.$listSchedulesBody = this.$listSchedulesElement.find('tbody');
	},

	setListSchedulesElement: function() {
		this.$listSchedulesElement = this.$holder.find('[data-list-schedules-table]');
	},

	init: function() {
		this.setListSchedulesElement();
		this.setListSchedulesBody();
		this.bindEvents();
	}
};