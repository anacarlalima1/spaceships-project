<template>
    <div class="bg-gray-100 min-h-screen p-8 flex justify-center items-center">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">{{ editing ? 'Editar Espaçonave' : 'Adicionar Nova Espaçonave' }}</h1>
            <form @submit.prevent="editing ? updateSpaceship() : addSpaceship()">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nome</label>
                    <input type="text" id="name" v-model="spaceship.name" class="w-full p-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="model" class="block text-gray-700">Modelo</label>
                    <input type="text" id="model" v-model="spaceship.pilots" class="w-full p-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="manufacturer" class="block text-gray-700">Fabricante</label>
                    <input type="text" id="manufacturer" v-model="spaceship.manufacturer" class="w-full p-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="cost" class="block text-gray-700">Custo em Créditos</label>
                    <input type="number" id="cost" v-model="spaceship.cost" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="length" class="block text-gray-700">Comprimento (metros)</label>
                    <input type="number" id="length" v-model="spaceship.length" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="max_atmosphering_speed" class="block text-gray-700">Velocidade Máxima (km/h)</label>
                    <input type="number" id="max_atmosphering_speed" v-model="spaceship.max_atmosphering_speed" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="crew" class="block text-gray-700">Tripulação</label>
                    <input type="number" id="crew" v-model="spaceship.crew" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="passengers" class="block text-gray-700">Passageiros</label>
                    <input type="number" id="passengers" v-model="spaceship.passengers" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="cargo_capacity" class="block text-gray-700">Capacidade de Carga (kg)</label>
                    <input type="number" id="cargo_capacity" v-model="spaceship.cargo_capacity" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="consumables" class="block text-gray-700">Consumíveis</label>
                    <input type="text" id="consumables" v-model="spaceship.consumables" class="w-full p-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="hyperdrive_rating" class="block text-gray-700">Classificação do Hyperdrive</label>
                    <input type="number" id="hyperdrive_rating" v-model="spaceship.hyperdrive_rating" class="w-full p-2 border rounded-md" min="0" max="10">
                </div>
                <div class="mb-4">
                    <label for="MGLT" class="block text-gray-700">MGLT</label>
                    <input type="number" id="MGLT" v-model="spaceship.MGLT" class="w-full p-2 border rounded-md" min="0">
                </div>
                <div class="mb-4">
                    <label for="starship_class" class="block text-gray-700">Classe da Espaçonave</label>
                    <input type="text" id="starship_class" v-model="spaceship.starship_class" class="w-full p-2 border rounded-md">
                </div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                    {{ editing ? 'Editar Espaçonave' : 'Adicionar Espaçonave' }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            spaceship: {
                name: '',
                model: '',
                manufacturer: null,
                cost: null,
                length: null,
                max_atmosphering_speed: null,
                crew: null,
                passengers: null,
                cargo_capacity: null,
                consumables: null,
                hyperdrive_rating: null,
                MGLT: null,
                starship_class: null,
            },
        };
    },
    computed: {
        editing() {
            return !!this.$store.getters.getSelectedSpaceship;
        },
        selectedSpaceship() {
            return this.$store.getters.getSelectedSpaceship;
        }
    },
    mounted() {
        if (this.editing && this.selectedSpaceship) {
            this.spaceship = {...this.selectedSpaceship};
        }
    },
    methods: {
        addSpaceship() {
            this.$axios.post('/spaceship/save', this.spaceship)
                .then(() => {
                    this.$router.push('/');
                })
                .catch(error => {
                    console.error('Erro ao adicionar espaçonave:', error);
                });
        },
        updateSpaceship() {
            this.$axios.put(`/spaceship/${this.spaceship.id}`, this.spaceship)
                .then(() => {
                    this.$router.push('/');
                })
                .catch(error => {
                    console.error('Erro ao atualizar espaçonave:', error);
                });
        }
    }
};
</script>
