<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-info text-white text-center">
            <h3>Update Singer</h3>
          </div>
          <div class="card-body">
            <form @submit.prevent="updateSinger">
              <div class="mb-3">
                <label for="singerName">Singer name:</label>
                <input type="text" id="singerName" class="form-control" v-model="singerName" />
              </div>
              <div class="mb-3">
                <button class="btn btn-success">Update Singer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            singerName: "",
        }
    },
    mounted() {
        this.getSingerDataId(this.$route.params.singerId)
    },
    methods: {
        getSingerDataId(singerId) {
            this.axios.get(`http://localhost:8000/api/singer/${singerId}/edit`).then((response) => {
                console.log(response);
                this.singerName = response.data.singer[0].name;
            }).catch((err) => {
                console.log(err);
            })
        },
        updateSinger() {
            this.axios.put(`http://localhost:8000/api/singer/${this.$route.params.singerId}`, { name: this.singerName }).then((response) => {
                if (response.data.message) {
                    this.$router.push({name: 'Singer'})
                }
            }).catch((err) => {
                console.log(err);
            })
        }
    }
};
</script>

<style scoped>
label, input, button {
    font-size: 18px;
}
</style>