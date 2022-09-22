<template>
  <div class="row">
    <div class="col-md-6">
      <div v-if="langTable" class="card shadow border-0 m-3">
        <div class="card-header bg-info text-white border-0">
          <h3 class="d-inline">Songs Languages</h3>
          <button class="btn btn-primary" @click="showForm">Add Lang</button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Lang Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(lang, i) in songsLang" :key="i">
                <td>{{ i + 1 }}</td>
                <td>{{ lang.lang_name }}</td>
                <td>
                  <button class="btn btn-primary me-2">Edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-if="langForm" class="card m-3 shadow border-0">
        <div class="card-header bg-info text-white border-0">
          <h3 class="d-inline">Add Lang</h3>
          <button class="btn btn-primary" @click="hideForm">Back</button>
        </div>
        <div class="card-body">
          <form @submit.prevent="addSongLang">
            <div class="mb-3">
              <label for="langName">Lang Name</label>
              <input
                type="text"
                id="langName"
                class="form-control mt-2"
                v-model="langName"
              />
            </div>
            <div class="mb-3">
              <button class="btn btn-success">Add Lang</button>
            </div>
          </form>
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
      songsLang: [],
      langTable: true,
      langForm: false,
      langName: "",
    };
  },
  mounted() {
    this.getLangsData();
  },
  methods: {
    // get All Songs
    getLangsData() {
      this.axios
        .get(`${adminUrl}/songslang`)
        .then((response) => {
          console.log(response);
          this.songsLang = response.data.lang;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // Add Songs Lang
    addSongLang() {
      this.axios
        .post(`${adminUrl}/songslang`, {
          lang_name: this.langName,
        })
        .then((response) => {
          console.log(response);
          if (response.data.message) {
            this.hideForm()
            this.getLangsData()
          }
          this.langName = "";
        })
        .catch((err) => {
          console.log("Err", err);
        });
    },

    // hide Form method
    hideForm() {
        this.langForm = false;
        this.langTable = true;
    },

    // show Form
    showForm() {
        this.langForm = true;
        this.langTable = false;
    }
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

label,
input,
form button {
  font-size: 18px;
}
</style>