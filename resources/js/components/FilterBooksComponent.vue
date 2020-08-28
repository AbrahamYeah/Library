<template>
    <div>
            <input type="search" class="form-control my-1 mr-sm-1" id="name_book" name="name_book"
                autocomplete="false" placeholder="Java" aria-label="Search"
                v-model="queryString" @keyup="getResults()">
                <button type="submit" class="btn btn-primary my-1">Search</button>
            <div class="card" v-if="valida_objeto=true" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for="book in books" :key="book.id">
                        <a class="btn btn-light" @click="inserta(book.id)" >{{book.name_book}} </a>
                    </li>
                </ul>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                queryString: '',
                books: [],
            }
        },
        methods: {
            getResults(){
                this.books = [];
                axios.get('/Search/',{params: {queryString: this.queryString} }).then(response => {
                    response.data.forEach((book) => {
                        this.books.push(book);
                    });
                });
            },
            inserta(id){
                window.location.href="/Library/Detalles/"+id
            }
        },
        computed:{
            valida_objeto(){
                if (this.books.length > 0) {
                    true
                } else{
                    false
                }
            }
        }
     }

    </script>
