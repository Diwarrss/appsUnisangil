<template>
  <!-- pagina para el sistema de login bases de datos http://centuria.unisangil.edu.co/bases-de-datos -->
  <div class="row justify-content-center main_login_bd">

    <div class="card col-md-4 col-12">
      <div class="img_header text-center">
        <i class="fas fa-user-alt"></i>
      </div>
      <div class="card-body">
        <form @submit.prevent="loginVortal">
          <div class="form-group">
            <strong><label for="exampleInputPassword1">Usuario Vortal</label></strong>
            <input v-model="user" type="text" :class="{ 'is-invalid' : errors.user || errors.error}" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="juanitodiaz">
            <span
              class="help-block text-danger"
              v-if="errors.user"
              v-text="errors.user[0]"
            ></span>
            <span
              class="help-block text-danger"
              v-if="errors"
              v-text="errors.error"
            ></span>
          </div>
          <div class="form-group">
            <strong><label for="exampleInputEmail1">Email Institucional</label></strong>
            <input v-model="email" type="email" :class="{'is-invalid' : errors.email || errors.error}" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="emailx@unisangil.edu.co">
            <span
              class="help-block text-danger"
              v-if="errors.email"
              v-text="errors.email[0]"
            ></span>
            <span
              class="help-block text-danger"
              v-if="errors"
              v-text="errors.error"
            ></span>
            <!-- <small id="emailHelp" class="form-text text-muted">Ingresa tu E-mail universitario.</small> -->
          </div>

          <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary" :disabled="sendInfo">
              <div v-if="sendInfo">
                <div class="spinner-border spinner-border-sm text-light" role="status"></div> Ingresando
              </div>
              <div v-if="!sendInfo">
                <i class="fas fa-sign-in-alt"></i> Ingresar
              </div>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      urlApi: process.env.MIX_API_PGSQL,
      user: '',
      email: '',
      errors: {},
      data: {},
      sendInfo: false,
      errorSend: 0
    }
  },
  methods: {
    loginVortal(){
      let me = this
      me.sendInfo = true

      if (me.validation()) {
        //si devuelve 1 para el error
        me.sendInfo = false
        return;
      }
      //envia datos para consultar en la API
      axios.post(me.urlApi, {
        user: me.user,
        email: me.email
      })
      .then(res => {
        //console.log(res)
        me.data = res.data;
        if (res.data.type === 'success') {
          //console.log('success')
          let arrayResult = res.data.data //obtenemos la respuesta de data

          me.sendInfo = false
        }else{
          me.$swal({
            //toast: true,
            icon: "error",
            title: "!Usuario no existe!",
            showConfirmButton: false,
            timer: 2500
          });
          me.sendInfo = false
        }
      })
      .catch(err => {
        if (err.response.status == 422) {
          //preguntamos si el error es 422
          me.errors = err.response.data.errors;
          me.sendInfo = false
        }
        me.sendInfo = false
      })
    },
    validation(){
      let me = this
      me.errorSend = 0
      me.errors = {}

      if (!me.email || !me.user) {
        me.errors = { error: 'El campo es obligatorio.' }
        me.errorSend = 1
      }else{
        me.errorSend = 0
      }
      return me.errorSend;
    }
  },
}
</script>
<style lang="scss">
  .main_login_bd{
    .img_header{

    }
  }
</style>
