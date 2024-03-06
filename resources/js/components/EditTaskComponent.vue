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
              <form @submit.prevent="editTask">
                <input
                  type="text"
                  placeholder="Title"
                  name="title"
                  v-model="title"
                />
                <textarea
                  name="description"
                  cols="30"
                  rows="8"
                  v-model="description"
                  placeholder="Message"
                ></textarea>
                <button class="btn -normal">
                  {{ loading ? "loading..." : "Update" }}
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
import axios from 'axios';
export default {


    props:{
        task: "",
    },
    data() {
    return {
      title: this.task.title,
      description: this.task.description,
      loading: false,
    };
  },
    methods: {
        editTask() {

      this.loading = true;
      axios.put(`/api/edit-task/${this.task.id}`, {
          title: this.title,
          description: this.description,
        })
        .then((response) => {
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
                  window.location.href = `/single-task/${this.task.id}`;
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

    },
  },
}
</script>

<style>

</style>
