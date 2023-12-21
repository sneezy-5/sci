
<!-- <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Poste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="categories" class="control-label">{{ 'Category' }}</label>
            <select name="categories" id="category_id" class="form-control">
              @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        @if(!empty($post) && $category->id == $post->category_id) selected @endif>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Titre</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Titre du blog" name="title" id="title">
            </div>
          </div>
          <div class="form-group">
            <label>Contenu</label>
            <div class="min-height-200px">


<div class="html-editor pd-20 card-box mb-30">

    <textarea
        class="ckeditor textarea_editor form-control border-radius-0"
        placeholder="Enter text ..."
        id="content"
    ></textarea>
</div>
</div>
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
      url: `blogs/${postId}/edit`,
      success: function(data) {
        // Remplir le formulaire avec les anciennes valeurs
        document.getElementById('title').value = data.blog.title;
        document.getElementById('category_id').value = data.blog.categories;
        //document.getElementById('content').value = data.blog.content;
     
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
  var categoryInput = document.getElementById('category_id');
  var contentInput = document.getElementById('content');
  var pictureInput = document.getElementById('picture');

  var title = titleInput.value;
  var category_id = categoryInput.value;
  var content = contentInput.value;

  // Créer un objet FormData pour gérer les fichiers
  var formData = new FormData();
  formData.append('title', title);
  formData.append('categories', category_id);
  formData.append('content', content);
  formData.append('picture', pictureInput.files[0]); // Ajouter le fichier image

  formData.append('_method', editingPostId ? 'PUT' : 'POST');

  // Utiliser une condition pour déterminer si c'est une édition ou un ajout
  var url = editingPostId ? "blogs/" + editingPostId : "{{ route('blogs.store') }}";

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
        categoryInput.value = '';
        contentInput.value = '';
        keywordInput.value = '';
        descriptionInput.value = '';
        pictureInput.value = ''; // Effacer le champ d'input pour l'image
        titleInput.classList.remove('error-input');
        categoryInput.classList.remove('error-input');
        contentInput.classList.remove('error-input');
        keywordInput.classList.remove('error-input');
        descriptionInput.classList.remove('error-input');

        // Réinitialiser l'ID du post en cours d'édition
        editingPostId = null;

        // Afficher un message de succès
        document.querySelector('.success').innerHTML = "Enregistré avec succès";

        // Mettre à jour la table
        updateTable(data.blogs.data);
      } else {
        // Ajouter la classe d'erreur aux champs d'entrée
        titleInput.classList.add('error-input');
        categoryInput.classList.add('error-input');
        contentInput.classList.add('error-input');
        keywordInput.classList.add('error-input');
        descriptionInput.classList.add('error-input');

        document.querySelector('.error').innerHTML = "Erreur d'enregistrement";
      }
    },
    error: function(data) {
      titleInput.classList.add('error-input');
      categoryInput.classList.add('error-input');
      contentInput.classList.add('error-input');
      keywordInput.classList.add('error-input');
      descriptionInput.classList.add('error-input');
      console.error("ERROR...", data);
    },
  });
}


  // Mettre à jour la table avec les données de la route blogs.index
  function updateTable(data) {
    var tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    data.forEach(post => {
      var row = document.createElement('tr');
      row.innerHTML = `
        <th scope="row">${post.id}</th>
        <td>${post.title}</td>
        <td>${post.categories}</td>
        <td>${post.content}</td>
        <td><img src="{{ asset('storage/image/') }}/${post.picture}" alt=""  width="100" height="100"></td>
        <td>



        <div class="row ">
                                <div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>

													<a class="dropdown-item" href="#"
                                                    onclick="openModalForEdit(${post.id})"
														><i class="dw dw-edit2"></i> Edit</a
													>

                                                    <form action="{{ url('admin/blogs') }}/${post.id}" method="post">
                              @method('delete')
                              @csrf
                              <button class="dropdown-item btn btn-danger" type="submit">
                                <i class="dw dw-delete-3"></i> Delete</button>
                            </form>
												</div>
											</div>


                            </div>
                            </td>
      `;

      tbody.appendChild(row);
    });
  }
</script>
