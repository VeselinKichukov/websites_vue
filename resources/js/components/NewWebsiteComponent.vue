<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">Create a new Website</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="name"></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Name"
                                    value=""
                                    class="form-control mb-3"
                                    :class="form.errors.name ? 'border-danger' : 'border-light'"
                                    v-model="form.name"
                                    required>
                                <span class="text-xs italic text-red-500"
                                      v-if="form.errors.name"
                                      v-text="form.errors.name[0]">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="url"></label>
                                <textarea
                                    type="url"
                                    name="url"
                                    id="url"
                                    placeholder="URL"
                                    class="form-control mb-3"
                                    rows="2"
                                    :class="form.errors.url ? 'border-danger' : 'border-light'"
                                    v-model="form.url"
                                     required>
                                </textarea>
                                <span class="alert alert-danger "
                                      v-if="form.errors.url"
                                      v-text="form.errors.url[0]">
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import WebsiteForm from "./WebsiteForm";

    export default {
        data() {
            return {
                form: new WebsiteForm({
                    name: '',
                    url: ''
                })
            };
        },

        methods: {
            async submit() {

                this.form.submit('/api/websites')
                    .then(response => location = response.data.message)
            }
        }
    }
</script>

<style scoped>

</style>
