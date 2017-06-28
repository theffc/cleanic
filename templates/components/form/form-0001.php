<form class="form-0001" data-contact-add-form>
  <h3 class="text-align-center">Fale Conosco:</h3>
  <div class="form-group">
    <label for="contact-name">Nome:<span class="color-red"> *</span></label>
    <input type="text" class="form-control" id="contact-name" name="nomeCliente" required>
  </div>
  <div class="form-group">
    <label for="contact-email">E-mail:<span class="color-red"> *</span></label>
    <input type="email" class="form-control" id="contact-email" name="emailCliente" required>
  </div>
  <div class="form-group">
    <label for="contact-reason">Motivo:<span class="color-red"> *</span></label>
    <select class="form-control" id="contact-reason" name="motivoContato" required>
      <option></option>
      <option>Reclamação</option>
      <option>Sugestão</option>
      <option>Elogio</option>
      <option>Dúvida</option>
    </select>
  </div>
  <div class="form-group">
    <label for="contact-message">Mensagem:<span class="color-red"> *</span></label>
    <textarea class="form-control" id="contact-message" name="mensagemContato" required></textarea>
  </div>
  <input type="submit" class="btn btn-primary align-right" value="Enviar">
</form>