<template>
    <input type="hidden" name="allowed_quantities" :value="allowedQuantities" />
    <input
        type="hidden"
        name="allowed_quantities_type"
        :value="allowedQuantitiesType"
    />
    <div class="panel-body">
        <div class="row">
            <div v-if="error" class="alert alert-danger">{{ error }}</div>
            <div class="form-title" style="margin-bottom: 50px">
                <h5 class="col-md-12">Quantités autorisées</h5>
            </div>
            <div class="checkbox mb-4">
                <label> Type </label>
                <label>
                    <input
                        v-model="allowedQuantitiesType"
                        type="radio"
                        value="fixed"
                        id="fixed"
                    />
                    Fixé
                </label>
                <label>
                    <input
                        v-model="allowedQuantitiesType"
                        type="radio"
                        value="interval"
                        id="interval"
                    />
                    Intervalle
                </label>
            </div>
            <div class="form-group col-md-4 ml-2">
                <label class="control-label">La quantité</label>
                <input
                    v-if="allowedQuantitiesType === 'fixed'"
                    v-model="form.value"
                    type="number"
                    class="form-control"
                    placeholder="La quantité"
                />
                <div v-else class="d-flex">
                    <input
                        v-model="form.minValue"
                        type="number"
                        class="form-control mr-1"
                        placeholder="Le min"
                    />
                    <input
                        v-model="form.maxValue"
                        type="number"
                        class="form-control"
                        placeholder="Le max"
                    />
                </div>
            </div>
            <div class="form-group col-md-3">
                <label class="control-label">Son prix de base</label>
                <input
                    v-model="form.price"
                    type="number"
                    class="form-control"
                    placeholder="Son prix de base"
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
                        <span v-if="allowedQuantitiesType === 'fixed'">{{
                            quantity.value
                        }}</span>
                        <span v-else>
                            {{ quantity.minValue }}
                            <i class="voyager-dot-2"></i>
                            {{ quantity.maxValue }}
                        </span>
                        unité =
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
        productAllowedQuantitiesType: {
            type: String,
        },
    },
    data() {
        return {
            form: {
                value: "",
                minValue: "",
                maxValue: "",
                price: "",
            },
            error: null,
            quantitiesList: this.productAllowedQuantities || [],
            allowedQuantitiesType: this.productAllowedQuantitiesType || "fixed",
            editMode: false,
            currentIndex: null,
        };
    },
    computed: {
        allowedQuantities() {
            return JSON.stringify(this.quantitiesList);
        },
    },
    watch: {
        allowedQuantitiesType: {
            handler() {
                this.resetForm();

                this.quantitiesList.forEach((quantity, index) => {
                    this.quantitiesList[index] = {
                        ...quantity,
                    };

                    if (this.allowedQuantitiesType === "fixed") {
                        this.quantitiesList[index].value =
                            quantity.value || quantity.maxValue;
                    } else {
                        this.quantitiesList[index].minValue =
                            quantity.minValue || 1;
                        this.quantitiesList[index].maxValue =
                            quantity.maxValue || quantity.value;
                    }
                });
            },
            immediate: true,
        },
    },
    methods: {
        resetForm() {
            this.form =
                this.allowedQuantitiesType === "fixed"
                    ? {
                          value: "",
                          price: "",
                      }
                    : {
                          minValue: "",
                          maxValue: "",
                          price: "",
                      };
        },
        validateForm() {
            this.error = null;

            if (
                (this.allowedQuantitiesType === "fixed" &&
                    (typeof this.form.value === "string" ||
                        this.form.value < 1)) ||
                (this.allowedQuantitiesType === "interval" &&
                    (typeof this.form.minValue === "string" ||
                        this.form.minValue < 1 ||
                        typeof this.form.maxValue === "string" ||
                        this.form.maxValue < 1)) ||
                typeof this.form.price === "string" ||
                this.form.price < 0
            ) {
                this.error =
                    "La quantité doit être supérieure à 0. et le prix supérieur ou égal à 0";
                return false;
            }

            if (
                this.allowedQuantitiesType === "interval" &&
                this.form.minValue > this.form.maxValue
            ) {
                this.error = "Le max doit être supérieure ou égale à le max";
                return false;
            }

            return true;
        },
        addQuantity() {
            if (!this.validateForm()) {
                return;
            }

            this.quantitiesList.push({ ...this.form });

            this.resetForm();
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

            this.resetForm();
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
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px !important;
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
