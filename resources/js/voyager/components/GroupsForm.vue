<template>
    <input type="hidden" name="groups" :value="groups" />
    <div>
        <div class="groups-form row pl-3">
            <div v-if="formError" class="alert alert-danger">
                {{ formError }}
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Groupe</label>
                <div class="d-flex mb-4">
                    <input
                        v-model="form.name"
                        type="text"
                        class="form-control mr-2"
                        placeholder="Nom de groupe (ex : largeur)"
                    />
                    <input
                        v-model="form.minLimit"
                        type="number"
                        class="form-control mr-2"
                        placeholder="Limite minimale"
                    />
                    <input
                        v-model="form.maxLimit"
                        type="number"
                        class="form-control"
                        placeholder="Limite maximale"
                    />
                </div>
                <div class="actions" v-if="editMode">
                    <button
                        @click="updateGroup"
                        type="button"
                        class="btn btn-success"
                    >
                        Sauvgarder
                    </button>
                    <button
                        @click="cancelEditGroup"
                        type="button"
                        class="btn btn-danger"
                    >
                        Annuler
                    </button>
                </div>
                <button
                    v-else
                    @click="addGroup"
                    type="button"
                    class="btn btn-primary"
                >
                    Ajouter le groupe
                </button>
            </div>
        </div>
    </div>
    <div class="groups-list-container row col-md-12">
        <ul class="groups-list has-cool-scrollbar col-md-11">
            <li v-if="this.groupsList.length">
                <h5 class="">Intervalle =</h5>
            </li>
            <template v-for="(group, index) in this.groupsList" :key="index">
                <li class="groups-item">
                    <div>
                        <h5 class="text-capitalize font-weight-bold mb-3">
                            {{ group.name }}
                        </h5>
                        <div class="group-limits">
                            <h6
                                data-toggle="collapse"
                                :data-target="`#group-limits-container-${
                                    componentId + index
                                }`"
                                class="font-weight-bold"
                            >
                                <i class="voyager-angle-down"></i> Limitations
                                <span
                                    v-if="group.minLimit || group.maxLimit"
                                    class="text-success"
                                >
                                    <i class="voyager-check ml-2"></i>
                                </span>
                            </h6>
                            <div
                                class="ml-3 collapse"
                                :id="`group-limits-container-${
                                    componentId + index
                                }`"
                            >
                                <h6 v-if="group.minLimit">
                                    minimale : {{ group.minLimit }}
                                </h6>
                                <h6 v-if="group.maxLimit">
                                    maximale : {{ group.maxLimit }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="#" @click.prevent="deleteGroup(index)"
                            ><i class="voyager-x text-danger"></i
                        ></a>
                        <a href="#" @click.prevent="editGroup(index)"
                            ><i class="voyager-edit text-success"></i
                        ></a>
                    </div>
                </li>
                <h4 v-if="index < this.groupsList.length - 1">x</h4>
            </template>
        </ul>
    </div>
</template>

<script>
import { uniqueId, cloneDeep } from "lodash";

export default {
    props: {
        attributeGroups: {
            type: Array,
        },
    },
    data() {
        return {
            componentId: uniqueId(),
            form: {
                name: "",
                minLimit: "",
                maxLimit: "",
            },
            groupsList: this.attributeGroups || [],
            formError: null,
            editMode: false,
        };
    },
    computed: {
        groups() {
            return JSON.stringify(this.groupsList);
        },
    },
    methods: {
        validateForm() {
            this.formError = null;

            if (this.form.name.trim() === "") {
                this.formError = "Le nom est requis";
                return false;
            }

            if (this.form.minLimit < 0 || this.form.maxLimit < 0) {
                this.formError =
                    "Les limitation doivent être supérieurs ou égal à 0";
                return false;
            }

            return true;
        },
        addGroup() {
            if (!this.validateForm()) {
                return;
            }

            this.groupsList.push(this.form);

            this.resetForm();
        },
        deleteGroup(index) {
            if (confirm("Es-tu sûr ?")) {
                this.groupsList.splice(index, 1);
            }
        },
        editGroup(index) {
            this.form = cloneDeep(
                this.groupsList.find((group, i) => i == index)
            );
            this.currentIndex = index;
            this.editMode = true;
        },
        cancelEditGroup() {
            this.editMode = false;

            this.resetForm();
        },
        updateGroup() {
            if (!this.validateForm()) {
                return;
            }

            this.groupsList[this.currentIndex] = { ...this.form };

            this.editMode = false;

            this.resetForm();
        },
        resetForm() {
            this.form = {
                name: "",
                minLimit: "",
                maxLimit: "",
            };
        },
    },
};
</script>

<style scoped>
.groups-list {
    padding-inline-start: 14px !important;
    padding-bottom: 25px !important;
    display: flex;
    overflow-x: overlay !important;
    gap: 15px;
    align-items: center;
}
.groups-item {
    display: flex;
    flex-shrink: 0 !important;
    gap: 15px;
    border: 1px solid #22a8f08a;
    padding: 7px 15px !important;
    border-radius: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px !important;
    color: #229ef0;
}
.groups-item:hover {
    background-color: #22a8f011 !important;
}
.actions {
    display: flex;
    gap: 7px;
}
</style>
