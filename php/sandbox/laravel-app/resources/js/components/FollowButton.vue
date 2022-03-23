<template>
    <button class="btn btn-primary btn-sm" @click="followUser" v-text="buttonText" />
</template>

<script>
export default {
    props: ["userId", "follows"],
    data: function () {
        return {
            status: this.follows,
        };
    },
    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        followUser() {
            axios
                .post(`/follow/${this.userId}`)
                .then((response) => {
                    this.status = !this.status;
                })
                .catch((error) => {
                    if (error.response.status === 401)
                        return (window.location = "/login");
                });
        },
    },
};
</script>
