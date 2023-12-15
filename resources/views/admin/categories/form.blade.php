<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="categoryForm" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Nom de la catégorie" name="name" id="name">
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
  var editingCategoryId = null; // Variable pour stocker l'ID de la catégorie en cours d'édition
  var currentCategoryName = '';

function openModalForEdit(categoryId, categoryName) {
  // Mettez à jour le formulaire avec les données de la catégorie en cours d'édition
  editingCategoryId = categoryId;

  // Stocker l'ancienne valeur du champ de saisie
  currentCategoryName = categoryName;

  // Remplir le champ de saisie avec les anciennes valeurs
  document.getElementById('name').value = currentCategoryName;
    // Afficher le modal
    $('#exampleModal').modal('show');
  }

  function saveChanges() {
    var nameInput = document.getElementById('name');
    var name = nameInput.value;
    var payload = {
      "name": name,
      "_method":editingCategoryId ? "PUT": null
    };

    // Utiliser une condition pour déterminer si c'est une édition ou un ajout
    var url = editingCategoryId ? "categories/" + editingCategoryId  : "{{ route('categories.store') }}";

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
      }
    });

    $.ajax({
      type:   "POST",
      dataType: "json",
      url: url,
      data: payload,
      timeout: 5000,
      success: function(data) {
        console.log("SUCCESS", data);

        if (!data.error) {
          // Fermer le modal
          $('#exampleModal').modal('hide');

          // Effacer le champ de saisie et réinitialiser le style
          nameInput.value = '';
          nameInput.classList.remove('error-input');

          // Réinitialiser l'ID de la catégorie en cours d'édition
          editingCategoryId = null;

          // Afficher un message de succès
          document.querySelector('.success').innerHTML = "Enregistré avec succès";

          // Mettre à jour la table
          updateTable(data.categories.data);
        } else {
          // Ajouter la classe d'erreur à l'input
          nameInput.classList.add('error-input');

          document.querySelector('.error').innerHTML = "Erreur d'enregistrement";
        }
      },
      error: function(data) {
        nameInput.classList.add('error-input');
        console.error("ERROR...", data);
      },
    });
  }

  // Mettre à jour la table avec les données de la route categories.index
  function updateTable(data) {
    var tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    data.forEach(category => {
      var row = document.createElement('tr');
      row.innerHTML = `
        <th scope="row">${category.id}</th>
        <td>${category.name}</td>
        <td>
          <p>
            <button onclick="openModalForEdit(${category.id})" class="btn btn-warning"><i class="fa fa-edit"></i></button>
            <form action="{{ url('categories') }}/${category.id}" method="post">
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
