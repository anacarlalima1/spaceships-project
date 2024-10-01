import { createStore } from 'vuex';

export default createStore({
    state: {
        selectedSpaceship: null,
    },
    mutations: {
        setSelectedSpaceship(state, spaceship) {
            state.selectedSpaceship = spaceship;
        },
    },
    actions: {
        selectSpaceship({ commit }, spaceship) {
            console.log("Selecionando espaçonave:", spaceship);  // Verifique os dados aqui

            commit('setSelectedSpaceship', spaceship);
        },
        clearSelectedSpaceship({ commit }) {
            commit('setSelectedSpaceship', null);
        }
    },
    getters: {
        getSelectedSpaceship: (state) => state.selectedSpaceship,
    }
});
