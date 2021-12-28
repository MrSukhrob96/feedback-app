<template>
  <div v-if="isVisabled" class="overlay">
    <div id="modal">
      <div class="card border-0 box-shadow p-5">
        <img
          class="card-img-top"
          src="https://media.istockphoto.com/vectors/email-sent-or-received-icon-concept-envelope-with-check-mark-vector-vector-id929922186?k=20&m=929922186&s=170667a&w=0&h=YxbemXvTxrPxDB5lPgPDrXjtgFz80WpaEk5D1U-lvKI="
          alt="Card image cap"
        />
        <div class="card-body">
          <button class="btn btn-danger px-5 py-3" @click="closeHandler">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>
 
 <script>
export default {
  props: {
    isVisabled: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    closeHandler() {
      this.$emit("setVisable", this.isVisabled);
    }
  },
  mounted() {

  }
};
</script>
 
 <style scoped>
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.card {
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-img-top {
  width: 200px;
  height: 200px;
  object-fit: cover;
}

#modal {
  width: 450px;
  animation: modalFade 0.5s linear;
}

@keyframes modalFade {
  0% {
    transform: translateY(-50px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}
</style>