<template>
    <div id="content">
        <div class="post">
            <div class="container">
                <div class="post-standard">
                    <div class="post-standard__banner">
                        <div class="post-standard__banner__image"><img
                                src="/assets/images/post_detail/standard/banner.png" alt="Post banner image" /></div>
                        <div class="post-standard__banner__content">
                            <div class="post-card -center">

                                <div class="card__content">
                                    <a class="card__content-title" href="post_standard.html">{{task.title}}</a>
                                    <div class="card__content-info">
                                        <div class="info__time"><i class="far fa-clock"></i>
                                            <p>Clock {{task.created}}</p>
                                        </div>
                                        <div class="info__comment"><i class="far fa-comment"></i>
                                            <p>{{task.completed ? 'completed' : 'not completed'}}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8 mx-auto">
                            <div class="post-standard__content">

                                <p class="paragraph">{{ task.description }}</p>

                                <div class="post-footer">
                                    <div class="post-footer__tags center">
                                        <div class="tags-group">
                                            <button class="btn btn-warning me-3"
                                                @click="navigateToRoute(task.id)">Edit</button>
                                            <button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button>
                                            <button class="btn btn-danger mt-3 mt-lg-0 ms-2" @click="markTask(task.id)">Mark as complete</button>
                                        </div>
                                    </div>


                                    <!-- <div class="post-footer__comment">


                      <h3 class="comment-title"> <span>Leave a comment</span></h3>
                      <div class="post-footer__comment__form">
                        <form action="#">
                          <div class="row">
                            <div class="col-12 col-sm-4">
                              <input type="text" placeholder="Name" name="name"/>
                            </div>
                            <div class="col-12 col-sm-4">
                              <input type="email" placeholder="Email" name="email"/>
                            </div>
                            <div class="col-12 col-sm-4">
                              <input type="text" placeholder="Webiste" name="website"/>
                            </div>
                          </div>
                          <textarea cols="30" rows="5" placeholder="Messages" name="message"></textarea>
                        </form>
                        <div class="center">
                          <button class="btn -normal">Submit</button>
                        </div>
                      </div>
                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        //tasks as a property that is loaded from the database.
        props: {
            task: "",
        },

        methods: {
            //route to edit task
            navigateToRoute(id) {
                window.location.href = '/edit-task/' + id;
            },
            //delete task method
            deleteTask(id) {
        
                Swal.fire({
                        title: "Please Confirm you want to delete this",

                        icon: "warning",
                        //showDenyButton: true,
                        showDenyButton: true,
                        confirmButtonText: "proceed",
                        denyButtonText: "cancel",

                        denyButtonColor: "#d33",
                        backdrop: `
                    rgba(0,0,123,0.4)

                    `,

                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/api/delete-task/${id}`)
                    .then((response) => {
                        if (response.data.success) {
                            swal
                                .fire({
                                    title: "Good job!",
                                    text: response.data.message,
                                    icon: "success",
                                    backdrop: `
                    rgba(0,0,123,0.4)
                    `,
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        this.location = false;
                                        window.location.href = '/';
                                    }
                                });
                        } else {
                            swal.fire({
                                title: "Ooops!",
                                text: "Something went wrong try again",
                                icon: "error",
                                backdrop: `
                    rgba(0,0,123,0.4)

                    `,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.location = false;
                                    window.location.reload();
                                }
                            });;
                        }
                    })
                    .catch((error) => {
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
                        });;
                    })
                            // Disable the submit button


                        } else if (Swal.DismissReason.backdrop) {
                            Swal.fire("Delete Cancelled", "", "info");

                        } else if (result.isDenied) {

                            Swal.fire("Purchase Cancelled", "", "info");
                        }
                    });

            },

            markTask(id) {

                axios.get(`/api/mark-task/${id}`)
                    .then((response) => {
                        if (response.data.success) {
                            Swal.fire({
                                    title: "Good job!",
                                    text: response.data.message,
                                    icon: "success",
                                    backdrop: `
                    rgba(0,0,123,0.4)
                    `,
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        this.location = false;
                                        window.location.href = '/';
                                    }
                                });
                        } else {
                            swal.fire({
                                title: "Ooops!",
                                text: "Something went wrong try again",
                                icon: "error",
                                backdrop: `
                    rgba(0,0,123,0.4)

                    `,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.location = false;
                                    window.location.reload();
                                }
                            });;
                        }
                    })
                    .catch((error) => {
                        swal.fire({
                            title: "Ooops!",
                            text: "Something went wrong try again",
                            icon: "error",
                            backdrop: `
                    rgba(0,0,123,0.4)

                    `,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.location = false;
                                window.location.reload();
                            }
                        });;
                    })
            }
        }
    }

</script>

<style>

</style>
