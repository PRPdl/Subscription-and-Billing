<template>
<div>
    <ul class="chat">
       
        <li class="left clearfix" v-for="message in messagesToDisplay">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title user-name" v-bind:userName="avatar(message.user.name)">
                      <strong>  {{ message.user.name }} </strong>

                </h5>
                <p class="card-text text-message">
                    {{ message.message }}
                </p>
            </div>
        </div>
        </li>

    </ul>
    
    <button @click="showLess = !showLess">
        {{showLess === true ? "Show All" : "Show Less"}}
    </button>
</div>
</template>

<script>
  export default {

props: ['messages'],

data() {
    return {
        showLess: true
    }
},

methods: {
    avatar: function(name){
        return name.charAt(0);
    }
},

  computed: {
        messagesToDisplay: function() {
            if(this.showLess) {
                return this.messages.slice(-5);
            } else {
                return this.messages;
            }
        }
    },



  };

</script>