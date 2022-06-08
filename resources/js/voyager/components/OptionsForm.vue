<template>
    <input v-if="!emitOptions" type="hidden" name="options" :value="options" />
    <div class="panel-body">
        <div class="form-title row col-md-12">
            <h4 class="col-md-12">
                {{ formTitle }}
            </h4>
        </div>
        <div class="form-inputs row col-md-12">
            <div v-if="formError" class="alert alert-danger">
                {{ formError }}
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Nom</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    placeholder="Nom d'option"
                />
            </div>
        </div>
        <div
            v-if="productAllowedQuantities && productAllowedQuantities.length"
            class="prices row col-md-12"
            style="padding: 0px 40px"
        >
            <h5
                style="margin-bottom: 30px"
                data-toggle="collapse"
                :data-target="`#prices-container-${componentId}`"
            >
                <i class="voyager-angle-down"></i> Les tarifs additionnels
            </h5>
            <div class="collapse" :id="`prices-container-${componentId}`">
                <div
                    v-for="(quantity, index) in productAllowedQuantities"
                    :key="index"
                    class="form-group pl-4"
                >
                    <label class="control-label"
                        >Tarifs additionnel pour qté (
                        <span v-if="productAllowedQuantitiesType === 'fixed'">{{
                            quantity.value
                        }}</span>
                        <span v-else>
                            {{ quantity.minValue }}
                            <i class="voyager-dot-2"></i>
                            {{ quantity.maxValue }} </span
                        >)</label
                    >
                    <input
                        v-model="form.prices[quantity.ref]"
                        type="number"
                        class="form-control"
                        placeholder="`Tarifs additionnels"
                    />
                </div>
            </div>
        </div>
        <div
            class="required-files-properties row col-md-12"
            style="padding: 0px 40px"
        >
            <h5
                style="margin-bottom: 30px"
                data-toggle="collapse"
                :data-target="`#required-files-properties-container-${componentId}`"
            >
                <i class="voyager-angle-down"></i> Les fichiers requis pour
                cette option
            </h5>
            <div
                :id="`required-files-properties-container-${componentId}`"
                class="collapse"
            >
                <div class="required-files-properties-form row pl-4 mb-0 pb-0">
                    <div
                        v-if="requiredFilesPropertiesFormError"
                        class="alert alert-danger"
                    >
                        {{ requiredFilesPropertiesFormError }}
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Nom de fichier</label>
                        <input
                            ref="requiredFileName"
                            type="text"
                            class="form-control"
                            placeholder="Nom de fichier"
                        />
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <button
                            @click="addFilePropertiesToForm"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            +
                        </button>
                    </div>
                </div>
                <div
                    v-if="this.form.requiredFilesProperties?.length"
                    class="required-files-properties-list-container row col-md-12"
                >
                    <ul
                        class="required-files-properties-list"
                        style="margin-left: 20px; padding-inline-start: 5px"
                    >
                        <li
                            style="
                                display: flex;
                                align-items: center;
                                gap: 10px;
                            "
                            v-for="(fileProperties, index) in this.form
                                .requiredFilesProperties"
                            :key="index"
                        >
                            <div class="actions">
                                <a
                                    href="#"
                                    @click.prevent="
                                        deleteFilePropertiesFromForm(index)
                                    "
                                    ><i class="voyager-x text-danger"></i
                                ></a>
                            </div>
                            <h5 class="text-capitalize font-weight-bold">
                                {{ fileProperties.name }}
                            </h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row col-md-12 mt-3">
            <div class="form-group col-md-3">
                <div class="actions" v-if="editMode">
                    <button
                        @click="updateOption"
                        type="button"
                        class="btn btn-success"
                    >
                        Sauvgarder
                    </button>
                    <button
                        @click="cancelEditOption"
                        type="button"
                        class="btn btn-danger"
                    >
                        Annuler
                    </button>
                </div>
                <button
                    v-else
                    @click="addOption"
                    type="button"
                    class="btn btn-primary"
                >
                    Ajouter l'option
                </button>
            </div>
        </div>
        <div class="options-list-container row col-md-12">
            <ul class="options-list has-cool-scrollbar">
                <li
                    class="options-item"
                    v-for="(option, index) in this.optionsList"
                    :key="index"
                >
                    <div>
                        <h5 class="text-capitalize font-weight-bold mb-3">
                            {{ option.name }}
                        </h5>
                        <div
                            v-if="
                                productAllowedQuantities &&
                                productAllowedQuantities.length
                            "
                            class="option-prices"
                        >
                            <h6
                                data-toggle="collapse"
                                :data-target="`#option-prices-container-${
                                    componentId + index
                                }`"
                                class="text-capitalize font-weight-bold"
                            >
                                <i class="voyager-angle-down"></i> Les tarifs
                                additionnels
                                <span
                                    v-if="
                                        option.prices &&
                                        Object.keys(option.prices).length
                                    "
                                    class="text-success"
                                >
                                    <i class="voyager-check ml-2"></i>
                                </span>
                            </h6>
                            <div
                                class="ml-3 collapse"
                                :id="`option-prices-container-${
                                    componentId + index
                                }`"
                            >
                                <h6
                                    v-for="(
                                        quantity, index
                                    ) in productAllowedQuantities"
                                    :key="index"
                                >
                                    <span
                                        v-if="
                                            productAllowedQuantitiesType ===
                                            'fixed'
                                        "
                                        >{{ quantity.value }}</span
                                    >
                                    <span v-else>
                                        {{ quantity.minValue }}
                                        <i class="voyager-dot-2"></i>
                                        {{ quantity.maxValue }}
                                    </span>
                                    Qté :
                                    {{ option.prices[quantity.ref] || 0 }} Dhs
                                </h6>
                            </div>
                        </div>
                        <div class="option-required-files-properties">
                            <h6
                                data-toggle="collapse"
                                :data-target="`#option-required-files-properties-container-${
                                    componentId + index
                                }`"
                                class="text-capitalize font-weight-bold"
                            >
                                <i class="voyager-angle-down"></i> Les fichiers
                                requis
                                <span
                                    v-if="
                                        option.requiredFilesProperties &&
                                        option.requiredFilesProperties.length
                                    "
                                    class="text-success"
                                >
                                    <i class="voyager-check ml-2"></i>
                                </span>
                            </h6>
                            <div
                                class="ml-3 collapse"
                                :id="`option-required-files-properties-container-${
                                    componentId + index
                                }`"
                            >
                                <h6
                                    v-for="(
                                        fileProperties, index
                                    ) in option.requiredFilesProperties"
                                    :key="index"
                                >
                                    {{ fileProperties.name }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="#" @click.prevent="deleteOption(index)"
                            ><i class="voyager-x text-danger"></i
                        ></a>
                        <a href="#" @click.prevent="editOption(index)"
                            ><i class="voyager-edit text-success"></i
                        ></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { uniqueId, cloneDeep } from "lodash";

export default {
    props: {
        attributeOptions: {
            type: Array,
        },
        productAllowedQuantities: {
            type: Array,
        },
        productAllowedQuantitiesType: {
            type: String,
        },
        formTitle: {
            type: String,
            default: "Les options",
        },
        emitOptions: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            componentId: uniqueId(),
            form: {
                name: "",
                prices: {},
                requiredFilesProperties: [],
            },
            formError: null,
            requiredFilesPropertiesFormError: null,
            editMode: false,
            currentIndex: null,
            optionsList: [],
        };
    },
    computed: {
        options() {
            return JSON.stringify(this.optionsList);
        },
    },
    emits: ["optionsChanged"],
    watch: {
        optionsList: {
            handler(options) {
                if (this.emitOptions) {
                    this.$emit("optionsChanged", options);
                }
            },
            deep: true,
        },
        attributeOptions: {
            handler(attributeOptions) {
                this.optionsList = attributeOptions || [];
            },
            deep: true,
            immediate: true,
        },
    },
    methods: {
        validateForm() {
            this.formError = null;

            if (this.form.name.trim() === "") {
                this.formError = "Le nom est requis";
                return false;
            }
            for (const [quantity, price] of Object.entries(this.form.prices)) {
                if (price.toString().trim() === "") {
                    delete this.form.prices[quantity];
                }

                if (isNaN(price) || price < 0) {
                    this.formError = "Le prix être supérieur à 0";
                    return false;
                }
            }

            return true;
        },
        validateRequiredFilesPropertiesForm() {
            this.requiredFilesPropertiesFormError = null;

            if (this.$refs.requiredFileName.value.trim() === "") {
                this.requiredFilesPropertiesFormError =
                    "Le nom de fichier est requis";

                return false;
            }

            return true;
        },
        addOption() {
            if (!this.validateForm()) {
                return;
            }

            this.optionsList.push(this.form);

            this.resetForm();
        },
        deleteOption(index) {
            if (confirm("Es-tu sûr ?")) {
                this.optionsList.splice(index, 1);
            }
        },
        editOption(index) {
            this.form = cloneDeep(
                this.optionsList.find((option, i) => i == index)
            );
            this.currentIndex = index;
            this.editMode = true;
        },
        cancelEditOption() {
            this.editMode = false;

            this.resetForm();
        },
        updateOption() {
            if (!this.validateForm()) {
                return;
            }

            this.optionsList[this.currentIndex] = { ...this.form };

            this.editMode = false;

            this.resetForm();
        },
        resetForm() {
            this.form = {
                name: "",
                prices: {},
                requiredFilesProperties: [],
            };
        },
        /**required file properties */
        addFilePropertiesToForm() {
            if (!this.validateRequiredFilesPropertiesForm()) {
                return;
            }

            this.form.requiredFilesProperties.push({
                name: this.$refs.requiredFileName.value,
            });

            this.$refs.requiredFileName.value = "";
        },
        deleteFilePropertiesFromForm(index) {
            this.form.requiredFilesProperties.splice(index, 1);
        },
    },
};
</script>

<style scoped>
.options-list {
    padding-inline-start: 14px !important;
    padding-bottom: 25px !important;
    display: flex;
    overflow-x: overlay !important;
    gap: 15px;
    align-items: flex-start;
}
.options-item {
    display: flex;
    flex-shrink: 0 !important;
    gap: 15px;
    border: 1px solid #22a8f08a;
    padding: 7px 15px !important;
    border-radius: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px !important;
    color: #229ef0;
}
.options-item:hover {
    background-color: #22a8f011 !important;
}
.actions {
    display: flex;
    gap: 7px;
}
</style>
