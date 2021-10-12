<template>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <i class="fas fa-chevron-up fw-bold"
                style="cursor:pointer" @click="voteUp"></i>
            </div>
            <div class="card-body text-center">
                <span class="fw-bold">
                    {{ questionVotes }}
                </span>
            </div>
            <div class="card-footer text-center">
                <i class="fas fa-chevron-down fw-bold"
                style="cursor:pointer" @click="voteDown"></i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['votes','id'],
        data() {
            return {
                questionVotes : 0
            }
        },
        mounted() {
            this.questionVotes = this.votes;
        },
        methods : {
            voteUp(){
                axios.get(`/api/questions/${this.id}/voteup`)
                    .then(res => {
                        this.questionVotes++;
                    }).catch(err => console.log(err));
            },
            voteDown(){
                axios.get(`/api/questions/${this.id}/votedown`)
                    .then(res => {
                        this.questionVotes--;
                    }).catch(err => console.log(err));
            }
        }
    }
</script>
