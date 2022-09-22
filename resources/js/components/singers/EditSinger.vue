<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card m-3">
                <div class="card-header bg-info text-white text-center">
                    <h3>Update Singer <b> {{ error }} </b> </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="singerName">Singer name:</label>
                            <input
                                type="text"
                                id="singerName"
                                class="form-control"
                                v-model="singerName"
                            />
                        </div>
                    </form>
                    <button class="btn btn-success" @click="updateSinger">
                        Update Singer
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { adminUrl } from "../../constant/url";
export default {
    data() {
        return {
            singerName: "",
            error: '',
        };
    },
    mounted() {
        this.getSingerDataId(this.$route.params.singerId);
    },
    methods: {
        getSingerDataId(singerId) {
            this.axios
                .get(`${adminUrl}/singer/${singerId}/edit`)
                .then((response) => {
                    console.log(response);
                    this.singerName = response.data.singer[0].name;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        updateSinger() {
            this.axios
                .put(`${adminUrl}/singer/${this.$route.params.singerId}`, {
                    name: this.singerName,
                })
                .then((response) => {
                  console.log(response);
                    if (response.data.status == 1) {
                        this.$router.push({ name: "Singer" });
                    } 
                    if (response.data.status == 0) {
                      this.error = response.data.message;
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
button {
    font-size: 18px;
}
</style>
