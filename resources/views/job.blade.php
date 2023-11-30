<x-layout-main>

<h2>Diventa un revisore di Presto.it!</h2>

<div class="container mt-5">
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNome">Nome</label>
        <input type="text" class="form-control" id="inputNome" name="nome" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCognome">Cognome</label>
        <input type="text" class="form-control" id="inputCognome" name="cognome" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPresentazione">Breve presentazione</label>
      <textarea class="form-control" id="inputPresentazione" name="presentazione" placeholder="Parlaci di te..." rows="4" required></textarea>
    </div><br>
    <div class="form-group">
      <label for="inputCV">Allega il tuo CV</label>
      <input type="file" class="form-control-file" id="inputCV" name="cv" accept=".pdf, .doc, .docx" required>
    </div><br>
    <button type="submit">Invia candidatura</button>
  </form>
</div>

</x-layout-main>