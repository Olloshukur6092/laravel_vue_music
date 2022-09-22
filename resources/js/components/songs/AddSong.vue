<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow border-0 m-3">
        <div class="card-header text-white border-0 bg-info">
          <h3>Add Song</h3>
          <router-link :to="{ name: 'Songs' }" class="btn btn-primary"
            >Back</router-link
          >
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="langName">Lang name</label>
                  <select
                    name=""
                    id="langName"
                    class="select form-select"
                    v-model="langId"
                  >
                    <option value="0" selected disabled>Select</option>
                    <option
                      v-for="(lang, i) in langs"
                      :key="i"
                      :value="lang.id"
                    >
                      {{ lang.lang_name }}
                    </option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="genreName">Genre name</label>
                  <select
                    name=""
                    id="genreName"
                    class="select form-select"
                    v-model="genreId"
                  >
                    <option value="0" selected disabled>Select</option>
                    <option
                      v-for="(genre, i) in genres"
                      :key="i"
                      :value="genre.id"
                    >
                      {{ genre.genre_name }}
                    </option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="singerName">Singer name</label>
                  <select
                    name=""
                    id="singerName"
                    class="select form-select"
                    v-model="singerId"
                  >
                    <option value="0" selected disabled>Select</option>
                    <option
                      v-for="(singer, i) in singers"
                      :key="i"
                      :value="singer.id"
                    >
                      {{ singer.name }}
                    </option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="songName">Song name</label>
                  <input
                    type="text"
                    id="songName"
                    class="form-control"
                    v-model="songName"
                  />
                </div>
                <div class="mb-3">
                  <label for="songTitle">Song title</label>
                  <input
                    type="text"
                    id="songName"
                    class="form-control"
                    v-model="songTitle"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="description">Description</label>
                  <textarea
                    id="description"
                    cols="30"
                    rows="3"
                    class="form-control"
                    v-model="songDesc"
                  ></textarea>
                </div>
                <div class="mb-3">
                  <label for="songImg">Song image</label>
                  <input
                    type="text"
                    id="songImg"
                    class="form-control"
                    v-model="songImg"
                  />
                </div>
                <div class="mb-3">
                  <label for="songMp3">Song Mp3</label>
                  <input
                    type="text"
                    id="songMp3"
                    class="form-control"
                    v-model="songMp3"
                  />
                </div>
                <div class="mb-3">
                  <label for="songDate">Song date</label>
                  <input
                    type="date"
                    id="songDate"
                    class="form-control"
                    v-model="songDate"
                  />
                </div>
              </div>
            </div>
          </form>
          <button class="btn btn-success" @click="addSong">Add Song</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { adminUrl } from '../../constant/url';
export default {
  data() {
    return {
      singers: [],
      langs: [],
      genres: [],
      singerId: 0,
      langId: 0,
      genreId: 0,
      songTitle: "",
      songName: "",
      songDesc: "",
      songImg: "",
      songMp3: "",
      songDate: null,
    };
  },
  mounted() {
    this.getSingerAll();
    this.getLangAll();
    this.getGenreAll();
  },
  methods: {
    // get All Singer
    getSingerAll() {
      this.axios.get(`${adminUrl}/singer`).then((response) => {
        this.singers = response.data.singers;
      });
    },

    // get Lang All
    getLangAll() {
      this.axios
        .get(`${adminUrl}/songslang`)
        .then((response) => {
          this.langs = response.data.lang;
          console.log(response);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // get Genre all
    getGenreAll() {
      this.axios
        .get(`${adminUrl}/songsgenre`)
        .then((response) => {
          this.genres = response.data.genres;
          console.log(response);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // Add Song
    addSong() {
      this.axios
        .post(`${adminUrl}/songs`, {
          song_name: this.songName,
          song_title: this.songTitle,
          song_desc: this.songDesc,
          singerId: this.singerId,
          langId: this.langId,
          genreId: this.genreId,
          songDate: this.songDate,
        })
        .then((response) => {
          if (response.data.message) {
            this.$router.push({ name: "Songs" });
          }
          this.singerId = 0;
          this.langId = 0;
          this.genreId = 0;
          this.songTitle = "";
          this.songName = "";
          this.songDesc = "";
          this.songImg = "";
          this.songMp3 = "";
          this.songDate = null;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
h3 {
  display: inline;
}
a {
  float: right;
  font-size: 18px;
}

label,
input {
  font-size: 18px;
  margin-bottom: 10px;
}
.card-body button {
  font-size: 18px;
  float: right;
}
</style>