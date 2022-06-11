<template>
    <div
        id="attributes-form-modal"
        class="modal fade"
        role="dialog"
        data-backdrop="static"
    >
        <div class="modal-dialog modal-lg" style="min-width: 75%">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Configurez les attributs de votre produit
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="attributes-container">
                        <div
                            v-for="attribute in allAttributes"
                            :key="attribute.id"
                            class="form-group"
                        >
                            <input
                                v-model="selectedAttributes"
                                :value="attribute"
                                :id="attribute.name"
                                type="checkbox"
                            />
                            <label :for="attribute.name">{{
                                attribute.name
                            }}</label>
                        </div>
                    </div>
                    <div
                        v-for="(selectedAttribute, index) in selectedAttributes"
                        :key="selectedAttribute.id"
                    >
                        <options-form
                            :form-title="`Les options de l'attribut : ${selectedAttribute.name}`"
                            :attribute-options="selectedAttribute.pivot.options"
                            :attribute-options-type="
                                selectedAttribute.options_type
                            "
                            :attribute-groups="selectedAttribute.groups"
                            :product-allowed-quantities="
                                product.allowed_quantities
                            "
                            :product-allowed-quantities-type="
                                product.allowed_quantities_type
                            "
                            :selected-attributes="selectedAttributes"
                            emit-options
                            @options-changed="
                                setAttributeOptions($event, index)
                            "
                        />
                        <button
                            @click="
                                importPredefinedOptionsFromAttribute(
                                    $event,
                                    index
                                )
                            "
                            v-if="selectedAttribute.options?.length"
                            class="btn btn-success btn-xs"
                            style="margin-left: 40px; white-space: pre-wrap"
                        >
                            <i class="voyager-download mr-2"></i> Importer des
                            options prédéfinies à partir de l'attribut
                        </button>
                        <hr />
                    </div>
                </div>
                <div class="modal-footer">
                    <div
                        v-if="message.text"
                        :class="`alert alert-${message.class}`"
                    >
                        {{ message.text }}
                    </div>
                    <button
                        @click="syncAttributesWithProduct"
                        :disabled="loading"
                        type="button"
                        class="btn btn-primary"
                    >
                        <span class="d-flex align-items-center">
                            <i v-if="loading" class="spinner mr-2"></i>
                            Sauvgarder
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: {},
            allAttributes: [],
            selectedAttributes: window.product ? window.product.attributs : [],
            message: {},
            loading: false,
        };
    },
    methods: {
        importPredefinedOptionsFromAttribute(event, attributeIndex) {
            event.target.style.display = "none";
            this.selectedAttributes[attributeIndex].pivot.options.push(
                ...this.selectedAttributes[attributeIndex].options
            );
        },
        setAttributeOptions(options, attributeIndex) {
            this.selectedAttributes[attributeIndex].pivot.options = options;
        },
        listenToModalShowEvent() {
            /**Detect product change on the window object */
            $("#attributes-form-modal").on("show.bs.modal", (event) => {
                this.message = {};

                if (this.product.id === window.product?.id) return;

                this.product = window.product;

                this.selectedAttributes = [...this.product.attributs];

                this.mergeSelectedAttributesIntoAllAttributes();
            });
        },
        fetchAllAttributes() {
            axios.get(`/admin/attributes`).then((res) => {
                this.allAttributes = res.data.attributes;
            });
        },
        /**For solving checkbox binding issue */
        mergeSelectedAttributesIntoAllAttributes() {
            this.allAttributes = [
                ...this.selectedAttributes,
                ...this.allAttributes
                    .filter(
                        (attribute) =>
                            !this.selectedAttributes
                                .map((attribute) => attribute.id)
                                .includes(attribute.id)
                    )
                    .map((attribute) => {
                        return {
                            ...attribute,
                            pivot: {
                                options: [],
                            },
                        };
                    }),
            ];
        },
        syncAttributesWithProduct() {
            this.loading = true;
            axios
                .put(`/admin/products/${this.product.id}/attributes`, {
                    selectedAttributes: this.selectedAttributes,
                })
                .then((res) => {
                    this.selectedAttributes = res.data.selectedAttributes;

                    this.mergeSelectedAttributesIntoAllAttributes();

                    this.message = {
                        text: "Attributs enregistrés avec succès",
                        class: "success",
                    };
                })
                .catch((err) => {
                    this.message.class = "danger";
                    if (err.response.status === 422) {
                        this.message.text =
                            "Pour chaque attribut au moins une option est requise";
                    } else {
                        this.message.text =
                            "Une erreur s'est produite. essayer à nouveau!";
                    }
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
    mounted() {
        this.listenToModalShowEvent();

        this.fetchAllAttributes();
    },
};
</script>

<style scoped lang="scss">
.attributes-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
    padding: 5px 25px;

    label {
        margin-left: 5px;
        font-size: medium;
    }
}
</style>
