<template>
    <div class="container">
        <div>
            <youtube
                :video-id="videoId"
                @ready="ready"
                @playing="playing"
                @paused="paused"
                :player-vars="{autoplay: 1}">
            </youtube>
            <button @click="toggleStatus" class="btn btn-dark">Грати / пауза</button>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import VueYouTubeEmbed from 'vue-youtube-embed'
    Vue.use(VueYouTubeEmbed)

    export default {
        props: ['url'],

        data() {
            return {
                videoId: this.url.substring(this.url.indexOf('=') + 1),
                status: false
            }
        },

        created() {
            this.getStatus();
        },

        methods: {
            ready (event) {
                this.player = event.target;
            },

            playing () {
                //axios.post('toggleVideoPlayer', {status: true});
            },

            paused () {
                //axios.post('toggleVideoPlayer', {status: false});
            },

            getStatus () {
                Echo.channel('video-player')
                    .listen('ToggleVideoPlayer', (e) => {
                        if (e.status) {
                            this.player.playVideo();
                            this.status = true;
                        } else {
                            this.player.pauseVideo();
                            this.status = false;
                        }
                    });
            },

            toggleStatus() {
                this.status = !this.status;

                if (this.status) {
                    axios.post('toggleVideoPlayer', {status: true});
                } else {
                    axios.post('toggleVideoPlayer', {status: false});
                }
            }
        }
    }
</script>
