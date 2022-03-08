<template>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buscar Funcionários</div>

                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="inputEmail4" class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-8">
                                    <input @keyup.delete="limparBusca" type="email" v-model="campobusca" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-sm-2">
                                    <a @click="buscar" class="btn btn-primary btn-md" role="button" aria-pressed="true">Buscar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div v-if="funcionarios.length > 0">
                    <div class="card-body">
                        
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Idade</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="func in funcionarios" :key="funcionarios.id">
                              <th scope="row">{{func.id}}</th>
                              <td>{{func.nome}}</td>
                              <td>{{func.email}}</td>
                              <td>{{func.idade}}</td>
                            </tr>
                          </tbody>
                          </table>
                    </div>
                    </div>
                    <div v-else>
                        0 Elementos encontrados.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data () {
            return {
                campobusca: "",
                funcionarios: []
            }
        },

        mounted(){
            this.axios
                .get('http://localhost:8000/buscar-nome-async')
                .then(response => {
                    this.funcionarios = response.data;
                    console.log(this.funcionarios);
            });
        },

        methods: {
            limparBusca(event){
                if(this.campobusca == "")
                    this.axios
                    .get('http://localhost:8000/buscar-nome-async')
                    .then(response => {
                        this.funcionarios = response.data;
                        console.log(this.funcionarios);
                    });
            },

            buscar(event){
                this.axios
                    .get('http://localhost:8000/buscar-nome-async/' + this.campobusca)
                    .then(response => {
                        this.funcionarios = response.data;
                        console.log(this.funcionarios);
                    });
            }
        }
    }
</script>
