<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-9 col-sm-11 col-12">
          <div class="card border-0 box-shadow mt-4">
            <form class="p-5">
              <div class="form-row">
                <div class="form-group col-12 mb-4">
                  <label for="validationServer03" class="mb-1">User name</label>
                  <input
                    type="text"
                    class="form-control p-3"
                    :class="{ 'is-invalid': formData.name.error.isError }"
                    id="validationServer03"
                    placeholder="Alex"
                    required
                    v-model="formData.name.value"
                    ref="name"
                  />
                  <div
                    class="invalid-feedback"
                    v-if="formData.name.error.isError"
                  >{{ formData.name.error.message }}</div>
                </div>
                <div class="form-group col-12 mb-4">
                  <label for="validationServer03" class="mb-1">Phone number</label>
                  <input
                    type="text"
                    class="form-control p-3"
                    id="validationServer03"
                    placeholder="992926352444"
                    :class="{ 'is-invalid': formData.phone.error.isError }"
                    required
                    v-model="formData.phone.value"
                  />
                  <div
                    class="invalid-feedback"
                    v-if="formData.phone.error.isError"
                  >{{ formData.phone.error.message }}</div>
                </div>
              </div>
              <div class="form-group mb-4">
                <textarea
                  class="form-control p-3"
                  id="exampleFormControlTextarea1"
                  placeholder="Message..."
                  rows="5"
                  :class="{ 'is-invalid': formData.message.error.isError }"
                  v-model="formData.message.value"
                ></textarea>
                <div
                  class="invalid-feedback"
                  v-if="formData.message.error.isError"
                >{{ formData.message.error.message }}</div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <button
                  type="button"
                  class="btn btn-danger px-5 py-3"
                  @click="sendHandler"
                >Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <modal-component :isVisabled="isVisabled" @setVisable="closeHandler" />
  </div>
</template>

<script>
import ModalComponent from "./ModalComponent.vue";
import axios from "../utils/axios";

export default {
  components: {
    ModalComponent
  },
  data: function() {
    return {
      formData: {
        name: {
          value: "",
          error: {
            isError: false,
            message: null
          }
        },
        phone: {
          value: "",
          error: {
            isError: false,
            message: null
          }
        },
        message: {
          value: "",
          error: {
            isError: false,
            message: null
          }
        }
      },
      isVisabled: false
    };
  },
  mounted() {
    this.$refs.name.focus()
  },
  methods: {
    async sendHandler() {
      axios
        .post("/feedback", {
          name: this.formData.name.value,
          phone: this.formData.phone.value,
          message: this.formData.message.value
        })
        .then(responce => {
          if (responce.data.status == 200) {
            this.resetFormData();
            this.isVisabled = true;
          } else if (responce.data.status == 400) {
            let data = responce.data.body;

            Object.entries(this.formData).map(item => {
              let [name] = item;
              if (data[name]) {
                this.formData[name].error.isError = true;
                this.formData[name].error.message = data[name][0];
              } else {
                this.formData[name].error.isError = false;
                this.formData[name].error.message = null;
              }
            });
          } else {
            console.log(600, responce.data);
          }
        })
        .catch(error => {});
    },
    closeHandler() {
      this.isVisabled = !this.isVisabled;
    },
    resetFormData() {
      Object.entries(this.formData).map(item => {
        let [name] = item;
        this.formData[name].error.isError = false;
        this.formData[name].error.message = null;
        this.formData[name].value = "";
      });
    }
  }
};
</script>

<style scoped>
textarea:focus,
input[type="text"]:focus,
input[type="tel"]:focus,
.uneditable-input:focus {
  border: 1px solid #ced4da;
  box-shadow: none;
  outline: 0 none;
}
</style>
