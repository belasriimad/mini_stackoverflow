<template>
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    comments
                </div>
                <div class="card-body">
                    <div v-if="user_id && verified_user">
                        <div class="form-group mb-3">
                            <textarea v-model="body" class="form-control"
                            cols="30" rows="2"
                            placeholder="Type here...."></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-sm btn-dark"
                                v-show="body.length"
                                @click="addComment">
                                submit
                            </button>
                        </div>
                    </div>
                    <div v-else>
                        <a :href="to" class="btn btn-link">
                            Login to comment / Verify your account
                        </a>
                    </div>
                    <ul class="list-group" v-if="comments.length">
                        <li class="list-group-item d-flex flex-column"
                            v-for="(comment,index) in comments" :key="index">
                            <span><b>{{comment.user.name}}:</b> <i>{{comment.body}}</i></span>
                            <span>{{comment.created_at}}</span>
                        </li>
                    </ul>
                    <div class="alert alert-dark" v-else>
                        No comments yet !
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['question_id','user_id','verified_user'],
    data() {
        return {
            body: '',
            comments: [],
            to: !this.user_id && !this.verified_user ? '/login' : '/email/verify'
        }
    },
    mounted(){
        this.getComments();
    },
    methods : {
        addComment(){
            const comment = {
                            body: this.body,
                            question_id: this.question_id,
                            user_id: this.user_id
                        };
            axios.post('/api/comments/add',comment)
                .then(res => {
                    if(res.data.success){
                        this.body = '';
                        this.getComments();
                    }
                }).catch(err => console.log(err));
        },
        getComments(){
            axios.get(`/api/question/${this.question_id}/comments`)
                .then(res => {
                    this.comments = res.data;
                }).catch(err => console.log(err));
        }
    }
}
</script>
