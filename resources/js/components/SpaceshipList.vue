<template>
    <div class="bg-gray-100 min-h-screen p-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">
                Spaceship List
            </h1>
            <ul>
                <li
                    v-for="spaceship in spaceships"
                    :key="spaceship.id"
                    class="flex justify-between items-center bg-blue-100 rounded-lg p-4 mb-4 shadow-md hover:bg-blue-200 transition-colors"
                >
          <span class="text-lg font-semibold text-gray-800">
            {{ spaceship.name }}
          </span>
                    <span class="text-sm text-gray-600 italic">{{ spaceship.model }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            spaceships: [
                { id: 1, name: "Millennium Falcon", model: "YT-1300" },
                { id: 2, name: "X-Wing", model: "T-65" }
            ]
        };
    }
};
</script>

<style scoped>
/* Estilos adicionais para complementar */
</style>
