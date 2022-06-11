<template>
    <input v-if="!emitOptions" type="hidden" name="options" :value="options" />
    <input
        v-if="!emitOptions"
        type="hidden"
        name="options_type"
        :value="optionsType"
    />
    <div class="panel-body">
        <div class="form-title row col-md-12">
            <h4 class="col-md-12">
                {{ formTitle }}
            </h4>
        </div>
        <div v-if="!emitOptions" class="checkbox mb-4">
            <label>Type</label>
            <label>
                <input
                    v-model="optionsType"
                    type="radio"
                    value="fixed"
                    id="fixed"
                />
                Fixé
            </label>
            <label>
                <input
                    v-model="optionsType"
                    type="radio"
                    value="interval"
                    id="interval"
                />
                Intervalle
            </label>
        </div>

        <div class="form-inputs row col-md-12">
            <div v-if="formError" class="alert alert-danger">
                {{ formError }}
            </div>
            <div class="form-group col-md-12">
                <div v-if="optionsType === 'fixed'">
                    <label class="control-label">Nom d'option</label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="form-control"
                        placeholder="Nom d'option"
                    />
                </div>
                <div v-else>
                    <label class="control-label">
                        Intervalle d'option
                        <span v-if="attributeGroups?.length">
                            (
                            <template
                                v-for="(group, index) in attributeGroups"
                                :key="index"
                            >
                                {{ group.name }}
                                <span
                                    class="font-weight-bold mr-1"
                                    v-if="index < attributeGroups.length - 1"
                                >
                                    <i class="voyager-x"></i>
                                </span>
                            </template>
                            )
                        </span>
                    </label>
                    <div class="d-flex">
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
        <div
            v-if="selectedAttributes && validSelectedAttributes.length"
            class="disabled-options row col-md-12"
            style="padding: 0px 40px"
        >
            <h5
                style="margin-bottom: 30px"
                data-toggle="collapse"
                :data-target="`#disabled-options-container-${componentId}`"
            >
                <i class="voyager-angle-down"></i> Les options désactivées
            </h5>
            <div
                :id="`disabled-options-container-${componentId}`"
                class="collapse"
            >
                <div class="disabled-options-form row pl-4 mb-0 pb-0">
                    <div class="form-group col-md-12">
                        <multiselect
                            v-model="form.disabledOptions"
                            :options="validSelectedAttributes"
                            :multiple="true"
                            :preserve-search="true"
                            :close-on-select="false"
                            placeholder="Sélectionnez les options à désactiver lorsque le courant est sélectionné par l'utilisateur"
                            :show-no-results="false"
                            group-values="pivotOptionsRefs"
                            group-label="name"
                            :group-select="true"
                            :custom-label="getOptionNameByRef"
                            select-label="Sélectionner l'option"
                            select-group-label="Sélectionner toutes les options d'attribut"
                            deselect-label="Désélectionner l'option"
                            deselect-group-label="Désélectionner toutes les options d'attribut"
                        />
                        <p class="ml-2 mt-2 font-weight-bold">
                            si vous ne voyez pas l'option souhaitée. essayez
                            d'enregistrer le formulaire
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
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
                            <span v-if="optionsType === 'fixed'">
                                {{ option.name }}
                            </span>
                            <span v-else>
                                {{ option.minValue }}
                                <i class="voyager-dot-2"></i>
                                {{ option.maxValue }}
                            </span>
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
                        <div class="option-disabled-options">
                            <h6
                                data-toggle="collapse"
                                :data-target="`#option-disabled-options-container-${
                                    componentId + index
                                }`"
                                class="text-capitalize font-weight-bold"
                            >
                                <i class="voyager-angle-down"></i> Les options
                                désactivées
                                <span
                                    v-if="
                                        option.disabledOptions &&
                                        option.disabledOptions.length
                                    "
                                    class="text-success"
                                >
                                    <i class="voyager-check ml-2"></i>
                                </span>
                            </h6>
                            <div
                                class="ml-3 collapse"
                                :id="`option-disabled-options-container-${
                                    componentId + index
                                }`"
                            >
                                <h6
                                    v-for="(
                                        optionRef, index
                                    ) in option.disabledOptions"
                                    :key="index"
                                    class="text-capitalize"
                                >
                                    {{ getOptionNameByRef(optionRef) }}
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
        <groups-form
            v-if="!emitOptions && optionsType === 'interval'"
            :attribute-groups="attributeGroups"
        />
    </div>
</template>

<script>
import { uniqueId, cloneDeep } from "lodash";
import GroupsForm from "./GroupsForm.vue";
import Multiselect from "vue-multiselect";

export default {
    components: { GroupsForm, Multiselect },
    props: {
        selectedAttributes: {
            type: Array,
        },
        attributeOptions: {
            type: Array,
        },
        attributeGroups: {
            type: Array,
        },
        attributeOptionsType: {
            type: String,
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
                disabledOptions: [],
            },
            formError: null,
            requiredFilesPropertiesFormError: null,
            editMode: false,
            currentIndex: null,
            optionsList: [],
            optionsType: this.attributeOptionsType || "fixed",
        };
    },
    computed: {
        options() {
            return JSON.stringify(this.optionsList);
        },
        validSelectedAttributes() {
            return this.selectedAttributes
                .map((attribute) => ({
                    ...attribute,
                    pivotOptionsRefs: attribute.pivot.options
                        .filter(
                            (option) =>
                                option.ref !== null &&
                                typeof option.ref !== "undefined"
                        )
                        .map((option) => option.ref),
                }))
                .filter(
                    (attribute) =>
                        attribute.options_type === "fixed" &&
                        attribute.pivotOptionsRefs.length
                );
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
        optionsType: {
            handler() {
                this.resetForm();

                this.optionsList.forEach((option, index) => {
                    this.optionsList[index] = {
                        ...option,
                    };

                    if (this.optionsType === "fixed") {
                        this.optionsList[index].name = option.name || "Nom";
                    } else {
                        this.optionsList[index].minValue = option.minValue || 1;
                        this.optionsList[index].maxValue =
                            option.maxValue || 10;
                    }
                });
            },
            immediate: true,
        },
    },
    methods: {
        getOptionNameByRef(optionRef) {
            for (let attribute of this.validSelectedAttributes) {
                const option = attribute.pivot.options.find(
                    (option) => option.ref === optionRef
                );

                if (option) return option.name;
            }
        },
        validateForm() {
            this.formError = null;

            if (this.optionsType === "fixed" && this.form.name.trim() === "") {
                this.formError = "Le nom est requis";
                return false;
            }

            if (
                this.optionsType === "interval" &&
                (typeof this.form.minValue === "string" ||
                    this.form.minValue < 1 ||
                    typeof this.form.maxValue === "string" ||
                    this.form.maxValue < 1)
            ) {
                this.formError =
                    "Le min et le max sont requis et doivent être supérieurs à 0";
                return false;
            }

            for (const [quantityRef, price] of Object.entries(
                this.form.prices
            )) {
                if (price.toString().trim() === "") {
                    delete this.form.prices[quantityRef];
                }

                if (isNaN(price) || price < 0) {
                    this.formError = "Le prix être supérieur ou égal à 0";
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
            this.form =
                this.optionsList === "fixed"
                    ? {
                          name: "",
                      }
                    : {
                          minValue: "",
                          maxValue: "",
                      };

            this.form = {
                ...this.form,
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
