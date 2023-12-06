document.getElementById('images').addEventListener('change', function () {
    
    var preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    var files = this.files;

    for (var i = 0; i < files.length; i++) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100px'; // Imposta la larghezza massima dell'anteprima
            img.style.maxHeight = '100px'; // Imposta l'altezza massima dell'anteprima
            preview.appendChild(img);
        };

        reader.readAsDataURL(files[i]);
    }
});

$(document).ready(function () {
  $(".existing-image, .bi-folder-plus").click(function () {
      var container = $(this).closest(".image-container");
      var input = container.find(".new-image-input")[0];
      $(input).click();

        
  });

  $(".new-image-input").change(function () {
      var input = this;
      var container = $(this).closest(".image-container");
      var preview = container.find(".new-image-preview")[0];
      var existingImage = container.find(".existing-image")[0];

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $(preview).attr('src', e.target.result);
              $(preview).show();
              $(existingImage).hide(); // Rimuove l'attributo display: none
          };

          reader.readAsDataURL(input.files[0]);
      }
  });
});
 
  /*
  1-document.getElementById('images').addEventListener('change', function () {:
    Questa riga ascolta l'evento di cambio sull'elemento di input file con l'id imageInput. 
    L'evento di cambio viene attivato quando l'utente seleziona uno o più file.
    
  2-var preview = document.getElementById('imagePreview');:
    Crea una variabile preview che rappresenta l'elemento HTML con l'id imagePreview.
    Questo è il div in cui verranno visualizzate le anteprime delle immagini.
    
  3-preview.innerHTML = '';:
    Cancella qualsiasi contenuto presente all'interno del div imagePreview. 
    Questo è utile quando l'utente seleziona un nuovo set di immagini per sostituire le anteprime esistenti.
    
  4-var files = this.files;:
    Ottiene l'array di file selezionati dall'utente.
    
  5-for (var i = 0; i < files.length; i++) {:
    Inizia un ciclo for per iterare attraverso ciascun file selezionato.
    
  6-var reader = new FileReader();:
    Crea un oggetto FileReader, che consente di leggere i contenuti dei file.
    
  7-reader.onload = function (e) {:
    Definisce una funzione da eseguire quando il file è stato completamente letto.
    In questo caso, la funzione crea un elemento immagine, imposta il suo attributo src con i dati dell'URL del file letto
    e imposta delle dimensioni massime per l'anteprima.
    
  8-reader.readAsDataURL(files[i]);:
    Legge il contenuto del file come un URL dati. 
    Questo URL dati rappresenta un'anteprima dell'immagine.
    
  9-preview.appendChild(img);:
    Aggiunge l'elemento immagine (l'anteprima) al div imagePreview.

    In sintesi, il JavaScript qui sopra ascolta quando l'utente seleziona una o più immagini, 
    legge il contenuto di ciascuna immagine per creare un'anteprima e quindi visualizza queste anteprime nel div con l'id imagePreview.

    */


    