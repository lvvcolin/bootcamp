<template>
    <div>
        <form @submit.prevent="AddReaction">
            <input
                class="form-control form-control-lg"
                type="text"
                placeholder="message"
                aria-label=".form-control-lg example"
                name="message"
                v-model="reaction.message"
            />
            <button type="submit" class="btn btn-light btn-block">Save</button>
        </form>
        <ul>
            <li
                class="list-group-item"
                v-for="reaction in reactions"
                v-bind:key="reaction.id"
            >
                <div class="row">
                    <div class="col-md-12">
                        {{ reaction.user.name }}
                    </div>
                    <div class="col-md-12">
                        {{ reaction.message }}
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ["auth_user", "assignment"],
    data() {
        return {
            reactions: [],
            reaction: {
                message: "",
                user_id: this.auth_user.id,
                assignment_id: this.assignment.id
            },
            reaction_id: "",
            edit: false
        };
    },

    created() {
        this.fetchReactions();
    },

    methods: {
        fetchReactions() {
            var uri = location.pathname;
            fetch(uri + "/reactions")
                .then(res => res.json())
                .then(res => {
                    // console.log(res)
                    this.reactions = res;
                });
        },
        // deleteArticle(id) { 32:36 verder kijken
        //     if(confirm('Are You Sure?')){
        //
        //     }
        // },
        AddReaction() {
            if (this.edit === false) {
                var uri = location.pathname;
                // Add
                fetch(uri + "/reactions/create", {
                    method: "post",
                    body: JSON.stringify(this.reaction),
                    headers: {
                        "content-type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    }
                })
                .then(data => {
                    this.reaction.message = "";
                    this.fetchReactions();
                })
                .catch(err => console.log(err));
            } else {
                // Update
            }
        }
    }
};
</script>
