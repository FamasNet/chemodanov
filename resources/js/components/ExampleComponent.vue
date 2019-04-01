<template>
    <div> 
        <button ref = 'like' @click.prevent='toggleColorLike(post_Id)'  class="btn btn-light like">Like: {{ this.countLike }}</button>
        <button ref = 'dislike' @click.prevent='toggleColorDislike(post_Id)' class="btn btn-light dislike">Dislike: {{ this.countDislike }} </button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log(this.like)
        },
    props: ['like', 'dislike','postid'],
    data: function () {
        return {
            flagLike: false,
            flagDislike: false,
            countLike: this.like,
            countDislike: this.dislike,
            post_Id: this.postid,
            count: 0
        }
    },
    methods: {
        toggleColorLike(post_Id) {
            const typeColorLike = this.$refs.like.getAttribute('class');
            if (typeColorLike === 'btn btn-light like' && this.flagLike === false && this.flagDislike === false) {
                this.like = 1;
                this.flagLike = true;
                this.$refs.like.setAttribute('class', 'btn btn-success like');

                try{
                    axios.get('posts/pluslike',  { postId: post_Id }).then((response) => {
                        console.log(response.data);
                    });
                } catch {
                    
                }
                
            } else if (this.flagLike === true && this.flagDislike === false ) {
                this.like = 0;
                this.flagLike = false
                this.$refs.like.setAttribute('class', 'btn btn-light like');
            }
        },
        toggleColorDislike() {
            const typeColorDislike = this.$refs.dislike.getAttribute('class');
            if (typeColorDislike === 'btn btn-light dislike' && this.flagLike === false && this.flagDislike === false) {
                this.dislike = 1;
                this.flagDislike = true;
                this.$refs.dislike.setAttribute('class', 'btn btn-danger dislike');
            } else if (this.flagDislike === true && this.flagLike === false ) {
                this.dislike = 0;
                this.flagDislike = false
                this.$refs.dislike.setAttribute('class', 'btn btn-light dislike');
            }
        },
        

    },   
}
</script>
