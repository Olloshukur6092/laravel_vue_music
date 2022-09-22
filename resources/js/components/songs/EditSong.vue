<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0 m-3">
                <div class="card-header bg-info text-white border-0">
                    <h3>Update Song</h3>
                    <router-link :to="{ name: 'Songs' }" class="btn btn-primary"
                        >Back</router-link
                    >
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="langName">Lang Name</label>
                                    <select
                                        id="langName"
                                        class="form-select"
                                        v-model="langId"
                                    >
                                        <option
                                            v-for="(lang, i) in langs"
                                            :key="i"
                                            :value="lang.id"
                                            :selected="[
                                                langId == lang.id
                                                    ? 'selected'
                                                    : '',
                                            ]"
                                        >
                                            {{ lang.lang_name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="genreName">Genre Name</label>
                                    <select
                                        id="genreName"
                                        class="form-select"
                                        v-model="genreId"
                                    >
                                        <option
                                            v-for="(genre, i) in genres"
                                            :key="i"
                                            :value="genre.id"
                                            :selected="[
                                                genreId == genre.id
                                                    ? 'selected'
                                                    : '',
                                            ]"
                                        >
                                            {{ genre.genre_name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="singerName">Singer Name</label>
                                    <select
                                        id="singerName"
                                        class="form-select"
                                        v-model="singerId"
                                    >
                                        <option
                                            v-for="(singer, i) in singers"
                                            :key="i"
                                            :value="singer.id"
                                            :selected="[
                                                singerId == singer.id
                                                    ? 'selected'
                                                    : '',
                                            ]"
                                        >
                                            {{ singer.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="songName">Song Name</label>
                                    <input
                                        type="text"
                                        id="songName"
                                        class="form-control"
                                        v-model="songName"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="songTitle">Song Title</label>
                                    <input
                                        type="text"
                                        id="songTitle"
                                        class="form-control"
                                        v-model="songTitle"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="songDesc">Description</label>
                                    <textarea
                                        id="songDesc"
                                        cols="30"
                                        rows="3"
                                        class="form-control"
                                        v-model="songDesc"
                                    ></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="songImg">Song Image</label>
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
                                    <label for="songDate">Song Date</label>
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
                    <button class="btn btn-success" @click="updateSongData">
                        Update Song
                    </button>
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
            singerId: 0,
            langId: 0,
            genreId: 0,
            songName: "",
            songTitle: "",
            songDesc: "",
            songImg: "",
            songMp3: "",
            songDate: null,
            singers: [],
            langs: [],
            genres: [],
        };
    },
    mounted() {
        this.getEditSongData(this.$route.params.songId);
        this.getAllSingerData();
        this.getAllLangData();
        this.getAllSongGenre();
    },
    methods: {
        getEditSongData(songId) {
            this.axios
                .get(`${adminUrl}/songs/${songId}/edit`)
                .then((response) => {
                    console.log(response.data);
                    this.singerId = response.data.song[0].singers_id;
                    this.langId = response.data.song[0].singer_langs_id;
                    this.genreId = response.data.song[0].singer_genres_id;
                    this.songName = response.data.song[0].song_name;
                    this.songTitle = response.data.song[0].song_title;
                    this.songDesc = response.data.song[0].song_description;
                    this.songDate = response.data.song[0].song_date;

                    console.log(this.singerId);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        // get Singer data
        getAllSingerData() {
            this.axios
                .get(`${adminUrl}/singer`)
                .then((response) => {
                    console.log(" Song singer ", response);
                    this.singers = response.data.singers;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getAllLangData() {
            this.axios
                .get(`${adminUrl}/songslang`)
                .then((response) => {
                    console.log(" Songs langs:  ", response);
                    this.langs = response.data.lang;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getAllSongGenre() {
            this.axios
                .get(`${adminUrl}/songsgenre`)
                .then((response) => {
                    console.log(" Songs Genres :", response);
                    this.genres = response.data.genres;
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        // update data
        updateSongData() {
            this.axios
                .put(
                    `${adminUrl}/songs/${this.$route.params.songId}`,
                    {
                        songName: this.songName,
                        songTitle: this.songTitle,
                        songDesc: this.songDesc,
                        singerId: this.singerId,
                        songLangId: this.langId,
                        songGenreId: this.genreId,
                        songDate: this.songDate,
                    }
                )
                .then((response) => {
                    console.log(response);
                    if (response.data.message) {
                        this.$router.push({ name: 'Songs' });
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
label,
input,
textarea {
    font-size: 18px;
}
label {
    margin-bottom: 8px;
}

.form-select {
    font-size: 18px;
}

h3 {
    display: inline;
}
.card-header a {
    font-size: 18px;
    float: right;
}
.btn {
    font-size: 18px;
    float: right;
}
</style>
