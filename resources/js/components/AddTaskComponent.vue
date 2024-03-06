<template>
    <div class="no-pd" id="content">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="/"> <i class="fas fa-home"></i>Home</a>
                    </li>
                    <li><a href="#">Create Task</a></li>
                </ul>
            </div>
            <div class="contact-us">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="contact-us__form">
                            <h3 class="contact-title">Create Task</h3>
                            <div v-if="errors.length" class="mt-4">
                                <h3 class="text-danger">Error(s):</h3>
                                <div class="alert alert-danger text-dark mt-3 alert-dismissible fade show" v-for="error in errors" :key="error">
                                    {{ error }}

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            </div>
                            <form @submit.prevent="createTask">
                                <input type="text" placeholder="Title" name="title" v-model="title" />
                                <textarea name="description" cols="30" rows="8" v-model="description"
                                    placeholder="Message"></textarea>
                                <button class="btn -normal">
                                    {{ loading ? "loading..." : "Create" }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: "",
                description: "",
                loading: false,
                errors: [],
            };
        },
        methods: {
            createTask() {
                  if (!this.title || !this.description) {
                    Swal.fire({
                      title: "Fill required Fields",
                      backdrop: `
                                rgba(0,0,123,0.4)

                                `,
                      showClass: {
                        popup: `
                                            animate__animated
                                            animate__fadeInUp
                                            animate__faster
                                                `,
                      },
                      hideClass: {
                        popup: `
                                            animate__animated
                                            animate__fadeOutDown
                                            animate__faster
                                            `,
                      },
                      text: "",
                      icon: "warning",
                    });

                    return;
                  }
                this.loading = true;
                axios
                    .post("/api/add-task", {
                        title: this.title,
                        description: this.description,
                    })
                    .then((response) => {
                        console.log(response.data.status);
                        if (response.data.status) {
                            swal
                                .fire({
                                    title: "Good job!",
                                    text: "Task added successfully",
                                    icon: "success",
                                    backdrop: `
                    rgba(0,0,123,0.4)
                    `,
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        this.location = false;
                                        window.location.href = "/";
                                    }
                                });
                        }
                    })
                    .catch((error) => {
                        if (error.response.status === 422) {
                            this.loading = false;
                            // Handle validation errors
                            this.errors = Object.values(error.response.data.errors).flat();
                        } else {
                            //just returm alert
                            swal.fire({
                                title: "Ooops!",
                                text: "Something went wrong try again",
                                icon: "error",
                                button: "OK",
                                backdrop: `
                    rgba(0,0,123,0.4)

                    `,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.location = false;
                                    window.location.reload();
                                }
                            });
                        }

                    })

            },
        },
    };

</script>

<style>
</style>
