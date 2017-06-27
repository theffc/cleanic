<form class="form-0001">
  <h3 class="text-align-center">Fale Conosco:</h3>
  <div class="form-group">
    <label for="contact-name">Nome:<span class="color-red"> *</span></label>
    <input type="text" class="form-control" id="contact-name" required>
  </div>
  <div class="form-group">
    <label for="contact-email">E-mail:<span class="color-red"> *</span></label>
    <input type="email" class="form-control" id="contact-email" required>
  </div>
  <div class="form-group">
    <label for="contact-reason">Motivo:<span class="color-red"> *</span></label>
    <select class="form-control" id="contact-reason" required>
      <option></option>
      <option>Motivo 1</option>
      <option>Motivo 2</option>
      <option>Motivo 3</option>
      <option>Motivo 4</option>
    </select>
  </div>
  <div class="form-group">
    <label for="contact-message">Mensagem:<span class="color-red"> *</span></label>
    <textarea class="form-control" id="contact-message" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary align-right">Submit</button>
</form>
