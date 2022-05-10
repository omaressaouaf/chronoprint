<template>
    <input type="hidden" name="allowed_quantities" :value="allowedQuantities" />
    <div class="panel-body">
        <div class="row">
            <div v-if="error" class="alert alert-danger">{{ error }}</div>
            <div class="form-title" style="margin-bottom: 50px">
                <h5 class="col-md-12">Quantités autorisées</h5>
            </div>
            <div class="form-group col-md-3">
                <label class="control-label">La quantité</label>
                <input
                    v-model="form.value"
                    type="number"
                    class="form-control"
                    placeholder="La quantité"
                />
            </div>
            <div class="form-group col-md-3">
                <label class="control-label">Son prix de base</label>
                <input
                    v-model="form.price"
                    type="number"
                    class="form-control"
                    placeholder="Son prix"
                />
            </div>
            <div class="form-group col-md-3 form-actions">
                <div class="actions" v-if="editMode">
                    <button
                        @click="updateQuantity"
                        type="button"
                        class="btn btn-success"
                    >
                        Sauvgarder
                    </button>
                    <button
                        @click="cancelEditQuantity"
                        type="button"
                        class="btn btn-danger"
                    >
                        Annuler
                    </button>
                </div>
                <button
                    v-else
                    @click="addQuantity"
                    type="button"
                    class="btn btn-primary"
                >
                    Ajouter la quantité
                </button>
            </div>
        </div>
        <div v-if="quantitiesList.length" class="row col-md-12">
            <ul>
                <li
                    class="quantities-row"
                    v-for="(quantity, index) in this.quantitiesList"
                    :key="index"
                >
                    <h5 class="text-capitalize font-weight-bold">
                        {{ quantity.value }} unité =
                        <span class="font-weight-light ml-5"
                            >{{ quantity.price }} Dhs</span
                        >
                    </h5>
                    <div class="actions">
                        <a href="#" @click.prevent="deleteQuantity(index)"
                            ><i class="voyager-x text-danger"></i
                        ></a>
                        <a href="#" @click.prevent="editQuantity(index)"
                            ><i class="voyager-edit text-success"></i
                        ></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        productAllowedQuantities: {
            type: Array,
        },
    },
    data() {
        return {
            form: {
                value: 100,
                price: 100,
            },
            error: null,
            quantitiesList: this.productAllowedQuantities || [],
            editMode: false,
            currentIndex: null,
        };
    },
    computed: {
        allowedQuantities() {
            return JSON.stringify(this.quantitiesList);
        },
    },
    methods: {
        validateForm() {
            this.error = null;

            if (
                typeof this.form.quantity === "string" &&
                this.form.quantity.trim() === "" &&
                typeof this.form.price === "string" &&
                this.form.price.trim() === ""
            ) {
                this.error = "La quantité et son prix est requise";

                return false;
            }

            return true;
        },
        addQuantity() {
            if (!this.validateForm()) {
                return;
            }
            this.quantitiesList.push({ ...this.form });
        },
        deleteQuantity(index) {
            this.quantitiesList.splice(index, 1);
        },
        editQuantity(index) {
            this.form = {
                ...this.quantitiesList.find((quantity, i) => i == index),
            };

            this.currentIndex = index;

            this.editMode = true;
        },
        cancelEditQuantity() {
            this.editMode = false;
        },
        updateQuantity() {
            if (!this.validateForm()) {
                return;
            }

            this.quantitiesList[this.currentIndex] = { ...this.form };

            this.editMode = false;
        },
    },
};
</script>

<style scoped>
ul {
    padding-inline-start: 20px !important;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}
.quantities-row {
    display: flex;
    gap: 15px;
    border: 1px solid #22a8f08a;
    padding: 7px 15px !important;
    border-radius: 20px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px !important;
    color: #229ef0;
}
.quantities-row:hover {
    background-color: #22a8f011 !important;
}
.actions {
    display: flex;
    gap: 7px;
}
.form-actions {
    margin-top: 20px;
}
</style>
