<template>
  <div class="row">
    <div class="col-md-6">
      <div v-if="genreTable" class="card m-3 shadow border-0">
        <div class="card-header text-white bg-info border-0">
          <h3 class="d-inline">Song Genres</h3>
          <button class="btn btn-primary" @click="showGenreForm">Add Genre</button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Genre Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(genre, i) in genres" :key="i">
                <td>{{ i + 1 }}</td>
                <td>{{ genre.genre_name }}</td>
                <td>
                  <button class="btn btn-primary me-2">Edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-if="genreForm" class="card m-3 shadow border-0">
        <div class="card-header text-white bg-info border-0">
          <h3 class="d-inline">Add Genre</h3>
          <button class="btn btn-primary" @click="hideGenreForm">Back</button>
        </div>
        <div class="card-body">
          <form @submit.prevent="addSongGenre">
            <div class="mb-3">
              <label for="genreName">Genre Name</label>
              <input
                type="text"
                id="genreName"
                class="form-control mt-2"
                v-model="genreName"
              />
            </div>
            <div class="mb-3">
              <button class="btn btn-success">Add Genre</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      genres: [],
      genreForm: false,
      genreTable: true,
      genreName: "",
    };
  },
  mounted() {
    this.getGenreData()
  },
  methods: {
    getGenreData() {
      this.axios
        .get("http://localhost:8000/api/songsgenre")
        .then((response) => {
          console.log(response);
          this.genres = response.data.genres
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // add Song Genre
    addSongGenre() {
      this.axios.post('http://localhost:8000/api/songsgenre', { genre_name: this.genreName }).then((response) => {
        if (response.data.message) {
          this.hideGenreForm()
          this.getGenreData()
        }
        this.genreName = "";
      }).catch((err) => {
        console.log(err);
      })
    },

    showGenreForm() {
      this.genreForm = true;
      this.genreTable = false;
    },
    hideGenreForm() {
      this.genreForm = false;
      this.genreTable = true;
    },
  },
};
</script>

<style scoped>
.card-header button {
  display: inline;
  float: right;
  font-size: 18px;
}

td,
th,
td button {
  font-size: 18px;
}

label, input, form button 
{
  font-size: 18px;
}

</style>