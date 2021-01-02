<template>
    <div id="homestay-room-cards">
        <ubah-room-card
            style="margin-top: 16px; margin-bottom: 16px;"
            v-for="room in rooms"
            :key="room.id"
            :room="room"></ubah-room-card>
    </div>
</template>

<script>
function Room(room) {
    this.room = room;
}

import UbahRoomCard from './UbahRoomCard.vue';

export default {
    props: ['rooms'],
    components: {
        UbahRoomCard
    },
}
</script>
