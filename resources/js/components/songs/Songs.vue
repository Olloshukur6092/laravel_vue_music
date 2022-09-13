<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow m-3">
        <div class="card-header text-white bg-info border-0">
          <h3 class="d-inline">Songs</h3>
          <router-link :to="{ name: 'AddSong' }" class="btn btn-primary"
            >Add Song</router-link
          >
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Song name</th>
                <th>Song title</th>
                <th>Song description</th>
                <th>Singer name</th>
                <th>Song lang</th>
                <th>Song genre</th>
                <th>Song date</th>
                <th style="width: 7%">Song view count</th>
                <th style="width: 8%">Song download count</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(song, i) of songs" :key="i">
                <td>{{ i + 1 }}</td>
                <td>{{ song.song_name }}</td>
                <td>{{ song.song_title }}</td>
                <td>{{ song.song_description }}</td>
                <td>{{ song.singer.name }}</td>
                <td>{{ song.lang.lang_name }}</td>
                <td>{{ song.genre.genre_name }}</td>
                <td>{{ song.song_date }}</td>
                <td>0</td>
                <td>0</td>
                <td>
                  <router-link
                    :to="{ name: 'EditSong', params: { songId: song.id } }"
                    class="btn btn-primary me-2"
                    >Edit</router-link
                  >
                  <button class="btn btn-danger" @click="deleteSong(song.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      songForm: false,
      songTable: true,
      songs: {},
    };
  },
  mounted() {
    this.getAllSongs();
  },
  methods: {
    getAllSongs() {
      this.axios
        .get("http://localhost:8000/api/songs")
        .then((response) => {
          this.songs = response.data.song;
          console.log(this.songs);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // delete Song
    deleteSong(songId) {
      this.axios
        .delete(`http://localhost:8000/api/songs/${songId}`)
        .then((response) => {
          console.log(response);
          if (response.data.message) {
            this.getAllSongs()
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
th,
td,
td a,
td button {
  font-size: 18px;
}

.card-header a {
  float: right;
  text-decoration: none;
  font-size: 18px;
}
</style>