<template>
  <div class="row">
    <div class="col-md-6">
      <div v-if="table" class="card shadow m-3 border-0">
        <div class="card-header bg-info text-white border-0">
          <h3 class="d-inline">All Singers</h3>
          <button class="btn btn-primary float" @click="addFormShow">
            Add
          </button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Singer Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(singer, i) in singers" :key="i">
                <td>{{ i + 1 }}</td>
                <td>{{ singer.name }}</td>
                <td>
                  <!-- <button
                    class="btn btn-primary"
                  > -->
                    <router-link class="btn btn-primary" :to="{name: 'EditSinger', params: { singerId: singer.id }}" >Edit</router-link>
                  <!-- </button> -->
                  <button
                    class="btn btn-danger ms-1"
                    @click="deleteSinger(singer.id)"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card m-3" v-if="form">
        <div class="card-header bg-primary text-white border-0">
          <h3 class="d-inline">Add Singer</h3>
          <button
            class="btn btn-secondary float"
            @click="back"
          >
            Back
          </button>
        </div>
        <div class="card-body">
          <form @submit.prevent="addSinger">
            <div class="mb-3">
              <label for="singer">Enter singer</label>
              <input
                type="text"
                id="singer"
                class="form-control mt-2"
                placeholder="Enter singer..."
                v-model="singerName"
              />
            </div>
            <div class="mb-3">
              <button class="btn btn-success">Add Singer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TheSinger",
  data() {
    return {
      singers: [],
      table: true,
      form: false,
      singerName: "",
    };
  },
  mounted() {
    this.getSingerData();
  },
  methods: {
    getSingerData() {
      this.axios
        .get("http://localhost:8000/api/singer")
        .then((response) => {
          this.singers = response.data.singers;
          console.log(this.singers);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    addSinger() {
      this.axios
        .post("http://localhost:8000/api/singer", { name: this.singerName })
        .then((response) => {
          if (response.data.message) {
            this.back();
            // this.singers = [...this.singers, { id: this.singerId, name: this.singerName }];
            this.getSingerData()
          console.log(response);
          }
          this.singerName = "";
        })
        .catch((err) => {
          console.log(err);
        });
    },

    deleteSinger(singerId) {
      this.axios
        .delete(`http://localhost:8000/api/singer/${singerId}`)
        .then((response) => {
          console.log(response);
          // this.getSingerData()
          let i = this.singers.map((data) => data.id).indexOf(singerId);
          this.singers.splice(i, 1);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    addFormShow() {
      this.table = false;
      this.form = true;
      this.singerName = "";
    },
    back() {
      this.table = true;
      this.form = false;
    },

  },
};
</script>

<style scoped>
th,
td,
button {
  font-size: 18px;
}

.float {
  display: inline;
  float: right;
}

label,
input {
  font-size: 18px;
}

a {
  text-decoration: none;
  color: #fff;
  font-size: 18px;
}
</style>