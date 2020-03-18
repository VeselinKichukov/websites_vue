<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <form action="/websites" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                   placeholder="Search Website by name">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-outline-success">
                                  Search
                               </button>
                             </span>
                        </div>
                    </form>
                </div>
                <br>
                <div>
                    <div class="card mb-2" v-for='website in displayedWebsites' >
                        <div class="card-header">
                                <h4 class="flex">
                                    {{website.name}}
                                </h4>
                            <span>{{website.created_at}}</span>
                        </div>
                        <div class="card-body">
                            {{website.url}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix btn-group col-md-2 offset-md-5 pb-5" >
            <button type="button" class="btn btn-sm btn-outline-secondary"
                    v-if="page != 1"
                    @click="page--"> <<
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary"
                    v-for="pageNumber in pages.slice(page-1, page+5)"
                    @click="page = pageNumber"> {{pageNumber}}
            </button>
            <button type="button"
                    @click="page++"
                    v-if="page < pages.length"
                    class="btn btn-sm btn-outline-secondary"> >>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                website: 0,
                websites: [],
                page: 1,
                perPage: 9,
                pages: []
            }
        },
        methods:{
            getWebsites(){
                axios.get('/websites')
                    .then(response => {
                        this.websites = response.data;
                    })
                .catch(response => {
                    console.log(response);
                });
            },

            setPages () {
                let numberOfPages = Math.ceil(this.websites.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },

            paginate (websites) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return  websites.slice(from, to);
            }
        },
        created: function(){
            this.getWebsites()
        },

        watch: {
            websites () {
                this.setPages();
            }
        },
        computed: {
            displayedWebsites () {
                return this.paginate(this.websites);
            }
        },
    }
</script>

<style scoped>

</style>
