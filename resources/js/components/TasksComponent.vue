<template>
    <div class="no-pd" id="content">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/"> <i class="fas fa-home"></i>Home</a></li>
                    <li><a href="/tasks">All Tasks</a></li>

                </ul>
            </div>
            <div class="category">
                <div class="row">

                    <div class="col-12 col-md-7 col-lg-8 order-md-1">

                        <div class="category_conten -list">
                            <div class="row mb-3">
                                <div class="col-12" v-for=" task in tasks" :key="task.id">
                                    <div class="post-card -small -horizontal mb-4"><a class="card__cover"
                                            :href="'/single-task/'+ task.id" tabindex="0"><img src="assets/images/posts/3.png"
                                                alt="I want to create a logo with illustrator hacker"></a>
                                        <div class="card__content">
                                            <a class="card__content-title"  :href="'/single-task/'+ task.id"
                                                tabindex="0">{{ task.title }}</a>
                                            <div class="card__content-info">
                                                <div class="info__time"><i class="far fa-clock"></i>
                                                    <p>Clock {{ task.created }}</p>
                                                </div>

                                            </div>
                                            <p class="card__content-description">{{task.description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="pagination">
                            <ul>
                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                <li class="pagination__page-number"><a href="javascript:void(0)">2</a></li>
                                <li class="pagination__page-number"><a href="javascript:void(0)">3</a></li>
                                <li><a class="next" href="javascript:void(0)">></a></li>
                            </ul>
                        </div> -->
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
                tasks: [],
            };
        },

        mounted() {
            this.allTasks()

        },

        methods: {
            allTasks() {
                axios.get('/api/tasks')
                    .then(response => {
                        console.log(response)
                        this.tasks = response.data.alltasks;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }

</script>

<style>

</style>
