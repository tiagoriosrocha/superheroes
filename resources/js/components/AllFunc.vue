<template>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buscar Super-Herói</div>

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
                    <div v-if="superheroes.length > 0">
                    <div class="card-body">
                        
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Raça</th>
                              <th scope="col">Editora</th>
                              <th scope="col">Alinhamento</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="sh in superheroes" :key="superheroes.id">
                              <th scope="row">{{sh.id}}</th>
                              <td>{{sh.nome}}</td>
                              <td>{{sh.raca}}</td>
                              <td>{{sh.editora}}</td>
                              <td>
                                <span v-if="sh.alinhamento == 'good'" class="badge badge-primary">GOOD</span>
                                <span v-else-if="sh.alinhamento == 'bad'" class="badge badge-danger">BAD</span>
                                <span v-else class="badge badge-light">UNDEFINED</span>
                              </td>
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
                superheroes: []
            }
        },

        mounted(){
            this.axios
                .get('http://localhost:8000/buscar-nome-async')
                .then(response => {
                    this.superheroes = response.data;
            });
        },

        methods: {
            limparBusca(event){
                if(this.campobusca == "")
                    this.axios
                    .get('http://localhost:8000/buscar-nome-async')
                    .then(response => {
                        this.superheroes = response.data;
                    });
            },

            buscar(event){
                const arrayBusca = [];
                for(var i=0; i<this.superheroes.length; i++){
                    var sh = this.superheroes[i];
                    var regex = new RegExp("^" + this.campobusca,'i');
                    if(sh.nome.match(regex)){
                        arrayBusca.push(sh);
                    }
                }
                this.superheroes = arrayBusca;
            }
        }
    }
</script>
