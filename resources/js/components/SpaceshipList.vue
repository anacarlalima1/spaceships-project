<template>
    <div class="bg-gray-100 min-h-screen p-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-4xl font-bold text-blue-600">Lista de Espaçonaves</h1>
                <button
                    @click="$router.push('/add-spaceship')"
                    class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700"
                >
                    Adicionar Nova Espaçonave
                </button>
            </div>

            <div v-if="spaceships.length > 0" class="overflow-x-auto">
                <table class="min-w-full bg-white border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm">
                        <th class="py-2 px-4 border-b">Nome</th>
                        <th class="py-2 px-4 border-b">Modelo</th>
                        <th class="py-2 px-4 border-b">Fabricante</th>
                        <th class="py-2 px-4 border-b">Custo (créditos)</th>
                        <th class="py-2 px-4 border-b">Comprimento (metros)</th>
                        <th class="py-2 px-4 border-b">Velocidade (km/h)</th>
                        <th class="py-2 px-4 border-b">Tripulação</th>
                        <th class="py-2 px-4 border-b">Passageiros</th>
                        <th class="py-2 px-4 border-b">Capacidade de Carga (kg)</th>
                        <th class="py-2 px-4 border-b">Consumíveis</th>
                        <th class="py-2 px-4 border-b">Classificação do Hyperdrive</th>
                        <th class="py-2 px-4 border-b">MGLT</th>
                        <th class="py-2 px-4 border-b">Classe</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="spaceship in spaceships" :key="spaceship.id" class="border-t hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ spaceship.name }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.model }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.manufacturer }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.cost_in_credits }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.length }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.max_atmosphering_speed }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.crew }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.passengers }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.cargo_capacity }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.consumables }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.hyperdrive_rating }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.MGLT }}</td>
                        <td class="py-2 px-4 border-b">{{ spaceship.starship_class }}</td>
                        <td class="py-2 px-4 border-b flex space-x-4">
                            <i class="fas fa-edit text-blue-500 cursor-pointer hover:text-blue-700" @click="editSpaceship(spaceship)"></i>
                            <i class="fas fa-trash text-red-500 cursor-pointer hover:text-red-700" @click="confirmDelete(spaceship.id)"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex justify-center items-center">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm">
                    <h2 class="text-lg font-bold mb-4">Confirmar exclusão</h2>
                    <p>Você tem certeza que deseja excluir a espaçonave?</p>
                    <div class="flex justify-end mt-4">
                        <button @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 mr-2">Cancelar</button>
                        <button @click="deleteSpaceship" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Deletar</button>
                    </div>
                </div>
            </div>

            <div v-else class="text-center">
                <p class="text-gray-600">Nenhuma espaçonave disponível no momento.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            spaceships: [],
            showModal: false,
            spaceshipIdToDelete: null,
        };
    },
    mounted() {
        this.fetchSpaceships();
    },
    methods: {
        fetchSpaceships() {
            this.$axios.get('/spaceship/list')
                .then(response => {
                    this.spaceships = response.data;
                })
                .catch(error => {
                    console.error('Erro ao buscar espaçonaves:', error);
                });
        },
        confirmDelete(id) {
            this.spaceshipIdToDelete = id;
            this.showModal = true;  // Exibe o modal de confirmação
        },
        deleteSpaceship() {
            this.$axios
                .delete(`/spaceship/${this.spaceshipIdToDelete}`)  // Executa o DELETE
                .then(() => {
                    this.fetchSpaceships();  // Atualiza a lista após deletar
                    this.showModal = false;  // Fecha o modal
                })
                .catch((error) => {
                    console.error('Erro ao deletar espaçonave:', error);
                });
        },
        editSpaceship(spaceship) {
            this.$store.dispatch('selectSpaceship', spaceship);
            this.$router.push('/add-spaceship');
        }
    },
};
</script>

<style scoped>
</style>
