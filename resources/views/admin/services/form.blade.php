<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom du service</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Nom du service" name="name" id="name">
            </div>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="file" name="image" id="image">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<style>
  /* Ajoutez une classe pour styliser l'input en rouge */
  .error-input {
    border: 1px solid red;
  }
</style>

<script>
  var editingServiceId = null; // Variable pour stocker l'ID du service en cours d'édition

  function openModalForEdit(serviceId) {
    // Mettez à jour le formulaire avec les données du service en cours d'édition
    editingServiceId = serviceId;

    // Récupérer les données du service en cours d'édition
    $.ajax({
      type: 'GET',
      dataType: "json",
      url: `services/${serviceId}/edit`,
      success: function(data) {
        // Remplir le formulaire avec les anciennes valeurs
        document.getElementById('name').value = data.service.name;
        document.getElementById('description').value = data.service.description;

        // Afficher le modal
        $('#exampleModal').modal('show');
      },
      error: function(data) {
        console.error("ERROR...", data);
      },
    });
  }

  function saveChanges() {
    var nameInput = document.getElementById('name');
    var descriptionInput = document.getElementById('description');
    var imageInput = document.getElementById('image');

    var name = nameInput.value;
    var description = descriptionInput.value;

    // Créer un objet FormData pour gérer les fichiers
    var formData = new FormData();
    formData.append('name', name);
    formData.append('description', description);
    formData.append('image', imageInput.files[0]); // Ajouter le fichier image

    formData.append('_method', editingServiceId ? 'PUT' : 'POST');

    // Utiliser une condition pour déterminer si c'est une édition ou un ajout
    var url = editingServiceId ? "services/" + editingServiceId : "{{ route('services.store') }}";

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
      }
    });

    $.ajax({
      type: "POST",
      dataType: "json",
      url: url,
      data: formData,
      contentType: false,
      processData: false,
      timeout: 5000,
      success: function(data) {
        console.log("SUCCESS", data);

        if (!data.error) {
          // Fermer le modal
          $('#exampleModal').modal('hide');

          // Effacer les champs de saisie et réinitialiser le style
          nameInput.value = '';
          descriptionInput.value = '';
          imageInput.value = ''; // Effacer le champ d'input pour l'image
          nameInput.classList.remove('error-input');
          descriptionInput.classList.remove('error-input');

          // Réinitialiser l'ID du service en cours d'édition
          editingServiceId = null;

          // Afficher un message de succès
          document.querySelector('.success').innerHTML = "Enregistré avec succès";

          // Mettre à jour la table
          updateTable(data.services.data);
        } else {
          // Ajouter la classe d'erreur aux champs d'entrée
          nameInput.classList.add('error-input');
          descriptionInput.classList.add('error-input');

          document.querySelector('.error').innerHTML = "Erreur d'enregistrement";
        }
      },
      error: function(data) {
        nameInput.classList.add('error-input');
        descriptionInput.classList.add('error-input');
        console.error("ERROR...", data);
      },
    });
  }

  // Mettre à jour la table avec les données de la route services.index
  function updateTable(data) {
    var tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    data.forEach(service => {
      var row = document.createElement('tr');
      row.innerHTML = `
        <th scope="row">${service.id}</th>
        <td>${service.name}</td>
        <td>${service.description}</td>
        <td><img src="{{ asset('storage/image/') }}/${service.image}" alt="" width="200" height="200"></td>
        <td>
          <p>
            <button onclick="openModalForEdit(${service.id})" class="btn btn-warning"><i class="fa fa-edit"></i></button>
            <form action="{{ url('services') }}/${service.id}" method="post">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
          </p>
        </td>
      `;

      tbody.appendChild(row);
    });
  }
</script>
