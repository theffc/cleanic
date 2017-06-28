'use strict';

function ListContacts($holder) {
	this.$holder = $($holder || document.body);
	this.$listContactsElement = null;
	this.$listContactsBody = null;
	this.service = new ListContactsService();
};

ListContacts.prototype = {

	insertRow: function(index, element) {
		var $tr = $('<tr></tr>');

		$tr.append('<td>' + element['nomeCliente'] + '</td>');
		$tr.append('<td>' + element['emailCliente'] + '</td>');
		$tr.append('<td>' + element['motivoContato'] + '</td>');
		$tr.append('<td>' + element['mensagemContato'] + '</td>');

		this.$listContactsBody.append($tr);
	},

	resetListContactsData: function() {
		this.$listContactsBody.empty();
	},

	populateContactsTable: function(data) {
		this.resetListContactsData();
		$.each(data, $.proxy(this.insertRow, this));
	},

	onGetListContactsError: function(message) {
		console.log(message);
	},

	onGetListContactsSuccess: function(data) {
		this.populateContactsTable(data);
	},

	getListContactsParams: function() {
		return {};
	},

	onClickListContactsTab: function() {
		var params = this.getListContactsParams();
		this.service.getContacts(params)
			.then($.proxy(this.onGetListContactsSuccess, this), $.proxy(this.onGetListContactsError, this));
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-list-contacts-button]', $.proxy(this.onClickListContactsTab, this));
	},

	setListContactsBody: function() {
		this.$listContactsBody = this.$listContactsElement.find('tbody');
	},

	setListContactsElement: function() {
		this.$listContactsElement = this.$holder.find('[data-list-contacts-table]');
	},

	init: function() {
		this.setListContactsElement();
		this.setListContactsBody();
		this.bindEvents();
	}
};