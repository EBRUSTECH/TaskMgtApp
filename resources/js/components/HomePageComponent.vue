<template>
   <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3  mb-3" v-for="task in tasks" :key="task.id">
                    <div class="post-card -center"><a class="card__cover" href="post_standard.html"><img src="assets/images/posts/1.png" alt="Looking for some feedback for this rejected track"/></a>
                <div class="card__content">
                 <a class="card__content-title" :href="'/single-task/' + task.id"> {{ task.title }}</a>
                  <div class="card__content-info">
                    <div class="info__time"><i class="far fa-clock"></i>
                      <p>Clock {{ task.created }},</p>
                    </div>
                    <div class="info__comment"><i class="far fa-clock"></i>
                      <p :class="task.completed ? 'text-success' : 'text-danger'"> {{ task.completed ? "completed" : 'Not completed'  }}</p>
                    </div>
                  </div>
                </div>
              </div>

                </div>

            </div>


          <div class="center"><a class="btn -normal load-more-btn" :href="'/tasks'">Load more tasks</a></div>

        </div>
      </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [],
        };
    },
    mounted() {
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data.tasks;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
}
</script>


