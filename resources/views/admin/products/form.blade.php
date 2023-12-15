<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom du produit</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Nom du produit" name="title" id="title">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Prix du produit</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" placeholder="Prix du produit" name="price" id="price">
            </div>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="file" name="picture" id="picture">
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
  var editingPostId = null; // Variable pour stocker l'ID du post en cours d'édition

  function openModalForEdit(postId) {
    // Mettez à jour le formulaire avec les données du post en cours d'édition
    editingPostId = postId;

    // Récupérer les données du post en cours d'édition
    $.ajax({
      type: 'GET',
      dataType: "json",
      url: `products/${postId}/edit`,
      success: function(data) {
        // Remplir le formulaire avec les anciennes valeurs
        document.getElementById('title').value = data.product.title;
        document.getElementById('price').value = data.product.price;
        document.getElementById('description').value = data.product.description;

        // Afficher le modal
        $('#exampleModal').modal('show');
      },
      error: function(data) {
        console.error("ERROR...", data);
      },
    });
  }

  function saveChanges() {
    var titleInput = document.getElementById('title');
    var priceInput = document.getElementById('price');
    var descriptionInput = document.getElementById('description');
    var pictureInput = document.getElementById('picture');

    var title = titleInput.value;
    var price = priceInput.value;
    var description = descriptionInput.value;

    // Créer un objet FormData pour gérer les fichiers
    var formData = new FormData();
    formData.append('title', title);
    formData.append('price', price);
    formData.append('description', description);
    formData.append('picture', pictureInput.files[0]); // Ajouter le fichier image

    formData.append('_method', editingPostId ? 'PUT' : 'POST');

    // Utiliser une condition pour déterminer si c'est une édition ou un ajout
    var url = editingPostId ? "products/" + editingPostId : "{{ route('products.store') }}";

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
          titleInput.value = '';
          priceInput.value = '';
          descriptionInput.value = '';
          pictureInput.value = ''; // Effacer le champ d'input pour l'image
          titleInput.classList.remove('error-input');
          priceInput.classList.remove('error-input');
          descriptionInput.classList.remove('error-input');

          // Réinitialiser l'ID du post en cours d'édition
          editingPostId = null;

          // Afficher un message de succès
          document.querySelector('.success').innerHTML = "Enregistré avec succès";

          // Mettre à jour la table
          updateTable(data.products.data);
        } else {
          // Ajouter la classe d'erreur aux champs d'entrée
          titleInput.classList.add('error-input');
          priceInput.classList.add('error-input');
          descriptionInput.classList.add('error-input');

          document.querySelector('.error').innerHTML = "Erreur d'enregistrement";
        }
      },
      error: function(data) {
        titleInput.classList.add('error-input');
        priceInput.classList.add('error-input');
        descriptionInput.classList.add('error-input');
        console.error("ERROR...", data);
      },
    });
  }

  // Mettre à jour la table avec les données de la route products.index
  function updateTable(data) {
    var tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    data.forEach(product => {
      var row = document.createElement('tr');
      row.innerHTML = `
        <th scope="row">${product.id}</th>
        <td>${product.title}</td>
        <td>${product.description}</td>
        <td>${product.status}</td>
        <td><img src="{{ asset('storage/image/') }}/${product.picture}" alt="" width="200" height="200"></td>
        <td>
          <p>
            <button onclick="openModalForEdit(${product.id})" class="btn btn-warning"><i class="fa fa-edit"></i></button>
            <form action="{{ url('products') }}/${product.id}" method="post">
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
