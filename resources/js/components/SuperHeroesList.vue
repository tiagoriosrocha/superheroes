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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <v-data-table
                    :headers="headers"
                    :items="superheroes"
                    :items-per-page="10"
                    class="elevation-2"
                >

                <template v-slot:item.alinhamento="{ item }">
                    <span v-if="item.alinhamento == 'good'" class="badge badge-primary">BEM</span>
                    <span v-else-if="item.alinhamento == 'bad'" class="badge badge-danger">MAL</span>
                    <span v-else class="badge badge-light">INDEFINIDO</span>
                </template>

                </v-data-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data () {
            return {
                campobusca: "",
                superheroes: [],
                headers: [
                              {
                                text: 'Id',
                                align: 'start',
                                sortable: false,
                                value: 'id',
                              },
                              { text: 'Nome', value: 'nome' },
                              { text: 'Raça', value: 'raca' },
                              { text: 'Editora', value: 'editora' },
                              { text: 'Alinhamento', value: 'alinhamento' },
                        ],
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
