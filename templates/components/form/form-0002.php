<form class="form-0001" data-schedule-add-form>
  <h3 class="text-align-center">Agende sua consulta:</h3>
  <div class="form-group">
    <label for="scheduling-specialty">Especialidade Médica:<span class="color-red"> *</span></label>
    <select class="form-control" id="scheduling-specialty" required>

    </select>
  </div>
  <div class="form-group">
    <label for="scheduling-doctor">Médico:<span class="color-red"> *</span></label>
    <select class="form-control" id="scheduling-doctor" name="codFuncionario" required>

    </select>
  </div>
  <div class="form-group">
    <label for="scheduling-date">Data da consulta:<span class="color-red"> *</span></label>
    <input type="date" class="form-control" id="scheduling-date" name="dataAgendamento" required>
  </div>
  <div class="form-group">
    <label for="scheduling-time">Horário:<span class="color-red"> *</span></label>
    <select class="form-control" id="scheduling-time" name="horaAgendamento" required>

    </select>
  </div>
  <div class="form-group">
    <label for="scheduling-name">Nome do paciente:<span class="color-red"> *</span></label>
    <input type="text" class="form-control" id="scheduling-name" name="nomePac" required>
  </div>
  <div class="form-group">
    <label for="scheduling-phone">Telefone do paciente:<span class="color-red"> *</span></label>
    <input type="text" class="form-control" id="scheduling-phone" name="telPac" required>
  </div>
  <button type="submit" class="btn btn-primary align-right">Enviar</button>
</form>