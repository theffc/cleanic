<form class="form-0001" data-register-employee-form>
	<fieldset>
		<h3 class="">Dados Pessoais:</h3>
		<input type="hidden" class="form-control" name="idFunc" id="employee-id" value="0" required>
		<div class="form-group">
		  <label for="employee-name">Nome:<span class="color-red"> *</span></label>
		  <input type="text" class="form-control" name="nomeFunc" id="employee-name" required>
		</div>
		<div class="form-group">
			<label for="employee-birthday">Data de nascimento:<span class="color-red"> *</span></label>
			<input type="date" class="form-control" name="dataNascFunc" id="employee-birthday" required>
		</div>
		<div class="form-group">
			<label for="employee-gender-m">Sexo:<span class="color-red"> *</span></label>
		</div>
		<div class="form-group">
			<label for="employee-gender-m">Masculino:</label>
			<input type="radio" class="" name="sexoFunc" id="employee-gender-m" value="M" required>
			<label for="employee-gender-f">Feminino:</label>
			<input type="radio" class="" name="sexoFunc" id="employee-gender-f" value="F" required>
		</div>
		<div class="form-group">
		  <label for="employee-status">Estado civil:<span class="color-red"> *</span></label>
		  <select class="form-control" name="estadoCivilFunc" id="employee-status" required>
		    <option></option>
		    <option>Solteiro(a)</option>
		    <option>Casado(a)</option>
		    <option>Viúvo(a)</option>
		    <option>Divorciado(a)</option>
		  </select>
		</div>
		<div class="form-group">
		  <label for="employee-job">Cargo:<span class="color-red"> *</span></label>
		  <select class="form-control" name="cargoFunc" id="employee-job" data-employee-job required>
		    <option></option>
		    <option>Medico</option>
		    <option>Enfermeiro</option>
		    <option>Secretario</option>
		    <option>Outro</option>
		  </select>
		</div>
		<div class="form-group hidden" data-employee-spec>
			<label for="employee-medical-spec">Especialidade Médica:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" name="especialidadeFunc" id="employee-medical-spec" novalidate="novalidate">
		</div>
	</fieldset>

	<fieldset>
		<h3 class="">Documentos:</h3>
		<div class="form-group">
			<label for="employee-cpf">CPF:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" name="CPF" id="employee-cpf" required>
		</div>
		<div class="form-group">
			<label for="employee-rg">RG:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" name="RG" id="employee-rg" required>
		</div>
		<div class="form-group">
			<label for="employee-other-doc">Outro:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" name="docsFunc" id="employee-other-doc" required>
		</div>
	</fieldset>
	<fieldset>
		<h3 class="">Endereço:</h3>
		<div class="form-group">
			<label for="employee-cep">CEP:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-cep" maxlength="8" data-employee-cep required>
		</div>
		<div class="form-group">
		  <label for="employee-street-type">Tipo de logradouro:<span class="color-red"> *</span></label>
		  <select class="form-control" id="employee-street-type" required>
		    <option></option>
		    <option>Rua</option>
		    <option>Avenida</option>
		    <option>Praça</option>
		  </select>
		</div>
		<div class="form-group">
			<label for="employee-street">Logradouro:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-street" data-employee-street required>
		</div>
		<div class="form-group">
			<label for="employee-address-num">Número:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-address-num" required>
		</div>
		<div class="form-group">
			<label for="employee-address-complement">Complemento:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-address-complement" required>
		</div>
		<div class="form-group">
			<label for="employee-neighborhood">Bairro:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-neighborhood" data-employee-neighborhood required>
		</div>
		<div class="form-group">
			<label for="employee-city">Cidade:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-city" data-employee-city required>
		</div>
		<div class="form-group">
			<label for="employee-state">Estado:<span class="color-red"> *</span></label>
			<input type="text" class="form-control" id="employee-state" required>
		</div>
	</fieldset>
	<button type="submit" class="btn btn-primary align-right">Enviar</button>
</form>