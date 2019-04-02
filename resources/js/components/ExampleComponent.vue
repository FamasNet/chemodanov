<template>
    <div form-group> 
        <button ref = 'like' @click.prevent='toggleColorLike()'  class="btn btn-light like">Like: {{ like }}</button>
        <button ref = 'dislike' @click.prevent='toggleColorDislike()' class="btn btn-light dislike">Dislike: {{ dislike }} </button>
    </div>
</template>

<script>
    export default {
        created() {
            this.getLike();
            this.getDislike();
            this.getLikesUser();
        },
        props: ['postid','user'],
        data: function () {
            return {
                flagLike: false,
                flagDislike: false,
                dislike: null,
                like: null,
                count: 0
            }
        },
        methods: {
            toggleColorLike() {
                const typeColorLike = this.$refs.like.getAttribute('class');
                if (typeColorLike === 'btn btn-light like' && this.flagLike === false && this.flagDislike === false) {
                   this.likeАctivation();
                } else if (this.flagLike === true && this.flagDislike === false ) {
                   this.likeDeactivation();
                }
            },
            toggleColorDislike() {
                const typeColorDislike = this.$refs.dislike.getAttribute('class');
                if (typeColorDislike === 'btn btn-light dislike' && this.flagLike === false && this.flagDislike === false) {
                    this.dislikeАctivation();
                } else if (this.flagDislike === true && this.flagLike === false ) {
                    this.dislikeDeactivation();
                }
            },
            likeАctivation() {
                this.flagLike = true;
                this.$refs.like.setAttribute('class', 'btn btn-success like');
                this.plusLike();
            },
            likeDeactivation() {
                this.flagLike = false
                this.$refs.like.setAttribute('class', 'btn btn-light like');
                this.minusLike();
            },
            dislikeАctivation() {
                this.flagDislike = true;
                this.$refs.dislike.setAttribute('class', 'btn btn-danger dislike');
                this.plusDislike();
            },
            dislikeDeactivation() {
                this.flagDislike = false
                this.$refs.dislike.setAttribute('class', 'btn btn-light dislike');
                this.minusDislike();
            },
            getLikesUser() { 
                    axios.get('posts/userlike',  {
                        params: {
                            postId: this.postid,
                            userId: this.user,
                        }
                    }).then((response) => {
                        if(response.data.statusLike){
                            this.flagLike = true;
                            this.$refs.like.setAttribute('class', 'btn btn-success like');
                        }
                        if(response.data.statusDislike){
                            this.flagDislike = true;
                            this.$refs.dislike.setAttribute('class', 'btn btn-danger dislike');
                        }
                        
                        
                    });
            },

            getLike() {
                
                axios.get('posts/getlike',  {
                        params: {
                            postId: this.postid
                        }
                    }).then((response) => {
                        this.like = response.data.like;
                    });
            },
            getDislike() {
                
                axios.get('posts/getdislike',  {
                        params: {
                            postId: this.postid
                        }
                    }).then((response) => {
                        this.dislike = response.data.dislike;
                    });
            },
            plusLike() {
                
                axios.get('posts/pluslike',  {
                        params: {
                            postId: this.postid,
                            userId: this.user,
                        }
                    }).then((response) => {
                        this.like = response.data.like;
                    });
            },
            minusLike() {
                
                axios.get('posts/minuslike',  {
                        params: {
                            postId: this.postid,
                            userId: this.user
                        }
                    }).then((response) => {
                        this.like = response.data.like;
                    });
            },
            plusDislike() {
                
                axios.get('posts/plusdislike',  {
                        params: {
                            postId: this.postid,
                            userId: this.user
                        }
                    }).then((response) => {
                        this.dislike = response.data.dislike;
                    });
            },
            minusDislike() {
                
                axios.get('posts/minusdislike',  {
                        params: {
                            postId: this.postid,
                            userId: this.user
                        }
                    }).then((response) => {
                        this.dislike = response.data.dislike;
                    });
            }
            

        },   
    }
</script>
